<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Daftar Anggota</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">

                <!-- Form Tambah Anggota -->
                <form action="{{ route('anggota.store') }}" method="POST" class="mb-10 bg-gray-50 p-6 rounded-lg border border-gray-200">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" placeholder="Contoh: Budi Santoso" class="w-full rounded-md border-gray-400 p-2 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-1">NIM / NIK</label>
                            <input type="text" name="nomor_induk" placeholder="Contoh: 2024001" class="w-full rounded-md border-gray-400 p-2 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-1">No HP / Kontak</label>
                            <input type="text" name="kontak" placeholder="Contoh: 0812345678" class="w-full rounded-md border-gray-400 p-2 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                        </div>
                    </div>

                    <!-- Tombol Simpan (Warna Hijau Solid) -->
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-black py-3 rounded-lg shadow-md uppercase tracking-wider transition duration-200">
                        Simpan Anggota Baru
                    </button>
                </form>

                <hr class="mb-6">

                <!-- Tabel Data Anggota -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-800 text-white font-bold">
                                <th class="p-4 text-left rounded-tl-lg">Nama Lengkap</th>
                                <th class="p-4 text-center">Nomor Induk</th>
                                <th class="p-4 text-center">No HP / Kontak</th> <!-- Kolom Baru -->
                                <th class="p-4 text-center rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggotas as $a)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="p-4 font-bold text-gray-800">{{ $a->nama_lengkap }}</td>
                                <td class="p-4 text-center text-gray-600">{{ $a->nomor_induk }}</td>
                                <td class="p-4 text-center text-gray-600">{{ $a->kontak }}</td> <!-- Data Kontak -->
                                <td class="p-4 text-center">
                                    <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded font-bold shadow text-xs transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($anggotas->isEmpty())
                    <p class="text-center text-gray-500 mt-6 italic">Belum ada data anggota.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
