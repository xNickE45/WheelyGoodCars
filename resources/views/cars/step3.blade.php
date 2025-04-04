@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Upload Car Image</h1>
    <form action="{{ route('cars.step3.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                Step 3 of 3
            </div>
        </div>
        <div class="form-group">
            <label for="image">Car Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Finish</button>
    </form>
</div>
@endsection
