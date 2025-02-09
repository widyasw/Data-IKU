<?php

namespace App\Http\Controllers;

use App\Helpers\HelperPublic;
use App\Models\IKU7;
use App\Models\SelectList;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IKU7Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['IKU 7', true, route('admin.iku-7.index')],
            ['Index', false],
        ];
        $title = 'Data Indikator Kinerja Utama 7';
        $subtitle = 'Kelas yang kolaboratif dan partisipatif yang menggunakan pemecahan kasus (case method) atau pembelajaran kelompok berbasis project (team-based project) sebagai bagian dari bobot evaluasi.';
        $items = IKU7::with('select_list')->latest()->get();

        $selects = SelectList::where('type', 'iku-7')->get();

        return view('admin.iku7.index', compact('breadcrumbs', 'title', 'subtitle', 'items', 'selects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required|string|max:255',
                'credit_hours' => 'required|string|max:255',
                'select_id' => 'required|exists:select_lists,id',
                'output' => 'required|string|max:255',
                'file' => 'required|file',
            ]);

            $file = $request->file;
            $fileName = str_replace(' ', '', $file->getClientOriginalName());
            $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-7');

            IKU7::create([
                'name' => $request->name,
                'credit_hours' => $request->credit_hours,
                'select_id' => $request->select_id,
                'output' => $request->output,
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
    public function update(Request $request, IKU7 $iku7)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'credit_hours' => 'required|string|max:255',
            'select_id' => 'required|exists:select_lists,id',
            'output' => 'required|string|max:255',
            'file' => 'nullable|file',
        ]);

        try {
            DB::beginTransaction();
            $fileName = $iku7->file_name;
            $filePath = $iku7->file_path;
            if($request->file('file')) {
                $file = $request->file;

                // delete old file
                if ($filePath != null && Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }

                $fileName = str_replace(' ', '', $file->getClientOriginalName());
                $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-7');
            }

            $iku7->update([
                'name' => $request->name,
                'credit_hours' => $request->credit_hours,
                'select_id' => $request->select_id,
                'output' => $request->output,
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
    public function destroy(IKU7 $iku7)
    {
        $iku7->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menghapus data')]);
    }

    public function print()
    {
        $headers = [
            'No', 'Nama Mata Kuliah', 'Jumlah SKS', 'Metode pembelajaran', 'Output', 'Berkas Pendukung'
        ];

        $dataIKU = IKU7::query()->with('select_list')->get()->map(function ($item, $key) {
            return [
                $key + 1,
                $item->name,
                $item->credit_hours,
                $item->select_list->name,
                $item->output,
                route('show_file', ['path' => 'iku-7', 'id' => $item->id, 'preview' => true]),
            ];
        });

        return HelperPublic::export(
            'Data Indikator Kinerja Utama 7',
            'Kelas yang kolaboratif dan partisipatif yang menggunakan pemecahan kasus (case method) atau pembelajaran kelompok berbasis project (team-based project) sebagai bagian dari bobot evaluasi.',
            $headers,
            $dataIKU);
    }
}

