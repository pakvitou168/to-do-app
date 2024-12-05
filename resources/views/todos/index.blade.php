@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Todo List</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('todos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Create New Todo
        </a>

        @foreach($todos as $todo)
            <div class="flex items-center justify-between bg-gray-100 p-4 rounded mb-2">
                <div class="flex items-center">
                    <form action="{{ route('todos.toggle', $todo) }}" method="POST" class="mr-4">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="{{ $todo->is_completed ? 'bg-green-500' : 'bg-gray-300' }} w-6 h-6 rounded"></button>
                    </form>
                    <span class="{{ $todo->is_completed ? 'line-through text-gray-500' : '' }}">
                    {{ $todo->title }}
                </span>
                </div>
                <div>
                    <a href="{{ route('todos.edit', $todo) }}" class="text-blue-500 mr-2">Edit</a>
                    <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $todos->links() }}
    </div>
@endsection
