@extends('layouts.app')

@section('content')
    <div class="container bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-white">{{ $team->name }}</h1>
        <p class="text-white">Organization: {{ $team->organization->name }}</p>

        @can('update', $team)
            <a href="{{ route('teams.edit', $team) }}" class="btn bg-yellow-600 hover:bg-yellow-700 text-white rounded-md p-2 mt-4">Edit</a>
        @endcan

        @can('delete', $team)
            <form method="POST" action="{{ route('teams.destroy', $team) }}" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg-red-600 hover:bg-red-700 text-white rounded-md p-2">Delete</button>
            </form>
        @endcan
    </div>
@endsection
