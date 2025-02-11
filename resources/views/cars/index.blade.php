@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Cars</h1>
    <table class="table">
        <thead>
            <tr>
                <th>License Plate</th>
                <th>Make</th>
                <th>Model</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->license_plate }}</td>
                <td>{{ $car->make }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->price }}</td>
                <td>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
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
