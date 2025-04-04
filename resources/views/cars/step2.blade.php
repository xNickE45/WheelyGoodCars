@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Complete Car Details</h1>
    <form action="{{ route('cars.step2.post') }}" method="POST">
        @csrf
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                Step {{ $currentStep }} of 3
            </div>
        </div>
        <input type="hidden" name="license_plate" value="{{ $carData['kenteken'] }}">
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" class="form-control" value="{{ $carData['merk'] }}" readonly>
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $carData['handelsbenaming'] }}" readonly>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" value="{{ $carData['variant'] }}" readonly>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mileage">Mileage</label>
            <input type="number" name="mileage" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="seats">Seats</label>
            <input type="number" name="seats" class="form-control" value="{{ $carData['aantal_zitplaatsen'] }}" readonly>
        </div>
        <div class="form-group">
            <label for="doors">Doors</label>
            <input type="number" name="doors" class="form-control" value="{{ $carData['aantal_deuren'] }}" readonly>
        </div>
        <div class="form-group">
            <label for="production_year">Production Year</label>
            <input type="number" name="production_year" class="form-control" value="{{ $carData['datum_eerste_toelating'] }}" readonly>
        </div>
        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" name="weight" class="form-control" value="{{ $carData['massa_ledig_voertuig'] }}" readonly>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" class="form-control" value="{{ $carData['eerste_kleur'] }}" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
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
