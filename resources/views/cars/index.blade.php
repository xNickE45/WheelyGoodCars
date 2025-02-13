<!-- filepath: /C:/laragon/www/WheelyGoodCars/resources/views/cars/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Cars</h1>
    <a href="{{ route('cars.step1') }}" class="btn btn-primary mb-3">Add New Car</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>License Plate</th>
                <th>Make</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Price</th>
                <th>Mileage</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->license_plate }}</td>
                <td>{{ $car->make }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->price }}</td>
                <td>{{ $car->mileage }}</td>
                <td>
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
