@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Product Configurations</h1>
    <a href="{{ route('admin.product_configurations.create') }}" class="btn btn-primary">Add Product Configuration</a>
    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Item</th>
                <th>Variation Option</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productConfigurations as $productConfiguration)
                <tr>
                    <td>{{ $productConfiguration->id }}</td>
                    <td>{{ $productConfiguration->productItem->name ?? 'N/A' }}</td>
                    <td>{{ $productConfiguration->variationOption->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.product_configurations.edit', ['productConfiguration' => $productConfiguration->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.product_configurations.destroy', ['productConfiguration' => $productConfiguration->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
