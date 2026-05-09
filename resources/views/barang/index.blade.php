<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Daftar Barang</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">

                <!-- Form Tambah Barang -->
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" class="mb-10 bg-gray-50 p-6 rounded-lg border border-gray-200">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                        <input type="text" name="nama_barang" placeholder="Nama Barang" class="rounded-md border-gray-400 p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <input type="text" name="kode_barang" placeholder="Kode Barang" class="rounded-md border-gray-400 p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <input type="number" name="stok" placeholder="Stok" class="rounded-md border-gray-400 p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <input type="file" name="gambar" class="p-1 border border-gray-400 rounded bg-white text-sm">
                    </div>
                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-black py-3 rounded-lg shadow-md uppercase tracking-wider transition duration-200">
                        Simpan Data Barang Baru
                    </button>
                </form>

                <!-- Tabel Data Barang -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-800 text-white">
                                <th class="p-4 text-center rounded-tl-lg">Foto</th>
                                <th class="p-4 text-left">Nama Barang</th>
                                <th class="p-4 text-center">Stok</th>
                                <th class="p-4 text-center">Kode Barang</th>
                                <th class="p-4 text-center">Kondisi</th>
                                <th class="p-4 text-center rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $b)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="p-3 text-center">
                                    @if($b->gambar)
                                        <img src="{{ asset('storage/barang/' . $b->gambar) }}" class="w-16 h-16 object-cover rounded border shadow-sm mx-auto">
                                    @else
                                        <span class="text-xs text-gray-400 italic">No Image</span>
                                    @endif
                                </td>


                                <td class="p-3">
                                    <div class="font-bold text-gray-800">{{ $b->nama_barang }}</div>
                                    <div class="text-xs text-gray-500 font-mono">{{ $b->kode_barang }}</div>
                                </td>
                                <td class="p-3 text-center">
                                    <span class="bg-gray-200 px-3 py-1 rounded-full font-bold text-gray-700 text-sm">
                                        {{ $b->stok }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    <span class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full font-bold text-sm">
                                        {{ $b->kondisi }}
                                    </span>
                                </td>
                                <td class="p-3">
                                    <!-- Container Flex untuk tombol sejajar ke samping -->
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('barang.edit', $b->id) }}"

                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded font-bold shadow text-xs w-20 text-center transition">
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('barang.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded font-bold shadow text-xs w-20 transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
