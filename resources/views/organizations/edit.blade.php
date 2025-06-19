@extends('layouts.app')

@section('content')
    <div class="container bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-white">Edit Organization</h1>

        <form action="{{ route('organizations.update', $organization) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mt-4">
                <label for="name" class="text-white">Organization Name</label>
                <input type="text" id="name" name="name" class="form-control bg-gray-100 dark:bg-gray-700 text-white border border-gray-300 dark:border-gray-600 rounded-md p-2 w-full" value="{{ $organization->name }}" required>
            </div>

            <div class="form-group mt-4">
                <label for="description" class="text-white">Description</label>
                <textarea id="description" name="description" class="form-control bg-gray-100 dark:bg-gray-700 text-white border border-gray-300 dark:border-gray-600 rounded-md p-2 w-full" rows="4" required>{{ $organization->description }}</textarea>
            </div>

            <button type="submit" class="btn bg-yellow-600 hover:bg-yellow-700 text-white rounded-md p-2 mt-4">Update Organization</button>
        </form>
    </div>
@endsection
