<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-10">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Riwayat Sewa Saya</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($bookings as $booking)
                    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100 flex flex-col md:flex-row gap-6">
                        <!-- Thumbnail Rumah -->
                        <div class="w-full md:w-32 h-32 flex-shrink-0">
                            @php
                                $thumb = filter_var($booking->house->thumbnail, FILTER_VALIDATE_URL)
                                         ? $booking->house->thumbnail
                                         : asset('storage/' . $booking->house->thumbnail);
                            @endphp
                            <img src="{{ $thumb }}" class="w-full h-full object-cover rounded-xl" alt="{{ $booking->house->title }}">
                        </div>

                        <!-- Informasi Sewa -->
                        <div class="flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <h2 class="text-xl font-bold text-gray-800">{{ $booking->house->title }}</h2>
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase
                                    {{ $booking->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                                    {{ $booking->status }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 mb-4">{{ $booking->house->address }}</p>

                            <div class="grid grid-cols-2 gap-4 text-sm border-t pt-4">
                                <div>
                                    <p class="text-gray-400">Durasi</p>
                                    <p class="font-semibold">{{ $booking->duration_months }} Bulan</p>
                                </div>
                                <div>
                                    <p class="text-gray-400">Total Tagihan</p>
                                    <p class="font-bold text-blue-600">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <!-- Petunjuk Pembayaran jika status masih Pending -->
                            @if($booking->status == 'pending')
                                <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-100">
                                    <p class="text-sm font-bold text-blue-800 mb-1">Silakan Lakukan Pembayaran:</p>
                                    <p class="text-xs text-blue-600 mb-3 leading-relaxed">Transfer ke rekening berikut dan kirim bukti bayar ke WhatsApp Admin.</p>
                                    <div class="bg-white p-3 rounded-lg border border-blue-200">
                                        <p class="text-sm font-mono font-bold text-gray-700">Bank BCA: 123-456-7890</p>
                                        <p class="text-xs text-gray-500">A/N Sewa Rumah Indonesia</p>
                                    </div>

                                    {{-- Link WhatsApp Otomatis --}}
                                    @php
                                        $pesanWA = urlencode("Halo Admin, saya ingin konfirmasi pembayaran sewa rumah " . $booking->house->title . " atas nama " . Auth::user()->name);
                                    @endphp
                                    <a href="https://wa.me{{ $pesanWA }}"
                                       target="_blank"
                                       class="block mt-3 text-center bg-green-500 hover:bg-green-600 text-white text-xs font-bold py-2 rounded-lg transition shadow-sm">
                                       Kirim Bukti via WhatsApp
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 inline-block">
                            <p class="text-gray-400 italic mb-4">Kamu belum memiliki riwayat sewa.</p>
                            <a href="{{ route('houses.index') }}" class="text-blue-600 font-bold hover:underline">Cari Rumah Sekarang</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
