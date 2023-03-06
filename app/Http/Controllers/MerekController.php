<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

use Symfony\Contracts\Service\Attribute\Required;
use function PHPUnit\Framework\fileExists;

class MerekController extends Controller
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
            $merek = Merek::where('nama', 'like', '%' . $q . '%')->paginate(3);
        } else {
            $merek = Merek::paginate(3);
        }
        // return $merek;
        return view('merek.index', compact('merek', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merek.create');
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
                'nama' => 'required|max:10|min:4',
                'logo' => 'required',
            ],
            [
                'nama.required' => 'Silahkan input nama merek',
                'nama.max' => 'nama merek max.10 karakter',
                'nama.min' => 'nama merek min.4 karakter',
                'logo.required' => 'Silahkan pilih logo',
            ]
        );

        $image = $request->file('logo');
        $logoName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
        $image->move(public_path('assets/images/merek'), $logoName);

        Merek::create([
            'nama' => $request->nama,
            //string, text, number, date, time, -->database
            // type file --> tersendiri di folder
            'logo' => $logoName,
        ]);

        return redirect('/merek')->with('success', $request->nama. ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(Merek $merek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit(Merek $merek)
    {
        // return $merek;
        return view('merek.edit', compact('merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merek $merek)
    {
        // return $request;
        $request->validate(
            [
                'nama' => 'required|max:10|min:4',
                'logo' => 'required',
            ],
            [
                'nama.required' => 'Silahkan input nama merek',
                'nama.max' => 'nama merek max.10 karakter',
                'nama.min' => 'nama merek min.4 karakter',
                'logo.required' => 'Silahkan pilih logo',
            ]
        );

        if ($request->hasFile('logo')) {
            
            // return $merek;

            if (fileExists(public_path('assets/images/merek/' . $merek->logo))) {
                unlink(public_path('assets/images/merek/' . $merek->logo));
            }
            $image = $request->file('logo');
            $logoName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/merek'), $logoName);

            Merek::where('id', $merek->id)
                ->update([
                    'nama' => $request->nama,
                    'logo' => $logoName
                ]);
        } else {
            Merek::where('id', $merek->id)
                ->update([
                    'nama' => $request->nama
                ]);
        }

        return redirect('/merek')->with('success', $request->nama. ' berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merek $merek)
    {

        Merek::destroy($merek->id);
        if (fileExists(public_path('assets/images/merek/' . $merek->logo))) {
            unlink(public_path('assets/images/merek/' . $merek->logo));
        }
        return redirect('/merek')->with('success','Data berhasil dihapus!');
    }
}
