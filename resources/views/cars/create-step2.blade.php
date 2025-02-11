@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Car - Step 2</h1>
    <form action="{{ route('cars.post-create-step2') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" id="make" class="form-control" value="{{ $carDetails['make'] ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ $carDetails['model'] ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
