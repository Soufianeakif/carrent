<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rent a Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('rent.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="client_name" class="block text-sm font-medium text-gray-700">Your Name</label>
                            <input type="text" name="client_name" id="client_name" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="duration" class="block text-sm font-medium text-gray-700">Duration (in days)</label>
                            <input type="number" name="duration" id="duration" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="car_id" class="block text-sm font-medium text-gray-700">Select Car</label>
                            <select name="car_id" id="car_id" class="mt-1 block w-full" required>
                                @foreach ($cars->where('availability', true) as $car)
                                    <option value="{{ $car->id }}">{{ $car->name }} - {{ $car->price }} MAD</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
