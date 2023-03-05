<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
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
            $pengiriman = Pengiriman::where('nama', 'like','%' . $q . '%')->paginate(4);
        } else {
            $pengiriman = Pengiriman::paginate(4);
        }

        return view('pengiriman.index', compact('pengiriman', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pengiriman.create');
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
            'nama' => 'required|min:5|max:10',
            'biaya' => 'required'
        ],
        [
            'nama.required' => 'silahkan input nama pengiriman',
            'nama.min' => 'nama pengiriman min.5 karakter',
            'nama.max' => 'nama pengiriman max.10 karakter',
            'biaya.required' => 'silahkan input biaya pengiriman'
        ]);

        Pengiriman::create([
            'nama' => $request->nama,
            'biaya' => $request->biaya
        ]);

        return redirect('/pengiriman')->with('success', $request->nama. ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Pengiriman $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Pengiriman $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengiriman $pengiriman)
    {
        return view('pengiriman.edit', compact('pengiriman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Pengiriman $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $request->validate(
            [
                'nama' => 'required|min:5|max:10',
                'biaya' => 'required'
            ],
            [
                'nama.required' => 'silahkan input nama pengiriman',
                'nama.min' => 'nama pengiriman min.5 karakter',
                'nama.max' => 'nama pengiriman max.10 karakter',
                'biaya.required' => 'silahkan input biaya pengiriman'
            ]);
    
            Pengiriman::where('id', $pengiriman->id)->update([
                'nama' => $request->nama,
                'biaya' => $request->biaya
            ]);
    
            return redirect('/pengiriman')->with('success', $request->nama. ' berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Pengiriman $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pengiriman $pengiriman)
    {
        Pengiriman::destroy($pengiriman->id);
        return redirect('/pengiriman')->with('success', $request->nama. ' berhasil dihapus!');
    }
}
