@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Cars</h1>
    <a href="{{ route('cars.show') }}" class="btn btn-primary mb-3">Manage My Cars</a>
    <div class="row">
        @foreach($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->make }} {{ $car->model }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $car->brand }}</h6>
                    <p class="card-text">
                        <strong>License Plate:</strong> {{ $car->license_plate }}<br>
                        <strong>Price:</strong> ${{ $car->price }}<br>
                        <strong>Mileage:</strong> {{ $car->mileage }} km<br>
                        <strong>Seller:</strong> {{ $car->user->name }}
                    </p>
                    <a href="{{ route('cars.detail', $car->id) }}" class="btn btn-info">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
