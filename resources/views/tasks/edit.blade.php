@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<h2>Edit Task</h2>
<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ $task->title }}" required>
    
    <label for="description">Description:</label>
    <textarea name="description">{{ $task->description }}</textarea>
    
    <label for="priority">Priority:</label>
    <select name="priority" required>
        <option value="low" {{ $task->priority === 'low' ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>High</option>
    </select>
    
    <label for="status">Status:</label>
    <select name="status" required>
        <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="in-progress" {{ $task->status === 'in-progress' ? 'selected' : '' }}>In Progress</option>
        <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Completed</option>
    </select>
    
    <label for="assigned_user_id">Assign User:</label>
    <select name="assigned_user_id">
        <option value="">Unassigned</option>
        @foreach ($users as $user)
        <option value="{{ $user->id }}" {{ $task->assigned_user_id === $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach
    </select>
    
    <button type="submit">Update</button>
</form>
@endsection
