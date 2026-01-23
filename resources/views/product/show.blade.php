@include('product.content.header')

<div class="container">
    <div class="mt-4">
        <h2>{{ $product->name }}</h2>
    <p>{{ $product->description }}</p>
    <p>Price: {{ $product->price }}</p>
    <img src="/productimg/{{ $product->image }}" alt="{{ $product->name }}" >
    </div>
    
</div>