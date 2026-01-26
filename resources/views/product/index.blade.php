@include('product.content.header')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Product List</h3>
        <a href="product/create" class="btn btn-dark">
            + Add New Product
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->index + 1 }}</td>

                        <td>
                            <a href="product/{{ $product->id }}/show" class="fw-semibold text-dark text-decoration-none">
                                {{ $product->name }}
                            </a>
                        </td>

                        <td class="text-muted">
                            {{ Str::limit($product->description, 40) }}
                        </td>

                        <td>
                            <span class="badge bg-success">
                                ₹ {{ $product->price }}
                            </span>
                        </td>

                        <td>
                            <img src="productimg/{{ $product->image }}"
                                 width="40"
                                 height="40"
                                 class="rounded-circle border"
                                 alt="{{ $product->name }}">
                        </td>

                        <td class="text-center">
                            <a href="product/{{ $product->id }}/edit" class="btn btn-sm btn-outline-dark">
                                Edit
                            </a>

                            <form action="/product/{{ $product->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>

</div>
