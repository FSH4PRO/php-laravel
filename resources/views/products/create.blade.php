@extends("layouts.app")
@section("content")
<div class="container">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" class="form-control mb-3" placeholder="Product Name" required>
        <textarea name="description" class="form-control mb-3" placeholder="Description"></textarea>
        <input type="number" name="price" step="0.01" class="form-control mb-3" placeholder="Price" required>
        <input type="file" name="image" class="form-control mb-3">

        <h5>Assign to Stores</h5>
        @foreach($stores as $store)
            <div class="mb-2 border p-2">
                <input type="checkbox" name="stores[{{ $store->id }}][selected]" id="s{{ $store->id }}">
                <label for="s{{ $store->id }}">{{ $store->name }}</label>
                <input type="number" name="stores[{{ $store->id }}][quantity]" class="form-control d-inline w-25" placeholder="Qty">
            </div>
        @endforeach

        <h5>Assign to Warehouses</h5>
        @foreach($warehouses as $warehouse)
            <div class="mb-2 border p-2">
                <input type="checkbox" name="warehouses[{{ $warehouse->id }}][selected]" id="w{{ $warehouse->id }}">
                <label for="w{{ $warehouse->id }}">{{ $warehouse->name }}</label>
                <input type="number" name="warehouses[{{ $warehouse->id }}][quantity]" class="form-control d-inline w-25" placeholder="Qty">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Save Product</button>
    </form>
</div>
@endsection
