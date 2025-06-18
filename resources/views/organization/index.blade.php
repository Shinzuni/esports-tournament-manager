@extends('layouts.app')
@section('content')
<h1>Organizations</h1>

@can('create', App\Models\Organization::class)
    <a href="{{ route('organizations.create') }}">Create Organization</a>
@endcan

<ul>
    @foreach($organizations as $organization)
        <li><a href="{{ route('organizations.show', $organization) }}">{{ $organization->name }}</a></li>
    @endforeach
</ul>
@endsection
