<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracsv\Export;
use App\Exports\EventsExport;
use App\Models\Cctv;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


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
    // public function destroy($id)
    // {
    //     $event = Event::findOrFail($id);
    //     $event->delete();

    //     return response()->json(['message' => 'User deleted successfully'], 200);
    // }

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
        return view('show1', compact('events'));
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

    public function getMostFrequentEventLocation(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ]);
    
        $startDate = $validatedData['start_date'];
        $endDate = $validatedData['end_date'];
    
        // Get the most frequent location
        $mostFrequentLocation = Event::select('cctv_id', DB::raw('count(*) as total'))
            ->whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->groupBy('cctv_id')
            ->orderBy('total', 'desc')
            ->first();
    
        // Get the most frequent event class
        $mostFrequentEventClass = Event::select('event_class', DB::raw('count(*) as total'))
            ->whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->groupBy('event_class')
            ->orderBy('total', 'desc')
            ->first();
    
        // Get the total number of events in the date range
        $totalEvents = Event::whereDate('event_waktu', '>=', $startDate)
            ->whereDate('event_waktu', '<=', $endDate)
            ->count();
    
        if ($mostFrequentLocation) {
            $cctv = Cctv::find($mostFrequentLocation->cctv_id);
    
            return response()->json([
                'cctv_id' => $cctv->id,
                'location' => $cctv->cctv_lokasi,  // Assuming the field name is 'lokasi'
                'total_events' => $mostFrequentLocation->total,
                'most_frequent_event_class' => $mostFrequentEventClass ? $mostFrequentEventClass->event_class : null,
                'total_events_for_class' => $mostFrequentEventClass ? $mostFrequentEventClass->total : null,
                'total_events_in_range' => $totalEvents,
            ]);
        }
    
        return response()->json(['message' => 'No events found'], 404);
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
}
