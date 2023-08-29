<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add product</title>
</head>
<body>
    <div class="container mt-3">
        <h2>Add new product</h2>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="{{url('adminAddProductStore')}}" method="POST">
            @csrf
          <div class="mb-3 mt-3">
            <label for="id">Product ID:</label>
            <input type="text" class="form-control" id="idLabelProductId"
                   placeholder="Enter product id" name="nameLabelProductId">

          </div>
          <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="idLabelProductName"
                   placeholder="Enter product name" name="nameLabelProductName">

          </div>
          <div class="mb-3 mt-3">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="idLabelProductPrice"
                   placeholder="Enter product price" name="nameLabelProductPrice">
          </div>
          <div class="mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="idLabelProductImage" name="nameLabelProductImage">
          </div>
          <div class="mb-3 mt-3">
            <label for="details">Details:</label>
            <textarea class="form-control" rows="5" id="idLabelProductDescription" name="nameLabelProductDescription"></textarea>
          </div>
          <div class="mb-3 mt-3">
            <label for="category">Category:</label>
            <select name="nameLabelProductCategory" id="idLabelProductcategory" class="form-control">
                @foreach ($categoryDatabase as $categoryChoice)
                <option value="{{$categoryChoice->categoryId}}">{{$categoryChoice->categoryName}}</option>
                @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{url('admin/adminViewProductIndexBlade')}}" class="btn btn-danger"> Back </a>
        </form>
      </div>
</body>
</html>
