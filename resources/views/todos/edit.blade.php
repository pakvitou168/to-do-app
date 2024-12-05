@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Edit Todo</h1>

        <form action="{{ route('todos.update', $todo) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ $todo->title }}" class="w-full px-3 py-2 border rounded" required>
                @error('title')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description (Optional)</label>
                <textarea name="description" id="description" class="w-full px-3 py-2 border rounded">{{ $todo->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_completed" value="1"
                           {{ $todo->is_completed ? 'checked' : '' }}
                           class="form-checkbox">
                    <span class="ml-2">Completed</span>
                </label>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Update Todo
            </button>
        </form>
    </div>
@endsection
