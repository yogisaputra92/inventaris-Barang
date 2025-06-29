@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="bg-white shadow max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight ">Kelola Pengguna</h1>
    </div>
    <div class="max-w-4xl mx-auto mt-10">

        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <table class="w-full border border-gray-300 rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Role</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="text-center bg-white">
                    <td class="p-2 border">{{ $user->name }}</td>
                    <td class="p-2 border">{{ $user->email }}</td>
                    <td class="p-2 border">
                        <span
                            class="inline-block px-2 py-1 text-sm rounded 
                                {{ $user->role === 'admin' ? 'bg-blue-200 text-blue-800' : 'bg-gray-200 text-gray-800' }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="p-2 border">
                        <form action="{{ route('users.updateRole', $user->id) }}" method="POST"
                            class="flex justify-center gap-2">
                            @csrf
                            @method('PUT')
                            <select name="role" class="rounded border-gray-300 px-4 py-1 text-sm">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            <button type="submit">
                                <p class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Ubah</p>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
@endsection