<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konser;

class KonserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konser = Konser::all();

        return response()->json([
            'message' => 'Data Konser Berhasil Ditampilkan',
            'data' => $konser,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role == 'admin') {


            $konser =  Konser::create([
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'tempat' => $request->tempat,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'poster' => $request->poster,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'konser berhasil ditambahkan',
                'data' => $konser,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'anda tidak memiliki akses untuk menambahkan konser',
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if ($user->role == 'admin') {


            $konser = Konser::find($id);

            $konser->update([
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'tempat' => $request->tempat,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'poster' => $request->poster,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'konser berhasil diupdate',
                'data' => $konser,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak memiliki akses untuk mengupdate konsep',
            ], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();

        if ($user->role == 'admin') {
            $konser = konser::find($id);

            $konser->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Konser berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak memiliki akses untuk menghapus konser',
            ], 401);
        }
    }
}
