<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aplikasi Inventaris</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 border-r shadow-md text-white font-bold">
            <div class="shadow max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white font-bold text-center">
                Inventaris
            </div>

            @auth
            <div class="p-4 space-y-2 text-sm">
                <p class="font-semibold text-gray-500">Hai, {{ Auth::user()->name }}</p>

                <!-- Menu Admin -->
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('dashboard.admin') }}" class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Dashboard
                </a>
                
                <a href="{{ route('barang.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Management Barang
                </a>
                
                <a href="{{ route('users.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Kelola Pengguna
                </a>
                @endif
                
                <!-- Menu User -->
                @if(Auth::user()->role === 'user')
                <a href="{{ route('dashboard.user') }}" class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Dashboard
                </a>
                {{-- tambahkan menu khusus user di sini jika ada --}}
                <a href="{{ route('barang.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Management Barang
                </a>
                @endif

                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Profil
                </a>

                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                        Logout
                    </button>
                </form>
            </div>
            @endauth
        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-0">
            @yield('content')
        </main>
    </div>
</body>

</html>