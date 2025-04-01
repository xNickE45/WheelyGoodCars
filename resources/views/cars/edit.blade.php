@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Car</h1>
    <a href="{{ route('cars.show') }}" class="btn btn-primary mb-3">Back</a>
    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="license_plate">License Plate</label>
            <input type="text" name="license_plate" class="form-control" value="{{ $car->license_plate }}" required>
        </div>
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" class="form-control" value="{{ $car->make }}" required>
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ $car->price }}" required>
        </div>
        <div class="form-group">
            <label for="mileage">Mileage</label>
            <input type="number" name="mileage" class="form-control" value="{{ $car->mileage }}" required>
        </div>
        <div class="form-group">
            <label for="seats">Seats</label>
            <input type="number" name="seats" class="form-control" value="{{ $car->seats }}" required>
        </div>
        <div class="form-group">
            <label for="doors">Doors</label>
            <input type="number" name="doors" class="form-control" value="{{ $car->doors }}" required>
        </div>
        <div class="form-group">
            <label for="production_year">Production Year</label>
            <input type="number" name="production_year" class="form-control" value="{{ $car->production_year }}" required>
        </div>
        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" name="weight" class="form-control" value="{{ $car->weight }}" required>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" class="form-control" value="{{ $car->color }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

