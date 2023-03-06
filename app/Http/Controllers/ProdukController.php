<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Merek;
use Illuminate\Http\Request;
use function PHPUnit\Framework\fileExists;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        if (isset($q)) {
            $produk = Produk::where('nama', 'like', '%' . $q . '%')->paginate(3);
        } else {
            $produk = Produk::paginate(4);
        }
        // return $produk;
        return view('produk.index', compact('produk','q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merek = Merek::all();
        //memanggil tabel merek
        return view('produk.create', compact('merek'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'merek_id' => 'required',
                'nama' => 'required|min:3|max:20',
                'harga' => 'required|numeric',
                'foto' => 'required',
                'spesifikasi' => 'required',
                'stok' => 'required|numeric',
            ],
            [
                'merek_id.required' => 'silahkan pilih merek',
                'nama.required' => 'silahkan input nama',
                'nama.min' => ' nama produk harus panjang',
                'nama.max' => ' nama produk harus pendek',
                'harga.required' => 'silahkan input harga',
                'harga.numeric' => 'silahkan input harga yang sesuai',
                'foto.required' => 'silahkan pilih foto',
                'spesifikasi.required' => 'Silahkan input spesifikasi',
                'stok.required' => 'silahkan input stok',
                
            ]
        );

        $image = $request->file('foto');
        $namaFoto = time() . '-' . rand() . '-' . $image->getClientOriginalName();
        $image->move(public_path('assets/images/produk'), $namaFoto);

        Produk::create([
            'merek_id' => $request->merek_id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'foto' => $namaFoto,
            'spesifikasi' => $request->spesifikasi,
            'stok' => $request->stok,
            'rekomendasi' => $request->has('rekomendasi') ? $request->rekomendasi : 'tidak' //ternary operator
        ]);

        return redirect('/produk')->with('success', $request->nama. ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(produk $produk)
    {
        $merek = Merek::all();
        return view('produk.edit', compact('merek', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produk $produk)
    {
        $request->validate(
            [
                'merek_id' => 'required',
                'nama' => 'required|min:3|max:20',
                'harga' => 'required|numeric',
                'foto' => 'required',
                'spesifikasi' => 'required',
                'stok' => 'required|numeric',
                
            ],

            [
                'merek_id.required' => 'silahkan pilih merek',
                'nama.required' => 'silahkan input nama',
                'nama.min' => ' nama produk harus panjang',
                'nama.max' => ' nama produk harus pendek',
                'harga.required' => 'silahkan input harga',
                'harga.numeric' => 'silahkan input harga yang sesuai',
                'foto.required' => 'silahkan pilih foto',
                'spesifikasi.required' => 'Silahkan input spesifikasi',
                'stok.required' => 'silahkan input stok',
                
                // 
            ]
        );

        if ($request->hasFile('foto')) {

            if (fileExists(public_path('assets/images/produk/' . $produk->foto))) {
                unlink(public_path('assets/images/produk/' . $produk->foto));
            }

            $image = $request->file('foto');
            $namaFoto = time() . '-' . rand() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/produk'), $namaFoto);

            Produk::where('id', $produk->id)->update([
                'merek_id' => $request->merek_id,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'foto' => $namaFoto,
                'spesifikasi' => $request->spesifikasi,
                'stok' => $request->stok,
                'rekomendasi' => $request->has('rekomendasi') ? $request->rekomendasi : 'tidak' //ternary operator
            ]);
        } else {
            Produk::where('id', $produk->id)->update([
                'merek_id' => $request->merek_id,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'spesifikasi' => $request->spesifikasi,
                'stok' => $request->stok,
                'rekomendasi' => $request->has('rekomendasi') ? $request->rekomendasi : 'tidak'
            ]);
        }

        return redirect('/produk')->with('success', $request->nama. ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(produk $produk)
    {
        Produk::destroy($produk->id);
        if (fileExists(public_path('assets/images/produk/' . $produk->foto))) {
            unlink(public_path('assets/images/produk/' . $produk->foto));
        }
        return redirect('/produk')->with('success','Data berhasil dihapus!');
    }
}
