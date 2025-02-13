@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Enter License Plate</h1>
    <form action="{{ route('cars.step1.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="license_plate">License Plate</label>
            <input type="text" name="license_plate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
    </form>
</div>
@endsection
