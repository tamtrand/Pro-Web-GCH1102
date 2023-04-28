    @extends('layout')

    @section('admin')
        <div class="container">
            <h1>Products List</h1>
            <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Add A New Product!!!</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    @php
                        $product->image = asset('images/' . $product->image);
                    @endphp
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->image }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.delete', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you definitely want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection