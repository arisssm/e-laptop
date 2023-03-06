<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class BankController extends Controller
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
            $bank = Bank::where('nama', 'like', '%' . $q . '%')->paginate(3);
        } else {
            $bank = Bank::paginate(3);
        }
        // $bank = Bank::all();
        // return $bank;
        return view('bank.index', compact('bank', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.create');
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
                'nama' => 'required|min:5|max:20',
                'nama_pemilik' => 'required',
                'no_rekening' => 'required',
                'logo' => 'required'
            ],
            [
                'nama.required' => 'silahkan input nama bank',
                'nama.max' => 'nama bank max.20 karakter',
                'nama.min' => 'nama bank min.5 karakter',
                'nama_pemilik.required' => 'silahkan input nama pemilik',
                'no_rekening.required' => 'silahkan input nomor rekening',
                'logo.required' => 'silahkan pilih logo'
            ]
        );

        $image = $request->file('logo');
        $logoName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
        $image->move(public_path('assets/images/bank'), $logoName);

        Bank::create([
            'nama' => $request->nama,
            'nama_pemilik' => $request->nama_pemilik,
            'no_rekening' => $request->no_rekening,
            'logo' => $logoName
        ]);

        return redirect('/bank')->with('success', $request->nama. ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate(
            [
                'nama' => 'required|min:5|max:20',
                'nama_pemilik' => 'required',
                'no_rekening' => 'required',
                'logo' => 'required'
            ],
            [
                'nama.required' => 'Silahkan input nama bank',
                'nama.max' => 'nama bank max.20 karakter',
                'nama.min' => 'nama bank min.5 karakter',
                'nama_pemilik.required' => 'Silahkan input nama pemilik',
                'no_rekening.required' => 'Silahkan input nomor rekening',
                'logo.required' => 'Silahkan pilih logo'
            ]
        );
        
        if ($request->hasFile('logo')) {

            if (fileExists(public_path('assets/images/bank/' . $bank->logo))) {
                unlink(public_path('assets/images/bank/' . $bank->logo));
            }

            $image = $request->file('logo');
            $logoName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/bank'), $logoName);

            Bank::where('id', $bank->id)->update([
                    'nama' => $request->nama,
                    'nama_pemilik' => $request->nama_pemilik,
                    'no_rekening' => $request->no_rekening,
                    'logo' => $logoName
                ]);
        } else {
            Bank::where('id', $bank->id)->update([
                'nama' => $request->nama,
                'nama_pemilik' => $request->nama_pemilik,
                'no_rekening' => $request->no_rekening
            ]);
        }

        return redirect('/bank')->with('success', $request->nama. ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        Bank::destroy($bank->id);
        if (fileExists(public_path('assets/images/bank/' . $bank->logo))) {
            unlink(public_path('assets/images/bank/' . $bank->logo));
        }
        return redirect('/bank')->with('success','Data berhasil dihapus!');
    }
}
