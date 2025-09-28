@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">User List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    {{-- register user --}}
    <div class="mb-3">
        <a href="{{ route('register') }}" class="btn btn-primary">Register New User</a>
</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge bg-info text-dark">{{ ucfirst($user->role) }}</span>
                    </td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No users found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">
    {{ $users->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
</div>
@endsection
