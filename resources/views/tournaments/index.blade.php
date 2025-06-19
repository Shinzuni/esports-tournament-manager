@extends('layouts.app')

@section('content')
    <div class="container bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-white">Tournaments</h1>

        @can('create', App\Models\Tournament::class)
            <a href="{{ route('tournaments.create') }}" class="btn bg-blue-600 hover:bg-blue-700 text-white rounded-md p-2 mt-4">Create Tournament</a>
        @endcan

        <ul class="mt-6 text-white">
            @foreach($tournaments as $tournament)
                <li class="py-2">
                    <a href="{{ route('tournaments.show', $tournament) }}" class="text-white hover:underline">{{ $tournament->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
