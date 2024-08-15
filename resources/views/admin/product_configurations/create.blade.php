@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create Product Configuration</h1>
    <form action="{{ route('admin.product_configurations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_item_id">Product Item</label>
            <select name="product_item_id" id="product_item_id" class="form-control">
                @foreach($productItems as $productItem)
                    <option value="{{ $productItem->id }}">{{ $productItem->price }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="variation_option_id">Variation Option</label>
            <select name="variation_option_id" id="variation_option_id" class="form-control">
                @foreach($variationOptions as $variationOption)
                    <option value="{{ $variationOption->id }}">{{ $variationOption->value}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
