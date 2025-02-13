<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Http;

class MultiStepFormController extends Controller
{
    public function showStep1()
    {
        return view('cars.step1');
    }

    public function postStep1(Request $request)
    {
        $request->validate([
            'license_plate' => 'required',
        ]);

        $licensePlate = $request->license_plate;
        $response = Http::get("https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken={$licensePlate}");

        if ($response->successful() && count($response->json()) > 0) {
            $carData = $response->json()[0];
            return redirect()->route('cars.step2')->with('carData', $carData);
        } else {
            return back()->withErrors(['license_plate' => 'Car not found.']);
        }
    }

    public function showStep2()
    {
        $carData = session('carData');
        return view('cars.step2', compact('carData'));
    }

    public function postStep2(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
        ]);

        Car::create([
            'license_plate' => $request->license_plate,
            'make' => $request->make,
            'brand' => $request->brand,
            'model' => $request->model,
            'price' => $request->price,
            'mileage' => $request->mileage,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }
}
