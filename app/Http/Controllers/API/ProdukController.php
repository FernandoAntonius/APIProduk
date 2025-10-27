<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::with('reviewan')->get(); 
        return response()->json($produk, 200);
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
            'nama' => 'required|unique:produks',
            'kode_produk' => 'required|unique:produks',
            'deskripsi' => 'required'
        ]);

        $produk = Produk::create($validate);
        if ($produk) {
            $data['success'] = true;
            $data['message'] = 'Data produk berhasil disimpan';
            $data['data']    = $produk;
            return response()->json($data, 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::with('reviewan')->find($id);

        if ($produk) {
            $data['success'] = true;
            $data['message'] = 'Data data review ditemukan';
            $data['data'] = $produk;
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
        $produk = Produk::find($id);
        if ($produk) {
            $validate = $request->validate([
            'nama' => 'required',
            'kode_produk' => 'required',
            'deskripsi' => 'required'
            ]);

            Produk::where('id', $id)->update($validate);

            $produk = Produk::find($id);
            $data['success'] = true;
            $data['message'] = 'Data produk berhasil diperbarui';
            $data['data']    = $produk;
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Data produk tidak ditemukan';
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            $produk->delete();
            $data['success'] = true;
            $data['message'] = 'Data produk berhasil dihapus';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Data produk tidak ditemukan';
            return response()->json($data, 404);
        }
    }
}
