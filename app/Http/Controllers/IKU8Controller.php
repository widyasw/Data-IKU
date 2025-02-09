<?php

namespace App\Http\Controllers;

use App\Helpers\HelperPublic;
use App\Models\IKU8;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IKU8Controller extends Controller
{
    /**
     * Display a listing of the database.
     */
    public function index()
    {
        // buat mengatur breadcrumbs
        // 0: Nama yang akan tampil
        // 1: apakah memiliki route ketika di klik
        // 2: nama routenya apa
        $breadcrumbs = [
            ['IKU 8', true, route('admin.iku-8.index')],
            ['Index', false],
        ];
        // untuk title yang ada ti tab bar
        // untuk title yang ada di halaman nantinya
        $title = 'Data Indikator Kinerja Utama 8';
        // sub title/deskripsi
        $subtitle = 'Program studi yang memiliki akreditasi atau sertifikat internasional yang diakui pemerintah.';
        // list data
        $items = IKU8::latest()->get();

        return view('admin.iku8.index', compact('breadcrumbs', 'title', 'subtitle', 'items'));
    }

    /**
     * Store a newly created resource in database.
     */
    public function store(Request $request)
    {
        try {
            // begin transaksi, ketika terjadi error db nya gajadi disimpan sampai ketemu db::commit
            DB::beginTransaction();
            // validasi laravel
            // required: wajib diisi
            // max: maksimal jumlah karakter
            // date: wajib tanggal yang valid
            // after: data harus setelah ..... tanggalnya
            // required_with: jika ..... diisi, field ini juga harus diisi
            // file: harus kirim file
            $request->validate([
                'name' => 'required|string|max:288',
                'banpt_rating' => 'required|string|max:288',
                'banpt_start_date' => 'required|date',
                'banpt_end_date' => 'required|date|after:banpt_start_date',
                'international_rating' => 'nullable|string|max:288',
                'international_start_date' => 'nullable|required_with:international_rating|date',
                'international_end_date' => 'nullable|required_with:international_start_date|date|after:international_start_date',
                'file' => 'required|file',
            ]);

            // karena pasti ada file yang dikirim
            $file = $request->file;
            // ambil nama file dengan menghapus spasi untuk disimpan di database
            $fileName = str_replace(' ', '', $file->getClientOriginalName());
            // upload file ke storage laravel cek classnya aja untuk detailnya
            $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-8');

            // simpan di database, jangan lupa setting di model fillable/guarded nya
            IKU8::create([
                'name' => $request->name,
                'banpt_rating' => $request->banpt_rating,
                'banpt_start_date' => $request->banpt_start_date,
                'banpt_end_date' => $request->banpt_end_date,
                'international_rating' => $request->international_rating,
                'international_start_date' => $request->international_start_date,
                'international_end_date' => $request->international_end_date,
                'file_name' => $fileName,
                'file_path' => $filePath,
            ]);

            // simpan data ke database
            DB::commit();

            // kembali ke halaman sebelumnya dengan mengirimkan session color dan message untuk menampilkan alert
            return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menambahkan data')]);
        } catch (Exception $e) {
            $message = $e->getMessage();
            DB::rollback();
            // kembali ke halaman sebelumnya dengan mengirimkan session color dan message untuk menampilkan alert
            return redirect()->back()->with(['color' => 'bg-danger-500', 'message' => __($message)]);
        }

    }

    /**
     * Update the specified resource in database.
     */
    public function update(Request $request, IKU8 $iku8)
    {
        $request->validate([
            'name' => 'required|string|max:288',
            'banpt_rating' => 'required|string|max:288',
            'banpt_start_date' => 'required|date',
            'banpt_end_date' => 'required|date|after:banpt_start_date',
            'international_rating' => 'required|string|max:288',
            'international_start_date' => 'required|date',
            'international_end_date' => 'required|date|after:international_start_date',
            'file' => 'nullable|file',
        ]);

        try {
            DB::beginTransaction();
            $fileName = $iku8->file_name;
            $filePath = $iku8->file_path;

            // jika ada file yang dikirim
            if($request->file('file')) {
                $file = $request->file;

                // delete old file
                if ($filePath != null && Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }

                $fileName = str_replace(' ', '', $file->getClientOriginalName());
                $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-8');
            }

            $iku8->update([
                'name' => $request->name,
                'banpt_rating' => $request->banpt_rating,
                'banpt_start_date' => $request->banpt_start_date,
                'banpt_end_date' => $request->banpt_end_date,
                'international_rating' => $request->international_rating,
                'international_start_date' => $request->international_start_date,
                'international_end_date' => $request->international_end_date,
                'file_name' => $fileName,
                'file_path' => $filePath,
            ]);

            DB::commit();

            return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil mengubah data')]);
        } catch (Exception $e) {
            $message = $e->getMessage();
            DB::rollback();
            return redirect()->back()->with(['color' => 'bg-danger-500', 'message' => __($message)]);
        }
    }

    /**
     * Remove the specified resource from database.
     */
    public function destroy(IKU8 $iku8)
    {
        // hapus data
        $iku8->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menghapus data')]);
    }

    public function print()
    {
        // header untuk export excel
        $headers = [
            'No', 'Nama program studi', 'Akreditasi BAN-PT', 'Masa Berlaku', 'Akreditasi Internasional', 'Masa Berlaku', 'Berkas Pendukung'
        ];

        // ambil data dan mapping untuk diexport (nantinya bakal ke export sesuai index)
        $dataIKU = IKU8::query()->get()->map(function ($item, $key) {
            return [
                $key + 1,
                $item->name,
                $item->banpt_rating,
                Carbon::parse($item->banpt_start_date)->format('d M Y') . ' s.d ' . Carbon::parse($item->banpt_end_date)->format('d M Y'),
                $item->international_rating ?? '-',
                $item->international_start_date && $item->international_end_date ? Carbon::parse($item->international_start_date)->format('d M Y') . ' s.d ' . Carbon::parse($item->international_end_date)->format('d M Y') : '-',
                route('show_file', ['path' => 'iku-8', 'id' => $item->id, 'preview' => true]),
            ];
        });

        // export data ke excel, cek class lebih detail
        return HelperPublic::export(
            'Data Indikator Kinerja Utama 8',
            'Program studi yang memiliki akreditasi atau sertifikat internasional yang diakui pemerintah.',
            $headers,
            $dataIKU);
    }
}
