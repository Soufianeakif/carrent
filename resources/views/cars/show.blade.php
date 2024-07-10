<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="mb-4">
                    <h2 class="text-lg font-semibold">{{ $car->name }}</h2>
                    <p>Price: ${{ $car->price }}</p>
                    <p>Model: {{ $car->model }}</p>
                    <p>Availability: {{ $car->availability ? 'Available' : 'Not Available' }}</p>
                    @if($car->imglink)
<<<<<<< HEAD
                        <img src="{{ asset('storage/' . $car->imglink) }}" alt="{{ $car->name }}" class="w-64">
=======
                        <img src="{{ $car->imglink }}" alt="{{ $car->name }}" class="w-64">
>>>>>>> 28f5a0d03afb7c932fe09ff57de5cb96b581d74a
                    @else
                        <p>No image available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
