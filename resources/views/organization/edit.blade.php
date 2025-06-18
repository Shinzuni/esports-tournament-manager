@extends('layouts.app')
@section('content')
@can('update', $organization)
    <h1>Edit Organization</h1>
    <form method="POST" action="{{ route('organizations.update', $organization) }}">
        @csrf
        @method('PUT')
        <label>Name: <input type="text" name="name" value="{{ $organization->name }}" required></label>
        <button type="submit">Update</button>
    </form>
@else
    <p>You are not authorized to edit this organization.</p>
@endcan
@endsection
