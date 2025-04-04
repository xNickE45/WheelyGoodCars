<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Http;

class MultiStepFormController extends Controller
{
    public function showStep1()
    {
        return view('cars.step1', ['progress' => 33, 'currentStep' => 1]);
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
            $carData['license_plate'] = $licensePlate;
            return redirect()->route('cars.step2')->with('carData', $carData);
        } else {
            return back()->withErrors(['license_plate' => 'Car not found.']);
        }
    }

    public function showStep2()
    {
        $carData = session('carData');
        return view('cars.step2', ['carData' => $carData, 'progress' => 66, 'currentStep' => 2]);
    }

    public function postStep2(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
            'seats' => 'nullable|integer',
            'doors' => 'nullable|integer',
            'production_year' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'color' => 'nullable',
            'image' => 'nullable|image',
            'sold_at' => 'nullable|date',
        ]);

        $carData = session('carData', []);
        $carData = array_merge($carData, $request->except('_token'));
        session(['carData' => $carData]);


        return redirect()->route('cars.step3');
    }

    public function showStep3()
{
    return view('cars.step3', ['progress' => 100, 'currentStep' => 3]);
}

public function postStep3(Request $request)
{
    $request->validate([
        'image' => 'required|image',
    ]);

    $imagePath = $request->file('image')->store('car_images', 'public');

    $carData = session('carData');
    $carData['image'] = $imagePath;
    session(['carData' => $carData]);

    Car::create(array_merge($carData, ['user_id' => auth()->id()]));

    session()->forget('carData');

    return redirect()->route('cars.index')->with('success', 'Car created successfully.');
}
}
