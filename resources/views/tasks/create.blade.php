@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<h2>Create Task</h2>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    
    <label for="description">Description:</label>
    <textarea name="description"></textarea>
    
    <label for="priority">Priority:</label>
    <select name="priority" required>
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
    </select>
    
    <label for="assigned_user_id">Assign User:</label>
    <select name="assigned_user_id">
        <option value="">Unassigned</option>
        @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    
    <button type="submit">Create</button>
</form>
@endsection
