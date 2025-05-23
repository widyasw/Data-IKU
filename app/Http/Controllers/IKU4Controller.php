<?php

namespace App\Http\Controllers;

use App\Helpers\HelperPublic;
use App\Models\IKU4;
use App\Models\SelectList;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IKU4Controller extends Controller
{
    /**
     * Display a listing of the database.
     */
    public function index()
    {
        $breadcrumbs = [
            ['IKU 4', true, route('admin.iku-4.index')],
            ['Index', false],
        ];
        $title = 'Data Indikator Kinerja Utama 4';
        $subtitle = 'Dosen yang berkualifikasi S3, memiliki sertifikat kompetensi atau profesi, atau berpengalaman kerja sebagai praktisi.';
        $items = IKU4::with('select_list')->latest()->get();

        $selects = SelectList::where('type', 'iku-4')->get();

        return view('admin.iku4.index', compact('breadcrumbs', 'title', 'subtitle', 'items', 'selects'));
    }

    /**
     * Store a newly created resource in database.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required|string|max:255',
                'nip' => 'required|string|max:255',
                'select_id' => 'required|exists:select_lists,id',
                'description' => 'required|string',
                'file' => 'required|file',
            ]);

            $file = $request->file;
            $fileName = str_replace(' ', '', $file->getClientOriginalName());
            $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-4');

            IKU4::create([
                'name' => $request->name,
                'nip' => $request->nip,
                'select_id' => $request->select_id,
                'description' => $request->description,
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
     * Update the specified resource in database.
     */
    public function update(Request $request, IKU4 $iku4)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'select_id' => 'required|exists:select_lists,id',
            'description' => 'required|string',
            'file' => 'nullable|file',
        ]);

        try {
            DB::beginTransaction();
            $fileName = $iku4->file_name;
            $filePath = $iku4->file_path;
            if($request->file('file')) {
                $file = $request->file;

                // delete old file
                if ($filePath != null && Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }

                $fileName = str_replace(' ', '', $file->getClientOriginalName());
                $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-4');
            }

            $iku4->update([
                'name' => $request->name,
                'nip' => $request->nip,
                'select_id' => $request->select_id,
                'description' => $request->description,
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
    public function destroy(IKU4 $iku4)
    {
        $iku4->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menghapus data')]);
    }

    public function print(Request $request)
    {
        $type = $request->type;
        $isPreview = $request->preview ? true : false;

        $title = 'Data Indikator Kinerja Utama 4';
        $subtitle = 'Dosen yang berkualifikasi S3, memiliki sertifikat kompetensi atau profesi, atau berpengalaman kerja sebagai praktisi.';

        $headers = [
            'No', 'Nama', 'NIP', 'Jenis Kegiatan', 'Deskripsi', 'Berkas Pendukung'
        ];

        $dataIKU = IKU4::query()->with('select_list')->get()->map(function ($item, $key) {
            return [
                $key + 1,
                $item->name,
                $item->nip,
                $item->select_list->name,
                $item->description,
                route('show_file', ['path' => 'iku-4', 'id' => $item->id, 'preview' => true]),
            ];
        });

        if ($type == 'excel') {
            return HelperPublic::export(
                $title,
                $subtitle,
                $headers,
                $dataIKU);
        } else if ($type == 'pdf') {
            return HelperPublic::exportPDF(
                $title,
                $subtitle,
                $headers,
                $dataIKU,
                $isPreview);
        } else {
            return abort(404);
        }
    }
}
