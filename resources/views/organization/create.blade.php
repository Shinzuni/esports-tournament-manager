@extends('layouts.app')
@section('content')
<h1>Create Organization</h1>
<form method="POST" action="{{ route('organizations.store') }}">
    @csrf
    <label>Name: <input type="text" name="name" required></label>
    <button type="submit">Save</button>
</form>
@endsection