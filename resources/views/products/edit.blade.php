@extends("layouts.app")
@section("content")
<div class="container">
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" class="form-control mb-3">

        <h5>Stores</h5>
        @foreach($stores as $store)
            @php $pivot = $product->stores->where('id', $store->id)->first(); @endphp
            <div class="mb-2 border p-2">
                <input type="checkbox" name="stores[{{ $store->id }}][selected]" {{ $pivot ? 'checked' : '' }}>
                <label>{{ $store->name }}</label>
                <input type="number" name="stores[{{ $store->id }}][quantity]" value="{{ $pivot->pivot->quantity ?? 0 }}" class="form-control d-inline w-25">
            </div>
        @endforeach

        <h5>Warehouses</h5>
        @foreach($warehouses as $wh)
            @php $pivot = $product->warehouses->where('id', $wh->id)->first(); @endphp
            <div class="mb-2 border p-2">
                <input type="checkbox" name="warehouses[{{ $wh->id }}][selected]" {{ $pivot ? 'checked' : '' }}>
                <label>{{ $wh->name }}</label>
                <input type="number" name="warehouses[{{ $wh->id }}][quantity]" value="{{ $pivot->pivot->quantity ?? 0 }}" class="form-control d-inline w-25">
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
