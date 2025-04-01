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
                        @if($car->user->isSuspicious())
                            <span class="text-warning" title="Suspicious Seller">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                </svg>
                            </span>
                            <ul class="text-warning mt-2">
                                @foreach($car->user->isSuspicious() as $reason)
                                    <li>{{ $reason }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </p>
                    <a href="{{ route('cars.detail', $car->id) }}" class="btn btn-info">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
