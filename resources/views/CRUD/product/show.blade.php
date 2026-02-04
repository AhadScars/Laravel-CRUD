@include('CRUD.content.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="row g-0">
                    <div class="col-md-5 text-center p-3">
                        <img src="/productimg/{{ $product->image }}"
                             class="img-fluid rounded"
                             alt="{{ $product->name }}">
                    </div>

                    <div class="col-md-7">
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            
                            <p class="card-text text-muted">
                                {{ $product->description }}
                            </p>

                            <h4 class="text-success fw-bold">
                                ₹ {{ $product->price }}
                            </h4>

                            
                            <h6>By - {{ $product->user ? $product->user->name : 'Unknown' }}</h6>

                            <a href="{{ url()->previous() }}" class="btn btn-outline-dark mt-3">
                                ← Back
                            </a>

                            
                            @if(auth()->check() && $product->user_id === auth()->id())
                                <div class="mt-3">
                                    <a href="/CRUD/product/{{ $product->id }}/edit" class="btn btn-sm btn-outline-dark">
                                        Edit
                                    </a>

                                    <form action="/product/{{ $product->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
