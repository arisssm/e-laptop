@extends('app')

@section('title', 'elaptop - Edit Bank')
@section('content')
    <div class="page-heading">
        <h5>Edit Data Bank</h5>
    </div>
    <div class="page-content">
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-9 col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                        <h4 class="card-title">Daftar Bank</h4>
                    </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ url('/bank/' .$bank->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Nama Bank</label>
                                                    <input type="text" id="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        name="nama" placeholder="" 
                                                        value="{{ $bank->nama }}">
                                                    <div class="invalid-feedback">
                                                        @error('nama')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Nama Pemilik</label>
                                                    <input type="text" id="nama_pemilik"
                                                        class="form-control @error('nama_pemilik') is-invalid @enderror"
                                                        name="nama_pemilik" placeholder=""
                                                        value="{{ $bank->nama_pemilik }}">
                                                    <div class="invalid-feedback">
                                                        @error('nama_pemilik')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Nomor Rekening</label>
                                                    <input type="number" id="no_rekening"
                                                        class="form-control @error('no_rekening') is-invalid @enderror"
                                                        name="no_rekening"
                                                        value="{{ $bank->no_rekening}}">
                                                    <div class="invalid-feedback">
                                                        @error('no_rekening')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Logo</label>
                                                    <input type="file" id="logo"
                                                        class="form-control @error('logo') is-invalid @enderror"
                                                        name="logo">
                                                    <div class="invalid-feedback">
                                                        @error('logo')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                                <img src="{{ asset('assets/images/bank/'  . $bank->logo )}}" alt="">
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
