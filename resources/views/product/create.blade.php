@include('product.Content.header')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
  
@endif


<div class="container">
  <h1>Create Product</h1>
</div>

<div class="container">

  <form method="POST" action="/product/store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="{{ old('name') }}">

      @if($errors->has('name'))
        <div class="text-danger">{{ $errors->first('name') }}</div>
      @endif


    </div>

    <div class="form-group">
      <label>description</label>
      <input type="text" class="form-control" name="description" value="{{ old('description') }}">

      @if($errors->has('description'))
        <div class="text-danger">{{ $errors->first('description') }}</div>
      @endif
    </div>

    <div class="form-group">
      <label>Price</label>
      <input type="text" class="form-control" name="price" value="{{ old('price') }}">

      @if($errors->has('price'))
        <div class="text-danger">{{ $errors->first('price') }}</div>
      @endif

    </div>

    <div class="form-group">
      <label>Image Upload</label>
      <input type="file" class="form-control" name="image" value="{{ old('image') }}">
      @if($errors->has('image'))
        <div class="text-danger">{{ $errors->first('image') }}</div>
      @endif
    </div>


    <button type="submit" class="btn btn-dark">Submit</button>
  </form>
</div>


</body>

</html>