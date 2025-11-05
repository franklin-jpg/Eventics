@extends('layouts.admin')

@section('content')
<main class="p-4">

    <!-- Page Title -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">User Management</h4>

        <div class="md:flex hidden items-center gap-2.5 font-semibold">
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Attex</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Menu</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">
                    User
                </a>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- User Stats Cards -->
    <div class="grid 2xl:grid-cols-5 lg:grid-cols-6 md:grid-cols-2 gap-6 mb-6">
        <div class="card p-6">
            <h5 class="text-gray-500 text-sm">All Users</h5>
            <h3 class="text-2xl font-semibold my-3">{{ $allUsers->count() }}</h3>
            <p class="text-gray-400">Total Registered Users</p>
        </div>

        <div class="card p-6">
            <h5 class="text-gray-500 text-sm">Admins</h5>
            <h3 class="text-2xl font-semibold my-3">{{ $admins->count() }}</h3>
            <p class="text-gray-400">Total Admin Accounts</p>
        </div>

        <div class="card p-6">
            <h5 class="text-gray-500 text-sm">Regular Users</h5>
            <h3 class="text-2xl font-semibold my-3">{{ $regularUsers->count() }}</h3>
            <p class="text-gray-400">Non-admin users</p>
        </div>

        <div class="card p-6">
            <h5 class="text-gray-500 text-sm">Active Users</h5>
            <h3 class="text-2xl font-semibold my-3 text-green-600">{{ $activeUsers->count() }}</h3>
            <p class="text-gray-400">Currently active accounts</p>
        </div>

        <div class="card p-6">
            <h5 class="text-gray-500 text-sm">Inactive Users</h5>
            <h3 class="text-2xl font-semibold my-3 text-red-600">{{ $inactiveUsers->count() }}</h3>
            <p class="text-gray-400">Deactivated or suspended accounts</p>
        </div>
    </div>

    <!-- Registered Users Table -->
    <div class="card">
        <div class="p-6 overflow-x-auto">
            <h5 class="text-lg font-semibold text-slate-800 mb-4">All Registered Users</h5>

            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-900 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">User ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allUsers as $user)
                    <tr class="border-b hover:bg-opacity-75 
                        {{ $user->active ? 'bg-green-100' : 'bg-red-100' }}">
                        <td class="px-4 py-3 font-medium text-gray-500 dark:text-gray-400">{{ $user->id }}</td>
                        <td class="px-4 py-3 dark:text-gray-400">{{ $user->name }}</td>
                        <td class="px-4 py-3 dark:text-gray-400">{{ $user->email }}</td>
                        <td class="px-4 py-3 dark:text-gray-400">
                            <span class="px-2 py-1 rounded text-xs font-semibold
                                {{ $user->role === 'admin' ? 'bg-blue-100 text-blue-800' : ' text-gray-700' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 dark:text-gray-400">
                            <span class="px-2 py-1 rounded text-xs font-semibold
                                {{ $user->active ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                {{ $user->active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 dark:text-gray-400">{{ $user->created_at->format('d M, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($allUsers->isEmpty())
                <p class="text-center text-gray-500 py-4">No users found.</p>
            @endif
        </div>
    </div>
</main>
@endsection
