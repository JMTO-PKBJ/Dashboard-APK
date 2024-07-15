<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracsv\Export;
use App\Exports\EventsExport;
use Maatwebsite\Excel\Facades\Excel;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function show($id)
    {
        $event = Event::find($id);
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

    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->delete();

        return response()->json(null, 204);
    }

    // public function exportCSV()
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
    public function exportCSV()
    {
        return Excel::download(new EventsExport, 'events.xlsx');
    }

    public function show1()
        {
    $events = Event::all();
    return view('events', compact('events'));
    }

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
