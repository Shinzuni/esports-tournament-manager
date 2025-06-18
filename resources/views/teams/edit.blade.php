@extends('layouts.app')
@section('content')
@can('update', $team)
    <h1>Edit Team</h1>
    <form method="POST" action="{{ route('teams.update', $team) }}">
        @csrf
        @method('PUT')
        <label>Name: <input type="text" name="name" value="{{ $team->name }}" required></label>
        <label>Organization:
            <select name="organization_id">
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}" @selected($organization->id == $team->organization_id)>
                        {{ $organization->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <button type="submit">Update</button>
    </form>
@else
    <p>You are not authorized to edit this team.</p>
@endcan
@endsection
