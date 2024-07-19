<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracsv\Export;
use App\Exports\EventsExport;
use App\Http\Controllers\EventsExport as ControllersEventsExport;
use App\Models\Cctv;
use Illuminate\Support\Facades\DB;
use League\Csv\CannotInsertRecord;
use League\Csv\Writer;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel;
use PHPExcel_IOFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function show($event_id)
    {
        $event = Event::find($event_id);
    
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }
    
        return response()->json($event);
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cctv_id' => 'required|exists:cctv,id',
            'event_waktu' => 'required|date_format:Y-m-d H:i:s',
            'event_lokasi' => 'required|string|max:255',
            'event_class' => 'required|string|max:255',
            'event_gambar' => 'required|string|max:255',
        ]);

        $event = Event::create($validatedData);

        return response()->json($event, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cctv_id' => 'sometimes|required|exists:cctv,id',
            'event_waktu' => 'sometimes|required|date_format:Y-m-d H:i:s',
            'event_lokasi' => 'sometimes|required|string|max:255',
            'event_class' => 'sometimes|required|string|max:255',
            'event_gambar' => 'sometimes|required|string|max:255',
        ]);

        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->update($validatedData);

        return response()->json($event);
    }

    public function destroy($event_id)
    {
        $event = Event::findOrFail($event_id);
    
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }
    
        $event->delete();
    
        return response()->json(['message' => 'Event deleted successfully'], 200);
    }
    

    public function show1()
    {
        $events = Event::all();
        return view('events', compact('events'));
    }

    public function searchByDateRange(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'start_date' => 'required|date_format:Y-m-d',
                'end_date' => 'required|date_format:Y-m-d',
            ]);

            $startDate = $validatedData['start_date'];
            $endDate = $validatedData['end_date'];

            $events = Event::whereDate('event_waktu', '>=', $startDate)
                            ->whereDate('event_waktu', '<=', $endDate)
                            ->get();

            return response()->json($events);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getDashboardData(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ]);

        $startDate = $validatedData['start_date'];
        $endDate = $validatedData['end_date'];

        // CCTV Event Terbanyak
        $mostFrequentLocation = Event::select('event_lokasi', DB::raw('count(*) as total'))
            ->whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->groupBy('event_lokasi')
            ->orderBy('total', 'desc')
            ->first();

        // Jumlah Event Tertinggi
        $highestEventCount = Event::select(DB::raw('count(*) as total'))
            ->whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->groupBy('event_lokasi')
            ->orderBy('total', 'desc')
            ->first();

        // Jenis Kendaraan Terbanyak
        $mostFrequentVehicleType = Event::select('event_class', DB::raw('count(*) as total'))
            ->whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->groupBy('event_class')
            ->orderBy('total', 'desc')
            ->first();

        return response()->json([
            'mostFrequentLocation' => $mostFrequentLocation ? $mostFrequentLocation->event_lokasi : null,
            'highestEventCount' => $highestEventCount ? $highestEventCount->total : null,
            'mostFrequentVehicleType' => $mostFrequentVehicleType ? $mostFrequentVehicleType->event_class : null,
        ]);
    }

    public function getEventLocationData(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ]);

        $startDate = $validatedData['start_date'];
        $endDate = $validatedData['end_date'];

        // Get the top 4 event locations
        $eventLocations = Event::select('event_lokasi', DB::raw('count(*) as total'))
            ->whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->groupBy('event_lokasi')
            ->orderBy('total', 'asc')
            ->limit(4)
            ->get();

        $labels = $eventLocations->pluck('event_lokasi')->toArray();
        $data = $eventLocations->pluck('total')->toArray();

        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    public function getEventClassData(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ]);

        $startDate = $validatedData['start_date'];
        $endDate = $validatedData['end_date'];

        // Get event classes and their totals
        $eventClasses = Event::select('event_class', DB::raw('count(*) as total'))
            ->whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->groupBy('event_class')
            ->get();

        $labels = $eventClasses->pluck('event_class')->toArray();
        $data = $eventClasses->pluck('total')->toArray();

        return response()->json(['labels' => $labels, 'data' => $data]);
    }
    
    public function getCctvRuas()
    {
        // Ambil semua cctv_ruas yang tersedia
        $cctvRuas = Cctv::distinct()->pluck('cctv_ruas');

        return response()->json($cctvRuas);
    }

    public function getCctvLocations(Request $request)
    {
        $ruas = $request->get('ruas');

        // Ambil event_lokasi berdasarkan cctv_ruas yang dipilih
        $locations = Event::whereHas('cctv', function ($query) use ($ruas) {
            $query->where('cctv_ruas', $ruas);
        })->distinct()->pluck('event_lokasi');

        return response()->json($locations);
    }

    public function getData(Request $request)
    {
        $request->validate([
            'ruas' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'nullable|date_format:Y-m-d H:i:s',
            'end_date' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        $ruas = $request->input('ruas');
        $location = $request->input('location');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Event::whereHas('cctv', function ($query) use ($ruas) {
            $query->where('cctv_ruas', $ruas);
        })
        ->where('event_lokasi', $location);

        if ($startDate && $endDate) {
            $query->whereBetween('event_waktu', [$startDate, $endDate]);
        }

        $events = $query->get();

        return response()->json($events);
    }
    
    public function exportExcel()
    {
        // Ambil data yang ingin diekspor, contoh: data dari model Event
        $events = \App\Models\Event::all();
    
        // Buat objek PHPExcel
        $objPHPExcel = new PHPExcel();
    
        // Atur properti dokumen (optional)
        $objPHPExcel->getProperties()
            ->setCreator("Your Name")
            ->setTitle("Export Data Event")
            ->setDescription("Excel file generated using PHPExcel.");
    
        // Mulai menulis data ke dalam sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'CCTV ID');
        $sheet->setCellValue('C1', 'Waktu');
        $sheet->setCellValue('D1', 'Lokasi');
        $sheet->setCellValue('E1', 'Class');
        $sheet->setCellValue('F1', 'Gambar');
    
        // Isi data dari database ke dalam sheet
        $row = 2;
        foreach ($events as $event) {
            $sheet->setCellValue('A' . $row, $event->id);
            $sheet->setCellValue('B' . $row, $event->cctv_id);
            $sheet->setCellValue('C' . $row, $event->waktu);
            $sheet->setCellValue('D' . $row, $event->lokasi);
            $sheet->setCellValue('E' . $row, $event->class);
            $sheet->setCellValue('F' . $row, $event->gambar);
            $row++;
        }
    
        // Set header untuk response HTTP
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment;filename="events.xlsx"',
            'Cache-Control' => 'max-age=0',
        ];
    
        // Buat response untuk file Excel
        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_start();
        $writer->save('php://output');
        $content = ob_get_clean();
    
        $response = Response::make($content, 200, $headers);
    
        // Return response untuk didownload
        return $response;
    }
    
}
    



//     public function exportCSV()
// {
//     $events = Event::all();

//     return Excel::download(new EventsExport($events), 'events.csv');
// }

    // public function exportCSV()
    // {
    //     $events = Event::all();
    //     $csvExporter = new Export();
    //     $csvExporter->beforeEach(function ($event) {
    //         $event->event_gambar = url($event->event_gambar);
    //     });

    //     $csvExporter->build($events, [
    //         'event_id',
    //         'cctv_id',
    //         'event_waktu',
    //         'event_lokasi',
    //         'event_class',
    //         'event_gambar'
    //     ])->download('events.csv');
    // }
    // public function exportCSV()
    // {
    //     return Excel::download(new EventsExport, 'events.xlsx');
    // }



    // public function exportCSV()
    // {
    //     $events = Event::all();
    //     $csvExporter = new Export();
    //     $csvExporter->build($events, ['event_id', 'cctv_id', 'event_waktu', 'event_lokasi', 'event_class', 'event_gambar'])->download();
    // }

    // public function showEvents()
    // {
    //     $events = Event::all();
    //     return view('show1', compact('events'));
    // }

