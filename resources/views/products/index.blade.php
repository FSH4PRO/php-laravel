@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Product List</h5>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Add New Product</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stores</th>
                        <th>Warehouses</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" width="40" class="rounded">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td><span class="badge bg-info text-dark">{{ $product->stores->count() }}</span></td>
                            <td><span class="badge bg-secondary">{{ $product->warehouses->count() }}</span></td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <a href="{{ route('products.show', $product) }}"
                                        class="btn btn-outline-primary btn-sm">View</a>
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="btn btn-outline-warning btn-sm">Edit</a>

                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
