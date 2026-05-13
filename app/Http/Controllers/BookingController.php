<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar pesanan (Admin)
     */
    public function index()
    {
        // Mengambil semua data booking beserta info rumah dan usernya
        $bookings = Booking::with(['house', 'user'])->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Menampilkan riwayat sewa milik user yang sedang login (User)
     */
    public function myBookings()
    {
        // Mengambil data sewa hanya milik user yang sedang login
        $bookings = Booking::where('user_id', Auth::id())
                    ->with('house')
                    ->latest()
                    ->get();

        return view('bookings.my_bookings', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $request->status]);

        return back()->with('message', 'Status pesanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return back()->with('message', 'Pesanan berhasil dihapus!');
    }

    /**
     * Menyimpan data pemesanan ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi Input dari Form
        $request->validate([
            'house_id' => 'required|exists:houses,id',
            'user_name' => 'required|string|max:255',
            'user_phone' => 'required|string|max:20',
            'start_date' => 'required|date|after:today',
            'duration_months' => 'required|integer|min:1',
        ]);

        // 2. Ambil data rumah untuk mendapatkan harga per bulan
        $house = House::findOrFail($request->house_id);

        // 3. Hitung Total Harga (Durasi x Harga per bulan)
        $totalPrice = $request->duration_months * $house->price_per_month;

        // 4. Simpan ke Database
        Booking::create([
            'user_id' => Auth::id(), // Pastikan menggunakan Auth::id() dengan A besar
            'house_id' => $request->house_id,
            'user_name' => $request->user_name,
            'user_phone' => $request->user_phone,
            'start_date' => $request->start_date,
            'duration_months' => $request->duration_months,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        // 5. Kembalikan ke halaman sukses
        return redirect()->route('bookings.my')->with('message', 'Pesanan Anda berhasil dikirim silahkan lakukan pembayaran.');
    }
}
