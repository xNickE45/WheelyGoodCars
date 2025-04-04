@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Car</h1>
    <a href="{{ route('cars.show') }}" class="btn btn-primary mb-3">Back</a>
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="license_plate">License Plate</label>
            <input type="text" name="license_plate" class="form-control" value="{{ $car->license_plate }}" readonly>
        </div>
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" class="form-control" value="{{ $car->make }}" readonly>
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" readonly>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" value="{{ $car->model }}" readonly>
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
            <label for="image">Car Image</label>
            <input type="file" name="image" class="form-control">
            @if($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" class="img-thumbnail mt-2" width="200">
            @endif
        </div>
        <div class="form-group">
            <label for="seats">Seats</label>
            <input type="number" name="seats" class="form-control" value="{{ $car->seats }}" readonly>
        </div>
        <div class="form-group">
            <label for="doors">Doors</label>
            <input type="number" name="doors" class="form-control" value="{{ $car->doors }}" readonly>
        </div>
        <div class="form-group">
            <label for="production_year">Production Year</label>
            <input type="number" name="production_year" class="form-control" value="{{ $car->production_year }}" readonly>
        </div>
        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" name="weight" class="form-control" value="{{ $car->weight }}" readonly>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" class="form-control" value="{{ $car->color }}" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

<style>
    .form-control[readonly] {
        background-color: #3d3d3d6c;

    }
    .form-control[readonly]:focus {
        background-color: #3d3d3d6c;
    }
</style>
