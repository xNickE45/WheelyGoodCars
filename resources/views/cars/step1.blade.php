@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Enter License Plate</h1>
    <a href="{{ route('cars.index') }}" class="btn btn-primary mb-3">Back</a>
    <form action="{{ route('cars.step1.post') }}" method="POST">
        @csrf
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                Step {{ $currentStep }} of 3
            </div>
        </div>
        <div class="form-group">
            <label for="license_plate">License Plate</label>
            <input type="text" name="license_plate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
    </form>
</div>
@endsection
