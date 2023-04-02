<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Produk;
use App\Models\Bank;
use App\Models\Pengiriman;
use App\Models\BannerDua;
use App\Models\BannerSatu;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function merek()
    {
        $merek = Merek::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Ini adalah data merek',
            'data' => $merek
        ]);
    }
    public function produk(Request $request)
    {
        $produk = $request->q;
        $paginate = $request->limit;
        $rekomendasi = $request->rekomendasi;

        if($rekomendasi=='recommended'){
            $data=Produk::with('merek')->where('rekomendasi', 'ya')->get();
            return response()->json([
                'status' => true,
                'message' => 'Ini adalah data produk rekomendasi',
                'data' => $data
            ]);
        }
        if($paginate){
            $data = Produk::with('merek')->paginate($paginate);
            return response()->json([
                'status' => true,
                'message' => 'Ini adalah data produk paginasi',
                'data' => $data
            ]);
        }

        if($produk)
        {
            $data = Produk::where('id', $produk)->with('merek')->first();
            return response()->json([
                'status' => true,
                'message' => 'Ini adalah data produk',
                'data' => $data
            ]);
        }

        $data = Produk::with('merek')->get();
        return response()->json([
            'status' => true,
            'message' => 'Ini adalah data produk',
            'data' => $data
        ]);
    }

    public function bank()
    {
        $bank = Bank::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Ini adalah data bank',
            'data' => $bank
        ]);
    }
    public function pengiriman()
    {
        $pengiriman = Pengiriman::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Ini adalah data pengiriman',
            'data' => $pengiriman
        ]);
    }
    public function bannersatu()
    {
        $banner1 = BannerSatu::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Ini adalah data banner Satu',
            'data' => $banner1
        ]);
    }
    public function bannerdua()
    {
        $banner2 = BannerDua::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Ini adalah data banner Dua',
            'data' => $banner2
        ]);
    }
}
