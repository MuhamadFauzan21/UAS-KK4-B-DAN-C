<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Konser;
use App\Models\Transasksi;
use Illuminate\Http\Request;

class OrderTiket extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $konser = Konser::find($request->konser_id);

        if ($user->role == 'user') {

            $order = Transasksi::create([
                'konser_id' => $request->konser_id,
                'users_id' => $user->id,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'jumlah_tiket' => $request->jumlah_jumlah_tiket,
                'total_harga' => $request->jumlah_tiket * $konser->harga,
                'status' => 'pending',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Order telah ditambahkan',
                'data' => $order,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'anda bukan user',
            ], 401);
        }
    }
}
