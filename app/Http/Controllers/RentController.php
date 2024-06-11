<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;

class RentController extends Controller
{
    public function create()
    {
        $cars = \App\Models\Car::all(); // Fetch all cars
        return view('rents.create', compact('cars'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'client_name' => 'required|string',
            'phone' => 'required|string',
            'duration' => 'required|integer',
            'car_id' => 'required|exists:cars,id', // Assuming you have a cars table with an id column
        ]);

        // Create a new rent record
        Rent::create([
            'client_name' => $request->client_name,
            'phone' => $request->phone,
            'duration' => $request->duration,
            'car_id' => $request->car_id,
            'status' => 'pending', // Set the initial status to 'pending'
        ]);

        // Redirect the user back to the dashboard or any other appropriate page
        return redirect()->route('rents.index');
    }

    public function approve(Request $request, Rent $rent)
    {
        // Update the status of the rent record to 'approved'
        $rent->update(['status' => 'approved']);

        // Update the availability of the associated car to false
        $rent->car->update(['availability' => false]);

        // Optionally, you may calculate the total cost based on the duration and price of the car
        // Then, proceed with any further actions you require

        return redirect()->route('dashboard')->with('success', 'Rental request approved.');
    }

    public function deny(Request $request, Rent $rent)
    {
        // Delete the rent record
        $rent->delete();

        return redirect()->route('dashboard')->with('success', 'Rental request denied.');
    }

    public function index()
    {
        $rents = Rent::all();
        return view('rents.index', compact('rents'));
    }
}
