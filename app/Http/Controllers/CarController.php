<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function indexGeneral()
    {
        $availableCars = Car::where('availability', true)->get();
        return view('index', ['availableCars' => $availableCars]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'model' => 'required|string|max:255',
            'availability' => 'required|boolean',
            'imglink' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the image
        ]);

        // Prepare data to be inserted
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'model' => $request->model,
            'availability' => $request->availability,
        ];

        // Handle image upload if present
        if ($request->hasFile('imglink')) {
            $image = $request->file('imglink');
            $path = $image->store('images', 'public');
            $data['imglink'] = $path;
        } else {
            // If no image is uploaded, you may choose to set a default value or handle this case according to your application logic
            $data['imglink'] = null; // Example: Set to null if no image is uploaded
        }

        // Create a new Car record
        try {
            Car::create($data);
        } catch (\Exception $e) {
            // Log any exceptions for debugging
            \Log::error('Error creating car: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error creating car.');
        }

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
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'model' => 'required|string|max:255',
            'availability' => 'required|boolean',
            'imglink' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the image
        ]);

        $data = $request->all();

        if ($request->hasFile('imglink')) {
            // Delete the old image if it exists
            if ($car->imglink) {
                Storage::disk('public')->delete($car->imglink);
            }

            $image = $request->file('imglink');
            $path = $image->store('images', 'public');
            $data['imglink'] = $path;
        }

        $car->update($data);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        if ($car->imglink) {
            Storage::disk('public')->delete($car->imglink);
        }

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
