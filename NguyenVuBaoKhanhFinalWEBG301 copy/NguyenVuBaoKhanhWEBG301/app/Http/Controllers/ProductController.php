<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function adminFunctionViewProduct(){
        //dòng này là để cho biết mình gắn cái gì vào biến $adminViewProductVariables
        // thông qua chọn tất cả các dữ liệu trong bảng products
        $adminViewProductVariables = Product::select('products.*', 'categories.categoryName')
        -> join('categories', 'products.categoryId', '=', 'categories.categoryId') ->get();
        return view('admin.adminViewProductIndexBlade', compact('adminViewProductVariables'));
        // đây có nghĩa là đọc từ thư mục views trong thư mục resources tìm file adminViewIndex.blade.php
        //trong thư mục admin, và trả về giá trị biến $adminViewProductVariables
        //compact là trả về giá trị biến đã khai báo ở trên.
    }

    public function adminFunctionAddProductChooseCategory(){
        $categoryDatabase = Category::get();
        return view('admin.adminAddProductBlade', compact('categoryDatabase'));
    }

    public function adminFunctionAddProductStore(Request $adminAddNewProductRequestParameter){
        $newProduct = new Product();
        $newProduct->productId = $adminAddNewProductRequestParameter->nameLabelProductId;
        $newProduct->productName = $adminAddNewProductRequestParameter->nameLabelProductName;
        $newProduct->productPrice = $adminAddNewProductRequestParameter->nameLabelProductPrice;
        $newProduct->productImage = $adminAddNewProductRequestParameter->nameLabelProductImage;
        $newProduct->productDetail = $adminAddNewProductRequestParameter->nameLabelProductDescription;
        $newProduct->categoryId = $adminAddNewProductRequestParameter->nameLabelProductCategory;
        $newProduct->save();
        return redirect()->back()->with('success','A new Product have been added successfully');
    }

    public function adminFunctionEditProduct($adminEditProductIdParameter)
    {
        $adminEditProductIdDatabase = Product::where('productId', '=', $adminEditProductIdParameter)->first();
        $categoryEditProductIdDatabase = Category::get();
        return view('admin.adminEditProductBlade', compact('adminEditProductIdDatabase', 'categoryEditProductIdDatabase'));
    }

    public function adminFunctionEditProductStore(Request $adminEditProductIdRequestParameter)
    {
        Product::where('productId', '=', $adminEditProductIdRequestParameter->nameLabelProductId)->update([
            'productName' => $adminEditProductIdRequestParameter->nameLabelProductName,
            'productPrice' => $adminEditProductIdRequestParameter->nameLabelPrice,
            'productImage' => $adminEditProductIdRequestParameter->nameLabelNewImage,
            'productDetail' => $adminEditProductIdRequestParameter->nameLabelDetail,
            'categoryId' => $adminEditProductIdRequestParameter->nameLabelCategory
        ]);
        return redirect()->back()->with('success','The product has been updated successfully!');
    }

    public function adminFunctionDeleteProduct($adminDeleteProductIdParameter)
    {
        Product::where('productId','=',$adminDeleteProductIdParameter)->delete();
        return redirect()->back()->with('success','The product has been deleted successfully!');
    }


    //Customer homepage - because this is needed to display the products; only the admin can add, edit, delete products
    public function customerFunctionHomepage(){
        $customerShowProductDatabase = Product::select('products.*', 'categories.categoryName')
        -> join('categories', 'products.categoryId', '=', 'categories.categoryId')->get();
        return view('customer.customerHomepageBlade', compact('customerShowProductDatabase'));
    }
}
