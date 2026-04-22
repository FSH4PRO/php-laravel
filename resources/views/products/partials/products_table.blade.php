<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset("storage/" . $product->image) }}" alt="{{ $product->name }}" width="50">
                @else
                    No Image
                @endif
            </td>
            <td>
                <a href="{{ route("products.show", $product) }}" class="btn btn-info btn-sm">View</a>

                    <a href="{{ route("products.edit", $product) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route("products.destroy", $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->appends(request()->query())->links() }}
