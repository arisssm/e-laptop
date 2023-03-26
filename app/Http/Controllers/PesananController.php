<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;
        if (isset($q)) {
            $pesanan = Pesanan::join('bank', 'pesanan.bank_id', 'bank.id')
            ->join('pengiriman', 'pesanan.pengiriman_id', 'pengiriman.id')
            ->where('nama', 'like', '%' . $q . '%')
            ->paginate(5);
        } else {
            $pesanan = Pesanan::paginate(5);
        }
        // $pesanan = Pesanan::paginate(5);
        return view('pesanan.index', compact('pesanan'));
    }
}
