@extends('layouts.admin')

@section('content')
    <h2>Edit Variation Option</h2>
    <form action="{{ route('admin.variation_options.update', $variationOption->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="variation_id" class="form-label">Variation</label>
            <select id="variation_id" name="variation_id" class="form-select" required>
                @foreach($variations as $variation)
                    <option value="{{ $variation->id }}" {{ $variationOption->variation_id == $variation->id ? 'selected' : '' }}>
                        {{ $variation->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="text" id="value" name="value" class="form-control" value="{{ $variationOption->value }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
