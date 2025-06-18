@extends('layouts.app')
@section('content')
<h1>Tournaments</h1>

@can('create', App\Models\Tournament::class)
    <a href="{{ route('tournaments.create') }}">Create Tournament</a>
@endcan

<ul>
    @foreach($tournaments as $tournament)
        <li><a href="{{ route('tournaments.show', $tournament) }}">{{ $tournament->name }}</a></li>
    @endforeach
</ul>
@endsection
