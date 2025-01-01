<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    // Menampilkan halaman pengaduan
    public function showPengaduan()
    {
        return view('user.pengaduan')->with('title', 'Pengaduan');
    }

    // Menyimpan pengaduan yang diajukan oleh pengguna
    public function submitPengaduan(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'jenis_laporan' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'bukti' => 'required|array', // Untuk beberapa file
            'bukti.*' => 'file|mimes:jpeg,png,jpg,gif,webp,mp4,webm,ogg|max:2048', // Validasi tiap file
        ]);

        // Proses upload file
        $paths = []; // Array untuk menyimpan path file yang diupload
        if ($request->hasFile('bukti')) {
            foreach ($request->file('bukti') as $file) {
                // Generate nama file unik
                $filename = time() . '_' . $file->getClientOriginalName();
                // Simpan file ke storage/public
                $path = $file->storeAs('uploads/bukti', $filename, 'public');
                // Simpan path file ke array
                $paths[] = $path;
            }
        }

        // Simpan data ke database
        $pengaduan = new Pengaduan();
        $pengaduan->user_id = Auth::id();  // Ambil user_id dari autentikasi
        $pengaduan->jenis_laporan = $validatedData['jenis_laporan'];
        $pengaduan->keterangan = $validatedData['keterangan'];
        $pengaduan->bukti = json_encode($paths); // Simpan array path dalam format JSON
        $pengaduan->save();

        return redirect()->route('pengaduan.tampil')->with('success', 'Pengaduan berhasil disubmit!');
    }
}
