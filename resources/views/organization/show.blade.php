@extends('layouts.app')
@section('content')
<h1>{{ $organization->name }}</h1>

@can('update', $organization)
    <a href="{{ route('organizations.edit', $organization) }}">Edit</a>
@endcan

@can('delete', $organization)
    <form method="POST" action="{{ route('organizations.destroy', $organization) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endcan
@endsection
