<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Barryvdh\DomPDF\Facade\Pdf;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function show(Car $car)
    {
        $cars = Car::with('user')->where('user_id', auth()->id())->get();
        return view('cars.show', compact('cars'));
    }

    public function detail(Car $car)
    {
        return view('cars.detail', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'license_plate' => 'required|unique:cars,license_plate,' . $car->id,
            'make' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
            'seats' => 'nullable|integer',
            'doors' => 'nullable|integer',
            'production_year' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'color' => 'nullable|string',
            'image' => 'nullable|image',
            'sold_at' => 'nullable|date',
        ]);

        $car->update($request->all());

        return redirect()->route('cars.show',)->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.show')->with('success', 'Car deleted successfully.');
    }

    public function generatePdf(Car $car)
    {
        $pdf = Pdf::loadView('cars.pdf', compact('car'));
        return $pdf->download('car-details.pdf');
    }
}
