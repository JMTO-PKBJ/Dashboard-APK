<?php

namespace App\Http\Controllers;

use App\Models\Cctv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CctvController extends Controller
{
    public function index()
    {
        return Cctv::all();
    }
    // public function index()
    // {
    //     $cctvRuas = Cctv::select('cctv_ruas')->distinct()->get();
    //     $cctvLokasi = Cctv::select('cctv_lokasi')->distinct()->get();
    //     return view('cctv.create', compact('cctvRuas', 'cctvLokasi'));
    // }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'cctv_ruas' => 'required|string',
    //         'cctv_lokasi' => 'required|string',
    //         'cctv_video' => 'required|string|url',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 400);
    //     }

    //     $data = $request->all();
    //     $data['roles_id'] = 1; // Set roles_id to 1 (admin)
    //     $data['cctv_status'] = 'on'; // Set cctv_status to 'on'

    //     $cctv = Cctv::create($data);

    //     return response()->json($cctv, 201);
    // }

    public function create()
{
    $cctvRuas = Cctv::pluck('cctv_ruas')->unique();
    $cctvLokasi = Cctv::pluck('cctv_lokasi')->unique();
    $cctvs = Cctv::all(); // Mengambil semua CCTV yang ada

    return view('addCCTV', compact('cctvRuas', 'cctvLokasi', 'cctvs'));
}

public function store(Request $request){
    $validator = Validator::make($request->all(), [
        'cctv_ruas' => 'required|string',
        'roles_id' => 'required|integer|in:1',
        'cctv_lokasi' => 'required|string',
        'cctv_video' => 'required|url',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    
        $cctv = Cctv::create([
            'cctv_ruas' => $request->cctv_ruas,
            'roles_id' => 1, // auth()->user()->role
            'cctv_lokasi' => $request->cctv_lokasi,
            'cctv_video' => $request->cctv_video,
            'cctv_status' => $request->cctv_status
        ]);

        // return response()->json($cctv, 201);
        return redirect()->route('cctv.create')->with('success', 'CCTV added successfully.');
    }

    public function show($id)
    {
        $cctv = Cctv::find($id);

        if (!$cctv) {
            return response()->json(['error' => 'Cctv not found'], 404);
        }

        return response()->json($cctv);
    }

    public function update(Request $request, $id)
    {
        $cctv = Cctv::find($id);

        if (!$cctv) {
            return response()->json(['error' => 'Cctv not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'cctv_ruas' => 'sometimes|required|string',
            'roles_id' => 'sometimes|required|exists:users,id',
            'cctv_lokasi' => 'sometimes|required|string',
            'cctv_video' => 'sometimes|required|string',
            'cctv_status' => 'sometimes|required|string|in:on,off',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $cctv->update($request->all());

        return response()->json($cctv, 200);
    }

    public function destroy($id)
    {
        $cctv = Cctv::find($id);

        if (!$cctv) {
            return response()->json(['error' => 'Cctv not found'], 404);
        }

        $cctv->delete();

        return response()->json(['message' => 'Cctv deleted successfully'], 200);
    }

    public function showByLocation($lokasi)
    {
        $cctvs = Cctv::where('cctv_lokasi', $lokasi)->get();

        return response()->json($cctvs);
    }

    public function showPage($id)
    {
        $cctv = Cctv::find($id);

        if (!$cctv) {
            abort(404);
        }

        return view('show', compact('cctv'));
    }

    public function showAll()
    {
        $cctvs = Cctv::all();
        return view('viewCCTV', compact('cctvs'));
    }

    public function showAdd()
    {
        $cctvs = Cctv::all();
        return view('addCCTV', compact('cctvs'));
    }
}
