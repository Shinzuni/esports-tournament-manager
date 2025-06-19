@extends('layouts.app')

@section('content')
    <div class="container bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-white">{{ $tournament->name }}</h1>
        <p class="text-white">Start: {{ $tournament->start_date }}</p>
        <p class="text-white">End: {{ $tournament->end_date }}</p>
        <p class="text-white">Organization: {{ $tournament->organization->name }}</p>

        @can('update', $tournament)
            <a href="{{ route('tournaments.edit', $tournament) }}" class="btn bg-yellow-600 hover:bg-yellow-700 text-white rounded-md p-2 mt-4">Edit</a>
        @endcan

        @can('delete', $tournament)
            <form method="POST" action="{{ route('tournaments.destroy', $tournament) }}" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg-red-600 hover:bg-red-700 text-white rounded-md p-2">Delete</button>
            </form>
        @endcan
    </div>
@endsection
