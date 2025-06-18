@extends('layouts.app')
@section('content')
@can('update', $tournament)
    <h1>Edit Tournament</h1>
    <form method="POST" action="{{ route('tournaments.update', $tournament) }}">
        @csrf
        @method('PUT')
        <label>Name: <input type="text" name="name" value="{{ $tournament->name }}" required></label>
        <label>Start Date: <input type="date" name="start_date" value="{{ $tournament->start_date }}" required></label>
        <label>End Date: <input type="date" name="end_date" value="{{ $tournament->end_date }}" required></label>
        <label>Organization:
            <select name="organization_id">
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}" @selected($organization->id == $tournament->organization_id)>
                        {{ $organization->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <button type="submit">Update</button>
    </form>
@else
    <p>You are not authorized to edit this tournament.</p>
@endcan
@endsection
