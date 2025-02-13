@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Complete Car Details</h1>
    <form action="{{ route('cars.step2.post') }}" method="POST">
        @csrf
        <input type="hidden" name="license_plate" value="{{ $carData['kenteken'] }}">
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" class="form-control" value="{{ $carData['merk'] }}" required>
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $carData['handelsbenaming'] }}" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" value="{{ $carData['variant'] }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mileage">Mileage</label>
            <input type="number" name="mileage" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
