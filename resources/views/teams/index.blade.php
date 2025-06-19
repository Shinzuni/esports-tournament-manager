@extends('layouts.app')

@section('content')
    <div class="container bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-white">Teams</h1>

        @can('create', App\Models\Team::class)
            <a href="{{ route('teams.create') }}" class="btn bg-blue-600 hover:bg-blue-700 text-white rounded-md p-2 mt-4">Create Team</a>
        @endcan

        <ul class="mt-6 text-white">
            @foreach($teams as $team)
                <li class="py-2">
                    <a href="{{ route('teams.show', $team) }}" class="text-white hover:underline">{{ $team->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
