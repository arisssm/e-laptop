<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;
        if (isset($q)) {
            $keranjang = Keranjang::join('produk', 'keranjang.produk_id', 'produk.id')
            ->where('nama', 'like', '%' . $q . '%')
            ->orWhere('harga', 'like', '%' . $q . '%')
            ->orWhere('banyak', 'like', '%' . $q . '%')
            ->orWhere('total_harga', 'like', '%' . $q . '%')
            ->paginate(5);
        } else {
            $keranjang = Keranjang::paginate(5);
        }
        return view('keranjang.index', compact('keranjang', 'q'));
    }
}
