@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <h3>Price: ${{ number_format($product->price, 2) }}</h3>

        <div class="row">
            <div class="col-md-6">
                <h4>Stores</h4>
                <ul>
                    @foreach ($product->stores as $store)
                        <li>{{ $store->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h4>Warehouses</h4>
                <ul>
                    @foreach ($product->warehouses as $wh)
                        <li>{{ $wh->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
