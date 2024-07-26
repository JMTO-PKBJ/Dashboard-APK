<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\cctv;
use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;

class eventController extends Controller
{
    public function index()
    {
        $events = event::all();
        return response()->json($events);
        
    }

    public function show($event_id)
    {
        $event = event::find($event_id);
    
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

        $event = event::create($validatedData);

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

        $event = event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->update($validatedData);

        return response()->json($event);
    }

    public function destroy($event_id)
    {
        $event = event::findOrFail($event_id);
    
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }
    
        $event->delete();
    
        return response()->json(['message' => 'Event deleted successfully'], 200);
    }
    

    public function show1()
    {
        $events = event::all();
        return view('layouts.supervisor.event.events', compact('events'));
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

            $events = event::whereDate('event_waktu', '>=', $startDate)
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

        $mostFrequentLocation = event::select('event_lokasi', DB::raw('count(*) as total'))
            ->whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->groupBy('event_lokasi')
            ->orderBy('total', 'desc')
            ->first();

        $highestEventCount = event::select(DB::raw('count(*) as total'))
            ->whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->groupBy('event_lokasi')
            ->orderBy('total', 'desc')
            ->first();

        $mostFrequentVehicleType = event::select('event_class', DB::raw('count(*) as total'))
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

        $eventLocations = event::select('event_lokasi', DB::raw('count(*) as total'))
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

        $eventClasses = event::select('event_class', DB::raw('count(*) as total'))
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
        $cctvRuas = Cctv::distinct()->pluck('cctv_ruas');

        return response()->json($cctvRuas);
    }

    public function getCctvLocations(Request $request)
    {
        $ruas = $request->get('ruas');

        $locations = event::whereHas('cctv', function ($query) use ($ruas) {
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

        $query = event::whereHas('cctv', function ($query) use ($ruas) {
            $query->where('cctv_ruas', $ruas);
        })
        ->where('event_lokasi', $location);

        if ($startDate && $endDate) {
            $query->whereBetween('event_waktu', [$startDate, $endDate]);
        }

        $events = $query->get();

        return response()->json($events);
    }

    public function exportPDF(Request $request)
    {
        $ruas = $request->input('ruas');
        $location = $request->input('location');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = event::whereHas('cctv', function ($query) use ($ruas) {
            $query->where('cctv_ruas', $ruas);
        })
        ->where('event_lokasi', $location);

        if ($startDate && $endDate) {
            $query->whereBetween('event_waktu', [$startDate, $endDate]);
        }

        $events = $query->get();

        $dompdf = new Dompdf();
        $dompdf->setOptions(new Options(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]));

        $html = '<html><head><title>Export Data Event</title>';
        $html .= '<style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 8px;
                        text-align: left;
                    }
                    img {
                        width: 450px;
                        height: auto;
                    }
                    h1, p, img {
                        text-align: center;
                    }
                    .image-container {
                        text-align: center;
                    }
                    .jmto-image {
                        width: 200px;
                        height: 200px;
                    }
                </style>';
        $html .= '</head><body>';
        $imagePath = public_path('images/jasamarga_icon.png');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/png;base64,' . $imageData;
        $html .= '<div class="image-container">';
        $html .= '<img src="' . $imageSrc . '" class="jmto-image">';
        $html .= '</div>';

        $html .= '<h1>Export Data Event</h1>';
        $html .= '<table>';
        $html .= '<thead><tr>';
        $html .= '<th>ID</th><th>Event ID</th><th>Waktu</th><th>Lokasi</th><th>Class</th><th>Gambar</th>';
        $html .= '</tr></thead><tbody>';

        $counter = 1;

        foreach ($events as $event) {
            $html .= '<tr>';
            $html .= '<td>' . $counter++ . '</td>'; 
            $html .= '<td>' . $event->event_id . '</td>';
            $html .= '<td>' . $event->event_waktu . '</td>';
            $html .= '<td>' . $event->event_lokasi . '</td>';
            $html .= '<td>' . $event->event_class . '</td>';
            $html .= '<td><img src="' . url($event->event_gambar) . '"></td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';
        $html .= '<p><i>Dicetak pada: ' . date('d-m-Y H:i:s') . '<i></p>';
        $html .= '</body></html>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('events.pdf', ['Attachment' => true]);
    }
}
