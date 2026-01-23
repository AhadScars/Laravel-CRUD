@include('product.content.header')


<div class="container">
  <div class="text-right">

    <a href="product/create" class="btn btn-dark mt-2">Add New Product</a>
  </div>

  <table class="table table-hover mt-2">
    <thead>
      <tr>
        <th scope="col">Sr No</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product description</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th>
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        
      <tr>
        
        <td>{{ $loop->index+1 }}</td>
        <td><a href="product/{{ $product->id }}/show" class="text-dark">{{ $product->name }}</a></td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td>
          <img src="productimg/{{ $product->image }}" alt="{{ $product->name }}" width="30px" height="30px" class="rounded-circle">
        </td>
        <td>
          <a href="product/{{ $product->id }}/edit" class="btn btn-dark">Edit</a>
          <form action="/product/{{ $product->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          </td>
      </tr>
      @endforeach
    </tbody>
    

  </table>
  {{ $products->links() }}

</div>


</body>

</html>