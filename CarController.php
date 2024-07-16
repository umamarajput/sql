<?php

namespace App\Http\Controllers;
use App\Models\Car;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all(); // Fetch all cars
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            
        ]);

        Car::create($request->only(['make', 'model', 'quantity', 'price']));

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $car->update($request->only(['make', 'model', 'quantity', 'price']));
        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(['success' => 'Car deleted successfully.']);
    }
}
