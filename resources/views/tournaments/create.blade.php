@extends('layouts.app')
@section('content')
<h1>Create Tournament</h1>
<form method="POST" action="{{ route('tournaments.store') }}">
    @csrf
    <label>Name: <input type="text" name="name" required></label>
    <label>Start Date: <input type="date" name="start_date" required></label>
    <label>End Date: <input type="date" name="end_date" required></label>
    <label>Organization:
        <select name="organization_id">
            @foreach($organizations as $organization)
                <option value="{{ $organization->id }}">{{ $organization->name }}</option>
            @endforeach
        </select>
    </label>
    <button type="submit">Save</button>
</form>
@endsection
