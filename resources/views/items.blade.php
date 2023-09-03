@extends('layouts.main')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Items List</h2>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        URL
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $item->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        ${{ number_format($item->price, 2) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ $item->url }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">{{ $item->url }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection