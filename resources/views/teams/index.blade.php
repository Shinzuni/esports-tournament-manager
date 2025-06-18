@extends('layouts.app')
@section('content')
<h1>Teams</h1>

@can('create', App\Models\Team::class)
    <a href="{{ route('teams.create') }}">Create Team</a>
@endcan

<ul>
    @foreach($teams as $team)
        <li><a href="{{ route('teams.show', $team) }}">{{ $team->name }}</a></li>
    @endforeach
</ul>
@endsection
