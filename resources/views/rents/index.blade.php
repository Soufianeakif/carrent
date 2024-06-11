<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('rent.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6">Add Request</a>
                    <table class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase">Client Name</th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase">Car</th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase">Phone</th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase">Duration (days)</th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase">Status</th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($rents as $rent)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $rent->client_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $rent->car->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $rent->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $rent->duration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($rent->status == 'approved')
                                            <span class="text-green-500 font-bold">Approved</span>
                                        @elseif ($rent->status == 'denied')
                                            <span class="text-red-500 font-bold">Denied</span>
                                        @else
                                            <span class="text-yellow-500 font-bold">Pending</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($rent->status == 'pending')
                                            <form action="{{ route('rents.approve', $rent) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Approve</button>
                                            </form>
                                            <form action="{{ route('rents.deny', $rent) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded ml-2">Deny</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
