<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reviewan;
use Illuminate\Http\Request;

class ReviewanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewan = Reviewan::with('produk')->get(); 
        return response()->json($reviewan, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:reviewans',
            'kode_review' => 'required|unique:reviewans',
            'deskripsi' => 'required',
            'rekomendasi' => 'required',
            'produks_id' => 'required|exists:produks,id'
        ]);

        $reviewan = Reviewan::create($validate);
        if ($reviewan) {
            $data['success'] = true;
            $data['message'] = 'Data review berhasil disimpan';
            $data['data']    = $reviewan;
            return response()->json($data, 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reviewan = Reviewan::with('produk')->find($id);

        if ($reviewan) {
            $data['success'] = true;
            $data['message'] = 'Data data review ditemukan';
            $data['data'] = $reviewan;
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Data review tidak ditemukan';
            return response()->json($data, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
 
        $reviewan = Reviewan::find($id);
        if ($reviewan) {
            $validate = $request->validate([
                'nama' => 'required',
                'kode_review' => 'required',
                'deskripsi' => 'required',
                'rekomendasi' => 'required',
                'produks_id' => 'required|exists:produks,id'
            ]);

            Reviewan::where('id', $id)->update($validate);

            $reviewan = Reviewan::find($id);
            $data['success'] = true;
            $data['message'] = 'Data review berhasil diperbarui';
            $data['data']    = $reviewan;
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Data review tidak ditemukan';
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reviewan = Reviewan::find($id);
        if ($reviewan) {
            $reviewan->delete();
            $data['success'] = true;
            $data['message'] = 'Data review berhasil dihapus';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Data review tidak ditemukan';
            return response()->json($data, 404);
        }
    }
}
