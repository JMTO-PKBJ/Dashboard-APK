<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cctv;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CctvController extends Controller
{
    public function index()
    {
        return Cctv::all();
    }

    public function create()
{
    $cctvRuas = Cctv::pluck('cctv_ruas')->unique();
    $cctvLokasi = Cctv::pluck('cctv_lokasi')->unique();
    $cctvs = Cctv::all(); 

    return view('layouts.admin.Cctv.addCCTV', compact('cctvRuas', 'cctvLokasi', 'cctvs'));
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
            'roles_id' => 1, 
            'cctv_lokasi' => $request->cctv_lokasi,
            'cctv_video' => $request->cctv_video,
            'cctv_status' => $request->cctv_status
        ]);

        return redirect()->route('admin.cctv.create')->with('success', 'CCTV added successfully.');
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
        return view('layouts.admin.Cctv.viewCCTV', compact('cctvs'));
    }

    public function showAdd()
    {
        $cctvs = Cctv::all();
        return view('layouts.admin.Cctv.addCCTV', compact('cctvs'));
    }
}
