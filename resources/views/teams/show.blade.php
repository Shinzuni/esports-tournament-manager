@extends('layouts.app')
@section('content')
<h1>{{ $team->name }}</h1>
<p>Organization: {{ $team->organization->name }}</p>

@can('update', $team)
    <a href="{{ route('teams.edit', $team) }}">Edit</a>
@endcan

@can('delete', $team)
    <form method="POST" action="{{ route('teams.destroy', $team) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endcan
@endsection
