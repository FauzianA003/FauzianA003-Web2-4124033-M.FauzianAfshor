<x-app-layout>
    <x-slot name="header"><h2 class="font-bold text-2xl">Transaksi Peminjaman</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border">
                <form action="{{ route('peminjaman.store') }}" method="POST" class="mb-10 bg-gray-50 p-6 rounded-lg border border-gray-200">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <select name="anggota_id" class="rounded border-gray-400" required>
                            <option value="">Pilih Anggota</option>
                            @foreach($anggotas as $a) <option value="{{ $a->id }}">{{ $a->nama_lengkap }}</option> @endforeach
                        </select>
                        <select name="barang_id" class="rounded border-gray-400" required>
                            <option value="">Pilih Barang</option>
                            @foreach($barangs as $b) <option value="{{ $b->id }}">{{ $b->nama_barang }} (Stok: {{ $b->stok }})</option> @endforeach
                        </select>
                        <input type="date" name="tgl_pinjam" value="{{ date('Y-m-d') }}" class="rounded border-gray-400" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-black py-3 rounded-lg shadow transition">Proses Peminjaman</button>
                </form>
                <table class="w-full text-left">
                    <tr class="bg-gray-800 text-white">
                        <th class="p-3">Nama</th><th class="p-3">Barang</th><th class="p-3">Status</th><th class="p-3 text-center">Aksi</th>
                    </tr>
                    @foreach($peminjamans as $p)
                    <tr class="border-b">
                        <td class="p-3 font-bold">{{ $p->anggota->nama_lengkap ?? 'N/A' }}</td>
                        <td class="p-3">{{ $p->barang->nama_barang ?? 'N/A' }}</td>
                        <td class="p-3"><span class="px-3 py-1 rounded-full font-bold bg-blue-100 text-blue-800 text-xs">{{ $p->status }}</span></td>
                        <td class="p-3 text-center">
                            @if($p->status == 'Dipinjam')
                            <form action="{{ route('peminjaman.kembali', $p->id) }}" method="POST" class="inline">
                                @csrf <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded font-bold shadow transition">Kembalikan</button>
                            </form>
                            @else <span class="text-green-600 font-black">SELESAI</span> @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
