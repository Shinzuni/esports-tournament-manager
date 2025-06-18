@extends('layouts.app')
@section('content')
<h1>{{ $tournament->name }}</h1>
<p>Start: {{ $tournament->start_date }}</p>
<p>End: {{ $tournament->end_date }}</p>
<p>Organization: {{ $tournament->organization->name }}</p>

@can('update', $tournament)
    <a href="{{ route('tournaments.edit', $tournament) }}">Edit</a>
@endcan

@can('delete', $tournament)
    <form method="POST" action="{{ route('tournaments.destroy', $tournament) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endcan
@endsection
