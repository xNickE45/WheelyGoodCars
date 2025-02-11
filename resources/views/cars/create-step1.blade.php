@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Car - Step 1</h1>
    <form action="{{ route('cars.post-create-step1') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="license_plate">License Plate</label>
            <input type="text" name="license_plate" id="license_plate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
    </form>
</div>
@endsection
