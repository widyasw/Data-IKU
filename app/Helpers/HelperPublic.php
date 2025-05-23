<?php

namespace App\Helpers;

use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class HelperPublic
{
    /**
     * upload file ke storage
     *
     * @param [type] $file
     * @param string $path directory untuk simpan data
     * @return String
     */
    public static function helpStoreFileToStorage($file, string $path) : String
    {
        // merubah nama awal untuk disimpan di storage agar tidak sama 1 dengan lainnya
        $changedName = time() . random_int(100, 999) . $file->getClientOriginalName();
        // store data sesuai dengan path yang dikirimkan beserta nama file
        $file->storeAs($path, $changedName);
        // return path dan nama file untuk disimpan di database
        return $path . '/' . $changedName;
    }

    public static function export($title, $subtitle, array $headers, $data)
    {
        // Buat objek spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $totalColumns = count($headers);
        $lastColumn = Coordinate::stringFromColumnIndex($totalColumns);

        // Set title
        $sheet->setCellValue('A1', $title);
        $sheet->mergeCells("A1:{$lastColumn}1"); // Untuk Title
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set subtitle
        $sheet->setCellValue('A2', $subtitle);
        $sheet->mergeCells("A2:{$lastColumn}2"); // Untuk Subtitle
        $sheet->getStyle('A2')->getFont()->setItalic(true)->setSize(12);
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Tambahkan header (mulai dari baris ke-4)
        $column = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($column . '4', $header);
            $sheet->getStyle($column . '4')->getFont()->setBold(true);
            $sheet->getColumnDimension($column)->setAutoSize(true);
            $column++;
        }

        // Tambahkan data (mulai dari baris ke-5)
        $row = 5;
        foreach ($data as $item) {
            $column = 'A';
            foreach ($item as $value) {
                $sheet->setCellValue($column . $row, $value);
                $column++;
            }
            $row++;
        }

        // Simpan file sebagai respons unduhan
        $writer = new Xlsx($spreadsheet);

        $response = new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        });

        // Set header agar file bisa diunduh
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="'. time() . '_'.$title.'.xlsx"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }

    public static function exportPDF($title, $subtitle, array $headers, $data, $isPreview = false) {
        // Konversi data ke tampilan HTML
        $html = View::make('exports.pdf', compact('title', 'subtitle', 'headers', 'data'))->render();

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Ubah ukuran kertas & orientasi jika diperlukan
        $dompdf->render();

        // Tentukan output PDF (preview atau download)
        $filename = time() . '_' . str_replace(' ', '_', $title) . '.pdf';
        $outputMode = $isPreview ? 'inline' : 'attachment';

        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "{$outputMode}; filename=\"{$filename}\""
        ]);
    }
}
