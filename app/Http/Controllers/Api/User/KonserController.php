<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\konser;

class KonserController extends Controller
{

    public function index()
    {
        $konser = konser::all();

        return response()->json([
            'message' => 'Data Konser Berhasil Ditampilkan',
            'data' => $konser,
        ], 200);
    }


    public function show($id)
    {
        $konser = konser::all();

        if ($konser) {
            return response()->json([
                'message' => 'Data konser berhasil Ditampilkan',
                'data' => $konser,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data konser Tidak Ditemukan',
            ], 404);
        }
    }
}
