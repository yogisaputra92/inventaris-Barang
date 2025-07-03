<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aplikasi Inventaris</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 border-r text-white font-bold text-2xl">
            <div class="max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white font-bold text-center">
                Inventaris
            </div>

            @auth
            <div class="p-4 space-y-2 text-base">
                <p class="font-semibold text-gray-500 py-2 px-3">Hai, {{ Auth::user()->name }}</p>

                <!-- Menu Admin -->
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('dashboard.admin') }}"
                    class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Dashboard
                </a>

                <a href="{{ route('produk.index') }}"
                    class="block px-3 py-2 hover:bg-gray-100 hover:text-gray-900 rounded">Stok
                    Barang</a>

                </a>

                <!-- barang -->
                <div class="dropdown relative" x-data="{ open: false }">
                    <a @click="open = !open" class="block hover:bg-gray-100 hover:text-gray-900 px-3 py-2">
                        Management Barang
                    </a>

                    <ul class="space-y-1 mt-8" :class="{ 'block': open, 'hidden': !open }">
                        <li>
                            <a href="{{ route('barang.index') }}"
                                class="block px-4 py-2 rounded hover:bg-gray-100 text-sm hover:text-gray-900 text-white">
                                📥 Barang Masuk
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('barang_keluar.index') }}"
                                class="block px-4 py-2 rounded hover:bg-gray-100 text-sm hover:text-gray-900 text-white">
                                📤 Barang Keluar
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- laporan -->
                <div class="dropdown relative" x-data="{ open: false }">
                    <a @click="open = !open" class="block hover:bg-gray-100 hover:text-gray-900 px-3 py-2">
                        Laporan
                    </a>

                    <ul class="space-y-1 mt-8" :class="{ 'block': open, 'hidden': !open }">
                        <li>
                            <a href="{{ route('laporan.barangMasuk') }}"
                                class="block px-4 py-2 rounded hover:bg-gray-100 text-sm hover:text-gray-900 text-white">
                                📥 Barang Masuk
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.barangKeluar') }}"
                                class="block px-4 py-2 rounded hover:bg-gray-100 text-sm hover:text-gray-900 text-white">
                                📤 Barang Keluar
                            </a>
                        </li>
                    </ul>
                </div>

                <a href="{{ route('users.index') }}"
                    class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Kelola Pengguna
                </a>
                @endif

                <!-- Menu User -->
                @if(Auth::user()->role === 'user')
                <a href="{{ route('dashboard.user') }}"
                    class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Dashboard
                </a>

                <a href="{{ route('produk.index') }}" class="block px-4 py-2 hover:bg-gray-200 rounded">Stok Barang</a>

                {{-- tambahkan menu khusus user di sini jika ada --}}
                <a href="{{ route('barang.index') }}"
                    class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Barang Masuk
                </a>

                <a href="{{ route('barang_keluar.index') }}"
                    class="block px-3 py-2 hover:bg-gray-100 hover:text-gray-900 rounded">Barang Keluar</a>

                @endif

                <a href="{{ route('profile.edit') }}"
                    class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
                    Profil
                </a>

                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900">
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