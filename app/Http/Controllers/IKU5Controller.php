<?php

namespace App\Http\Controllers;

use App\Helpers\HelperPublic;
use App\Models\IKU5;
use App\Models\SelectList;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IKU5Controller extends Controller
{
    /**
     * Display a listing of the database.
     */
    public function index()
    {
        $breadcrumbs = [
            ['IKU 5', true, route('admin.iku-5.index')],
            ['Index', false],
        ];
        $title = 'Data Indikator Kinerja Utama 5';
        $subtitle = 'Penelitian dan pengabdian kepada masyarakat yang berhasil mendapat rekognisi internasional atau diterapkan oleh masyarakat.';
        $items = IKU5::with('select_list')->latest()->get();

        return view('admin.iku5.index', compact('breadcrumbs', 'title', 'subtitle', 'items'));
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
                'activity_type' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'summary' => 'required|string',
                'description' => 'required|string',
                'file' => 'required|file',
            ]);

            $file = $request->file;
            $fileName = str_replace(' ', '', $file->getClientOriginalName());
            $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-5');

            IKU5::create([
                'name' => $request->name,
                'nip' => $request->nip,
                'activity_type' => $request->activity_type,
                'location' => $request->location,
                'summary' => $request->summary,
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
    public function update(Request $request, IKU5 $iku5)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'activity_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'required|string',
            'file' => 'nullable|file',
        ]);

        try {
            DB::beginTransaction();
            $fileName = $iku5->file_name;
            $filePath = $iku5->file_path;
            if($request->file('file')) {
                $file = $request->file;

                // delete old file
                if ($filePath != null && Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }

                $fileName = str_replace(' ', '', $file->getClientOriginalName());
                $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-5');
            }

            $iku5->update([
                'name' => $request->name,
                'nip' => $request->nip,
                'activity_type' => $request->activity_type,
                'location' => $request->location,
                'summary' => $request->summary,
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
    public function destroy(IKU5 $iku5)
    {
        $iku5->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menghapus data')]);
    }

    public function print(Request $request)
    {
        $type = $request->type;
        $isPreview = $request->preview ? true : false;

        $title = 'Data Indikator Kinerja Utama 5';
        $subtitle = 'Penelitian dan pengabdian kepada masyarakat yang berhasil mendapat rekognisi internasional atau diterapkan oleh masyarakat.';

        $headers = [
            'No', 'Nama', 'NIP', 'Jenis Keluaran', 'Nama hasil kerja', 'Deskripsi', 'Tempat', 'Berkas Pendukung'
        ];

        $dataIKU = IKU5::query()->with('select_list')->get()->map(function ($item, $key) {
            return [
                $key + 1,
                $item->name,
                $item->nip,
                $item->activity_type,
                $item->location,
                $item->summary,
                $item->description,
                route('show_file', ['path' => 'iku-5', 'id' => $item->id, 'preview' => true]),
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
