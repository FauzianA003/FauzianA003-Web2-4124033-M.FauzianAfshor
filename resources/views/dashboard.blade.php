<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Dashboard Statistik</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card Biru -->
                <div class="bg-blue-600 p-6 rounded-xl shadow-lg text-white border-b-4 border-blue-800">
                    <p class="text-sm uppercase font-bold opacity-80">Total Barang</p>
                    <h3 class="text-5xl font-black">{{ $totalBarang }}</h3>
                </div>
                <!-- Card Hijau -->
                <div class="bg-emerald-600 p-6 rounded-xl shadow-lg text-white border-b-4 border-emerald-800">
                    <p class="text-sm uppercase font-bold opacity-80">Total Anggota</p>
                    <h3 class="text-5xl font-black">{{ $totalAnggota }}</h3>
                </div>
                <!-- Card Oranye -->
                <div class="bg-orange-500 p-6 rounded-xl shadow-lg text-white border-b-4 border-orange-700">
                    <p class="text-sm uppercase font-bold opacity-80">Sedang Dipinjam</p>
                    <h3 class="text-5xl font-black">{{ $totalPinjam }}</h3>
                </div>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-md border border-gray-200">
                <h3 class="text-xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                <p class="text-gray-600 mt-2">Sistem manajemen inventaris Anda sudah siap digunakan sepenuhnya.</p>
            </div>
        </div>
    </div>
</x-app-layout>
