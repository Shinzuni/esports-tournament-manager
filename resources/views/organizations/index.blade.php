@extends('layouts.app')

@section('content')
    <div class="container bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-white">Organizations</h1>

        @can('create', App\Models\Organization::class)
            <a href="{{ route('organizations.create') }}" class="btn bg-blue-600 hover:bg-blue-700 text-white rounded-md p-2 mt-4">Create New Organization</a>
        @endcan

        <table class="table mt-6 w-full text-white bg-white dark:bg-gray-800 border-separate border border-gray-300 dark:border-gray-600 rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="text-left py-2 px-4">Name</th>
                    <th class="text-left py-2 px-4">Description</th>
                    <th class="text-left py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($organizations as $organization)
                    <tr class="border-t border-gray-300 dark:border-gray-600">
                        <td class="py-3 px-4">{{ $organization->name }}</td>
                        <td class="py-3 px-4">{{ $organization->description }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('organizations.show', $organization) }}" class="btn bg-blue-600 hover:bg-blue-700 text-white rounded-md p-2">View</a>

                            @can('update', $organization)
                                <a href="{{ route('organizations.edit', $organization) }}" class="btn bg-yellow-600 hover:bg-yellow-700 text-white rounded-md p-2 ml-2">Edit</a>
                            @endcan

                            @can('delete', $organization)
                                <form action="{{ route('organizations.destroy', $organization) }}" method="POST" class="inline ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-red-600 hover:bg-red-700 text-white rounded-md p-2">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
