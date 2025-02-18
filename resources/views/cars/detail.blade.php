<!-- filepath: /C:/laragon/www/WheelyGoodCars/resources/views/cars/detail.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Car Details</h1>
    <a href="{{ route('cars.index') }}" class="btn btn-primary mb-3">Back</a>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $car->make }} {{ $car->model }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $car->brand }}</h6>
            <p class="card-text">
                <strong>License Plate:</strong> {{ $car->license_plate }}<br>
                <strong>Price:</strong> ${{ $car->price }}<br>
                <strong>Mileage:</strong> {{ $car->mileage }} km<br>
                <strong>Seats:</strong> {{ $car->seats }}<br>
                <strong>Doors:</strong> {{ $car->doors }}<br>
                <strong>Production Year:</strong> {{ $car->production_year }}<br>
                <strong>Weight:</strong> {{ $car->weight }} kg<br>
                <strong>Color:</strong> {{ $car->color }}<br>
                <strong>Seller:</strong> {{ $car->user->name }}
            </p>
        </div>
    </div>
</div>
@endsection
