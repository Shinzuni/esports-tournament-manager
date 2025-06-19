@extends('layouts.app')

@section('content')
    <div class="container bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
        @can('update', $team)
            <h1 class="text-3xl font-semibold text-white">Edit Team</h1>
            <form method="POST" action="{{ route('teams.update', $team) }}" class="mt-6">
                @csrf
                @method('PUT')

                <div class="form-group mb-4">
                    <label for="name" class="text-white">Name:</label>
                    <input type="text" name="name" value="{{ $team->name }}" required class="form-control bg-gray-100 dark:bg-gray-700 text-white border border-gray-300 dark:border-gray-600 rounded-md p-2 w-full">
                </div>

                <div class="form-group mb-4">
                    <label for="organization_id" class="text-white">Organization:</label>
                    <select name="organization_id" class="form-control bg-gray-100 dark:bg-gray-700 text-white border border-gray-300 dark:border-gray-600 rounded-md p-2 w-full">
                        @foreach($organizations as $organization)
                            <option value="{{ $organization->id }}" @selected($organization->id == $team->organization_id)>
                                {{ $organization->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn bg-yellow-600 hover:bg-yellow-700 text-white rounded-md p-2">Update</button>
            </form>
        @else
            <p class="text-white">You are not authorized to edit this team.</p>
        @endcan
    </div>
@endsection
