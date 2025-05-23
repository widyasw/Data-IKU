<?php

namespace App\Http\Controllers;

use App\Helpers\HelperPublic;
use App\Models\IKU3;
use App\Models\SelectList;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IKU3Controller extends Controller
{
    /**
     * Display a listing of the database.
     */
    public function index()
    {
        $breadcrumbs = [
            ['IKU 3', true, route('admin.iku-3.index')],
            ['Index', false],
        ];
        $title = 'Data Indikator Kinerja Utama 3';
        $subtitle = 'Dosen yang berkegiatan tridharma di perguruan tinggi lain, berkegiatan tridharma di QS100 berdasarkan bidang ilmu (QS100 by subject), bekerja sebagai praktisi di dunia industri, atau membina mahasiswa yang berhasil meraih prestasi paling rendah tingkat nasional dalam 5 (lima) tahun terakhir.';
        $items = IKU3::with('select_list')->latest()->get();

        $selects = SelectList::where('type', 'iku-3')->get();

        return view('admin.iku3.index', compact('breadcrumbs', 'title', 'subtitle', 'items', 'selects'));
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
                'location' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'file' => 'required|file',
            ]);

            $file = $request->file;
            $fileName = str_replace(' ', '', $file->getClientOriginalName());
            $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-3');

            IKU3::create([
                'name' => $request->name,
                'nip' => $request->nip,
                'select_id' => $request->select_id,
                'description' => $request->description,
                'location' => $request->location,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
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
    public function update(Request $request, IKU3 $iku3)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'select_id' => 'required|exists:select_lists,id',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'file' => 'nullable|file',
        ]);

        try {
            DB::beginTransaction();
            $fileName = $iku3->file_name;
            $filePath = $iku3->file_path;
            if ($request->file('file')) {
                $file = $request->file;

                // delete old file
                if ($filePath != null && Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }

                $fileName = str_replace(' ', '', $file->getClientOriginalName());
                $filePath = HelperPublic::helpStoreFileToStorage($file, 'iku-3');
            }

            $iku3->update([
                'name' => $request->name,
                'nip' => $request->nip,
                'select_id' => $request->select_id,
                'description' => $request->description,
                'location' => $request->location,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
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
    public function destroy(IKU3 $iku3)
    {
        $iku3->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menghapus data')]);
    }

    public function print(Request $request)
    {
        $type = $request->type;
        $isPreview = $request->preview ? true : false;

        $title = 'Data Indikator Kinerja Utama 3';
        $subtitle = 'Dosen yang berkegiatan tridharma di perguruan tinggi lain, berkegiatan tridharma di QS100 berdasarkan bidang ilmu (QS100 by subject), bekerja sebagai praktisi di dunia industri, atau membina mahasiswa yang berhasil meraih prestasi paling rendah tingkat nasional dalam 5 (lima) tahun terakhir.';

        $headers = [
            'No',
            'Nama',
            'NIP',
            'Jenis Kegiatan',
            'Tempat',
            'Waktu',
            'Deskripsi',
            'Berkas Pendukung'
        ];

        $dataIKU = IKU3::query()->with('select_list')->get()->map(function ($item, $key) {
            return [
                $key + 1,
                $item->name,
                $item->nip,
                $item->select_list->name,
                $item->location,
                Carbon::parse($item->start_date)->format('d M Y') . ' s.d ' . Carbon::parse($item->end_date)->format('d M Y'),
                $item->description,
                route('show_file', ['path' => 'iku-3', 'id' => $item->id, 'preview' => true]),
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
