<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit product</title>
</head>
<body>
    <div class="container mt-3">
        <h2>Update product</h2>
        @if (Session::has('success'))
          <div class="alert alert-success" role ="alert">
            {{Session::get('success')}}
          </div>
        @endif
        <form action="{{url('adminEditProductStore')}}" method="POST">
            @csrf

            <div class="mb-3 mt-3">
              <label for="id">Product ID:</label>
              <input type="text" class="form-control" id="id" readonly
                  value = "{{$adminEditProductIdDatabase->productId}}" name="nameLabelProductId">
            </div>
            <div class="mb-3 mt-3">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name"
                  value = "{{$adminEditProductIdDatabase->productName}}" name="nameLabelProductName">
            </div>
            <div class="mb-3 mt-3">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="price"
                  value = "{{$adminEditProductIdDatabase->productPrice}}" name="nameLabelPrice">
            </div>
            <div class="mb-3 mt-3">
              <label for="image">Image:</label>
              <input type="file" class="form-control" id="image" name="nameLabelNewImage">
            </div>
            <div class="mb-3 mt-3">
              <label for="details">Details:</label>
              <textarea class="form-control" rows="5" id="details" name="nameLabelDetail">
                  {{ $adminEditProductIdDatabase->productDetail}}
              </textarea>
            </div>

            <div class="mb-3 mt-3">
              <label for="category">Category:</label>
              <select name="nameLabelCategory" id="category" >
                  @foreach ($categoryEditProductIdDatabase as $categoryChoice)
                  <option value="{{$categoryChoice->categoryId}}"
                      {{$categoryChoice->categoryId == $adminEditProductIdDatabase->categoryId ? 'checked' : ''}}>
                      {{$categoryChoice->categoryName}}</option>
                  @endforeach
              </select>
            </div>

            <button type="submit" class="btn btn-primary">update</button>
            <a href="{{url('admin/adminViewProductIndexBlade')}}" class="btn btn-danger"> Back </a>
        </form>
      </div>
</body>
</html>
