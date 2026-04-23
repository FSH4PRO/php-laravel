@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" class="form-control mb-3" placeholder="Product Name" required>
            <textarea name="description" class="form-control mb-3" placeholder="Description"></textarea>
            <input type="number" name="price" step="0.01" class="form-control mb-3" placeholder="Price" required>
            <input type="file" name="image" class="form-control mb-3">

            <h5>Assign to Stores</h5>
            <select name="stores[]" id="stores" class="form-select mb-3" multiple size="5">
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}" {{ in_array($store->id, old('stores', [])) ? 'selected' : '' }}>
                        {{ $store->name }}</option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl/Cmd to select more than one store.</small>

            <h5>Assign to Warehouses</h5>
            <select name="warehouses[]" id="warehouses" class="form-select mb-3" multiple size="5">
                @foreach ($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}"
                        {{ in_array($warehouse->id, old('warehouses', [])) ? 'selected' : '' }}>{{ $warehouse->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl/Cmd to select more than one warehouse.</small>

            <button type="submit" class="btn btn-primary mt-3">Save Product</button>
        </form>
    </div>
@endsection
