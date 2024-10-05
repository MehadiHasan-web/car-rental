<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.partials.cars.index', [
            'cars' => Car::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'car_type' => 'required|string|max:255',
            'rent_price' => 'required|numeric|min:0',
            'status' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/cars'), $photoName);
        }

        $car = new Car;
        $car->name = $request->input('name');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->car_type = $request->input('car_type');
        $car->rent_price = $request->input('rent_price');
        $car->status = $request->input('status');
        $car->photo = $photoName ?? null;
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('admin.partials.cars.edit', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.partials.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'car_type' => 'required|string|max:255',
            'rent_price' => 'required|numeric|min:0',
            'status' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/cars'), $photoName);
        }

        $car->name = $request->input('name');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->car_type = $request->input('car_type');
        $car->rent_price = $request->input('rent_price');
        $car->status = $request->input('status');
        $car->photo = $photoName ?? $car->photo;
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if ($car->photo) {
            $photoPath = public_path('uploads/cars/' . $car->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
