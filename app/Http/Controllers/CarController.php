<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function createStep1()
{
    return view('cars.create-step1');
}

public function postCreateStep1(Request $request)
{
    $request->validate([
        'license_plate' => 'required|string|max:255',
    ]);

    $request->session()->put('license_plate', $request->license_plate);

    return redirect()->route('cars.create-step2');
}

public function createStep2()
{
    $license_plate = session('license_plate');
    // Fetch car details from RDW API using the license plate
    // $carDetails = ...

    return view('cars.create-step2', compact('license_plate', 'carDetails'));
}

public function postCreateStep2(Request $request)
{
    $request->validate([
        'make' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'price' => 'required|numeric',
        // Add other validations as needed
    ]);

    Car::create($request->all());

    return redirect()->route('cars.index');
}

public function destroy(Car $car)
{
    $car->delete();
    return redirect()->route('cars.index');
}
}
