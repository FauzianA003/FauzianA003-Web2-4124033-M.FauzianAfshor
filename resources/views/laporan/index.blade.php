<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl">Laporan Inventaris</h2>
            <button onclick="window.print()" class="bg-gray-800 text-white px-6 py-2 rounded-lg font-bold shadow hover:bg-gray-700 transition">Cetak Laporan</button>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-gray-100 uppercase font-black">
                        <tr>
                            <th class="p-3 border">No</th><th class="p-3 border">Tgl</th><th class="p-3 border">Nama</th><th class="p-3 border">Barang</th><th class="p-3 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporans as $i => $l)
                        <tr>
                            <td class="p-3 border text-center font-bold">{{ $i+1 }}</td>
                            <td class="p-3 border">{{ $l->tgl_pinjam }}</td>
                            <td class="p-3 border font-bold">{{ $l->anggota->nama_lengkap ?? 'N/A' }}</td>
                            <td class="p-3 border">{{ $l->barang->nama_barang ?? 'N/A' }}</td>
                            <td class="p-3 border text-center">
                                <span class="px-3 py-1 rounded font-bold text-xs uppercase {{ $l->status == 'Dipinjam' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $l->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
