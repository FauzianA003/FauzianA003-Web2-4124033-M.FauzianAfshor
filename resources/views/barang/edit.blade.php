<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Form Edit Barang -->
                <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Wajib ada untuk proses Update -->

                    <div class="grid grid-cols-1 gap-6">
                        <!-- Nama Barang -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <!-- Kode Barang -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Kode Barang</label>
                            <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <!-- Stok -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Stok</label>
                            <input type="number" name="stok" value="{{ $barang->stok }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <!-- Kondisi -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Kondisi</label>
                            <select name="kondisi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="Baik" {{ $barang->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak" {{ $barang->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                            </select>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-bold transition">
                                Update Data
                            </button>
                            <a href="{{ route('barang.index') }}" class="text-gray-600 hover:underline">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
