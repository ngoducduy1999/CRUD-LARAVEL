@extends('layouts.admin')

@section('content')
    <h2>Create Variation Option</h2>
    <form action="{{ route('admin.variation_options.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="variation_id" class="form-label">Variation</label>
            <select id="variation_id" name="variation_id" class="form-select" required>
                @foreach($variations as $variation)
                    <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="text" id="value" name="value" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
