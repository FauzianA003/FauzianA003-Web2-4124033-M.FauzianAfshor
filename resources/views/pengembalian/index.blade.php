<x-app-layout>
    <x-slot name="header"><h2 class="font-bold text-2xl text-gray-800">Daftar Pengembalian</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border">
                <table class="w-full border-collapse">
                    <tr class="bg-emerald-700 text-white">
                        <th class="p-3 text-left">Nama Peminjam</th>
                        <th class="p-3 text-left">Barang</th>
                        <th class="p-3 text-center">Tgl Selesai</th>
                    </tr>
                    @forelse($pengembalians as $p)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 font-bold">{{ $p->anggota->nama_lengkap }}</td>
                        <td class="p-3">{{ $p->barang->nama_barang }}</td>
                        <td class="p-3 text-center">{{ $p->updated_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="p-6 text-center text-gray-500 italic font-bold">Belum ada barang yang dikembalikan.</td></tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
