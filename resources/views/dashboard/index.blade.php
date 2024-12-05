@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h2>Admin Dashboard</h2>

<h3>Total Users by Role:</h3>
<ul>
    @foreach ($totalUsersByRole as $role)
    <li>{{ $role->role }}: {{ $role->count }}</li>
    @endforeach
</ul>

<h3>Total Tasks by Status:</h3>
<ul>
    @foreach ($totalTasksByStatus as $status)
    <li>{{ ucfirst($status->status) }}: {{ $status->count }}</li>
    @endforeach
</ul>

<h3>Total Tasks by Priority:</h3>
<ul>
    @foreach ($totalTasksByPriority as $priority)
    <li>{{ ucfirst($priority->priority) }}: {{ $priority->count }}</li>
    @endforeach
</ul>
@endsection
