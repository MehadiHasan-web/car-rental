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
        $rentals = Rental::where('user_id', Auth::user()->id)->with('car')->get();
        // dd($rentals);
        return view('frontend.partials.rentals', compact('rentals'));
    }
}
