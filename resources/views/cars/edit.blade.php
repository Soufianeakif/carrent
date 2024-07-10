<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ $car->name }}" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="text" name="price" id="price" value="{{ $car->price }}" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                            <input type="text" name="model" id="model" value="{{ $car->model }}" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="imglink" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="imglink" id="imglink" class="mt-1 block w-full">
                            @if ($car->imglink)
                                <img src="{{ asset('storage/' . $car->imglink) }}" alt="Current Image" class="mt-2" width="150">
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="availability" class="block text-sm font-medium text-gray-700">Availability</label>
                            <select name="availability" id="availability" class="mt-1 block w-full" required>
                                <option value="1" {{ $car->availability ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ !$car->availability ? 'selected' : '' }}>Not Available</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">Update Car</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
