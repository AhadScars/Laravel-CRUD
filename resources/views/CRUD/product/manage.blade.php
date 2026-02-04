@include('CRUD.content.header')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Manage Products</h1>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                        <td>
                            <a href="/CRUD/product/{{ $product->id }}/show" class="fw-semibold text-dark text-decoration-none">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td class="text-muted">
                            {{ Str::limit($product->description, 40) }}
                        </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->image }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>