<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    @php
                        $carCount = \App\Models\Car::count();
                    @endphp
                    <p class="text-gray-600">Total number of cars: <span class="font-bold">{{ $carCount }}</span></p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    @php
                        $availableCarCount = \App\Models\Car::where('availability', true)->count();
                    @endphp
                    <p class="text-gray-600">Total number of cars available now: <span class="font-bold text-green-600">{{ $availableCarCount }}</span></p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    @php
                        $unavailableCarCount = \App\Models\Car::where('availability', false)->count();
                    @endphp
                    <p class="text-gray-600">Total number of cars not available now: <span class="font-bold text-red-600">{{ $unavailableCarCount }}</span></p>
                </div>
          
            </div>
            <div class="grid grid-cols-3 gap-3">
            <div class="grid grid-cols-3 gap-3">
    <div class="col-span-3 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
        <div class="text-center mx-auto">
            <h1 class="font-bold">Donut Chart for cars</h1>
            <canvas id="carAvailabilityChart" width="150" height="150"></canvas>
        </div>
    </div>
</div>




            
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('carAvailabilityChart').getContext('2d');
    var carAvailabilityChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Available', 'Not Available'],
            datasets: [{
                label: 'Car Availability',
                data: [{{ $availableCarCount }}, {{ $unavailableCarCount }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Car Availability',
                fontSize: 14,
            }
        }
    });
</script>