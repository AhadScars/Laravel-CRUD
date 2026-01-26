@include('product.content.header')

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

                            <a href="{{ url()->previous() }}" class="btn btn-outline-dark mt-3">
                                ← Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
