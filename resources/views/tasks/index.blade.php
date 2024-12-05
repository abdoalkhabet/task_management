@extends('layouts.app')

@section('title', 'Task List')

@section('content')
<h2>Task List</h2>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Assigned User</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ ucfirst($task->priority) }}</td>
            <td>{{ ucfirst($task->status) }}</td>
            <td>{{ $task->assignedUser->name ?? 'Unassigned' }}</td>
            <td>
                <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
