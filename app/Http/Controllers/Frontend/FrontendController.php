<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Car;
use App\Models\Frontend\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('frontend.partials.home', compact('cars'));
    }
    public function show($id)
    {
        $car = Car::find($id);
        return view('frontend.partials.single', compact('car'));
    }
    public function rental()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $rentals = Rental::where('user_id', Auth::user()->id)->with('car')->get();
        return view('frontend.partials.rentals', compact('rentals'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $cars = Car::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('brand', 'like', '%' . $searchTerm . '%')
            ->orWhere('model', 'like', '%' . $searchTerm . '%')
            ->orWhere('car_type', 'like', '%' . $searchTerm . '%')
            ->orWhere('rent_price', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('frontend.partials.search', compact('cars'));
    }

    public function cancel($id)
    {
        $rental = Rental::find($id);
        $rental->update([
            'status' => 1,
        ]);
        flash()->success('Rental cancelled successfully!');
        return redirect()->route('frontend.rentals');
    }
}
