<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Admin;
class AdminController extends Controller
{
    public function adminFunctionHomepage()
    {
        return view ('admin.adminHomepageBlade');
    }

    public function adminFunctionLoginPageBlade()
    {
        return view('admin.adminLoginPageBlade');
    }

    public function adminFunctionCheckLogin(Request $adminRequestCheckLoginParameter)
    {

        $adminDatabase = Admin::where('adminId','=',$adminRequestCheckLoginParameter->nameLabelAdminId)->first();

        if($adminDatabase){
            if($adminDatabase->adminPassword == $adminRequestCheckLoginParameter->nameLabelAdminPassword){
                $adminRequestCheckLoginParameter->session()->put('nameLabelAdminId',$adminDatabase->adminId);
                $adminRequestCheckLoginParameter->session()->put('nameLabelAdminName ',$adminDatabase->adminName);
                $adminRequestCheckLoginParameter->session()->put('nameLabelAdminPhoto',$adminDatabase->adminPhoto);
                return redirect('admin/adminHomepageBlade');
            }else{
                return back()->with('fail','Password input invalid');
            }

        }else{
            return back()->with('fail','admin is not existed');
        }
    }

    public function adminFunctionLogout(){
        if(Session::has('nameLabelAdminId'))
        Session::pull('nameLabelAdminId');
        if(Session::has('nameLabelAdminName'))
        Session::pull('nameLabelAdminName');
        if(Session::has('nameLabelAdminPhoto'))
        Session::pull('nameLabelAdminPhoto');

        return redirect('admin/adminLoginPageBlade');
    }
}
