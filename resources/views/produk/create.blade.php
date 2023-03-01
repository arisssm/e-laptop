@extends('app')

@section('title', 'elaptop - Tambah Produk')
@section('content')
    <div class="page-heading">
        <h5>Tambah Produk</h5>
    </div>
    <div class="page-content">
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Produk Laptop</h4>
                        </div>
                        {{-- @if ($errors->any())
                            @foreach ($errors->all() as $item)
                                <div class="alert alert-danger" role="alert">
                                    {{ $item }}
                                </div>
                            @endforeach
                        @endif --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ url('/produk') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Merek</label>
                                                    <select class="form-select @error('merek_id') is-invalid @enderror"
                                                        name="merek_id" id="merek_id">
                                                        <option value="">--Pilih Merek--</option>
                                                        @foreach ($merek as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Nama Laptop</label>
                                                    <input type="text" id="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        @if (old('nama')) is-valid @endif
                                                        name="nama" placeholder="nama-laptop"
                                                        value="{{ old('nama') }}">
                                                    <div class="invalid-feedback">
                                                        @error('nama')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Harga</label>
                                                    <input type="number" id="harga" min="0" max="999999999"
                                                        class="form-control @error('harga') is-invalid @enderror"
                                                        @if (old('harga')) is-valid @endif
                                                        name="harga"
                                                        value="{{ old('harga')}}">
                                                    <div class="invalid-feedback">
                                                        @error('harga')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Foto</label>
                                                    <input type="file" id=""
                                                        class="form-control @error('foto') is-invalid @enderror"
                                                        name="foto">
                                                    <div class="invalid-feedback">
                                                        @error('foto')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Spesifikasi</label>
                                                    <textarea type="text" name="spesifikasi" id="spesifikasi"
                                                        class="form-control @error('spesifikasi') is-invalid @enderror" 
                                                        cols="20" rows="4">
                                                    </textarea>
                                                    <div class="invalid-feedback">
                                                        @error('spesifikasi')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Stok</label>
                                                    <input type="number" id="stok" min="0" max="99"
                                                        class="form-control @error('stok') is-invalid @enderror"
                                                        @if ( old('stok')) is-valid @endif
                                                        name="stok" value="{{ old('stok')}}">
                                                    <div class="invalid-feedback">
                                                        @error('stok')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="rekomendasi" type="checkbox"
                                                    id="rekomendasi" value="ya">
                                                <div class="invalid-feedback">
                                                    @error('rekomendasi')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                <label class="form-check-label" for="">Pilih Rekomendasi</label>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-1 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
