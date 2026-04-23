@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <input type="text" name="name" value="{{ $product->name }}" class="form-control mb-3"
                placeholder="Product Name" required>

            <textarea name="description" class="form-control mb-3" placeholder="Description">{{ $product->description }}</textarea>

            <input type="number" name="price" step="0.01" value="{{ $product->price }}" class="form-control mb-3"
                placeholder="Price" required>

            <input type="file" name="image" class="form-control mb-3">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" class="img-thumbnail mb-3"
                    style="max-width: 200px;">
            @endif

            <h5>Stores</h5>
            <select name="stores[]" id="stores" class="form-select mb-3" multiple size="5">
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}" {{ $product->stores->contains($store->id) ? 'selected' : '' }}>
                        {{ $store->name }}</option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl/Cmd to select more than one store.</small>

            <h5>Warehouses</h5>
            <select name="warehouses[]" id="warehouses" class="form-select mb-3" multiple size="5">
                @foreach ($warehouses as $wh)
                    <option value="{{ $wh->id }}" {{ $product->warehouses->contains($wh->id) ? 'selected' : '' }}>
                        {{ $wh->name }}</option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl/Cmd to select more than one warehouse.</small>

            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
@endsection
