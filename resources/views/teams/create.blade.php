@extends('layouts.app')
@section('content')
<h1>Create Team</h1>
<form method="POST" action="{{ route('teams.store') }}">
    @csrf
    <label>Name: <input type="text" name="name" required></label>
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