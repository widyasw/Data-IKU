<?php

namespace App\Http\Controllers;

use App\Helpers\HelperPublic;
use App\Models\IKU8;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IKU8Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['IKU 8', true, route('admin.iku-8.index')],
            ['Index', false],
        ];
        $title = 'Data Indikator Kinerja Utama 8';
        $subtitle = 'Program studi yang memiliki akreditasi atau sertifikat internasional yang diakui pemerintah.';
        $items = IKU8::with('select_list')->latest()->get();

        return view('admin.iku8.index', compact('breadcrumbs', 'title', 'subtitle', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required|string|max:288',
                'banpt_rating' => 'required|string|max:288',
                'banpt_time' => 'required|string|max:288',
                'international_rating' => 'required|string|max:288',
                'international_time' => 'required|string|max:288',
                'file' => 'required|file',
            ]);

            $file = $request->file;
            $fileName = str_replace(' ', '', $file->getClientOriginalName());
            $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-8');

            IKU8::create([
                'name' => $request->name,
                'banpt_rating' => $request->banpt_rating,
                'banpt_time' => $request->banpt_time,
                'international_rating' => $request->international_rating,
                'international_time' => $request->international_time,
                'file_name' => $fileName,
                'file_path' => $filePath,
            ]);

            DB::commit();

            return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menambahkan data')]);
        } catch (Exception $e) {
            $message = $e->getMessage();
            DB::rollback();
            return redirect()->back()->with(['color' => 'bg-danger-500', 'message' => __($message)]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IKU8 $iku8)
    {
        $request->validate([
            'name' => 'required|string|max:288',
            'banpt_rating' => 'required|string|max:288',
            'banpt_time' => 'required|string|max:288',
            'international_rating' => 'required|string|max:288',
            'international_time' => 'required|string|max:288',
            'file' => 'nullable|file',
        ]);

        try {
            DB::beginTransaction();
            $fileName = $iku8->file_name;
            $filePath = $iku8->file_path;
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
                'banpt_time' => $request->banpt_time,
                'international_rating' => $request->international_rating,
                'international_time' => $request->international_time,
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
     * Remove the specified resource from storage.
     */
    public function destroy(IKU8 $iku8)
    {
        $iku8->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menghapus data')]);
    }

    public function print()
    {
        $headers = [
            'No', 'Nama program studi', 'Akreditasi BAN-PT', 'Masa Berlaku', 'Akreditasi Internasional', 'Masa Berlaku', 'Berkas Pendukung'
        ];

        $dataIKU = IKU8::query()->with('select_list')->get()->map(function ($item, $key) {
            return [
                $key + 1,
                $item->name,
                $item->banpt_rating,
                $item->banpt_time,
                $item->international_rating,
                $item->international_time,
                route('show_file', ['path' => 'iku-8', 'id' => $item->id, 'preview' => true]),
            ];
        });

        return HelperPublic::export(
            'Data Indikator Kinerja Utama 8',
            'Program studi yang memiliki akreditasi atau sertifikat internasional yang diakui pemerintah.',
            $headers,
            $dataIKU);
    }
}
