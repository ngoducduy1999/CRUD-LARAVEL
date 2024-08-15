@extends('layouts.admin')

@section('content')
    <h2>Variation Options</h2>
    <a href="{{ route('admin.variation_options.create') }}" class="btn btn-primary">Add New Option</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Variation</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($variationOptions as $option)
                <tr>
                    <td>{{ $option->id }}</td>
                    <td>{{ $option->variation->name }}</td>
                    <td>{{ $option->value }}</td>
                    <td>
                        <a href="{{ route('admin.variation_options.edit', $option->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.variation_options.destroy', $option->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
