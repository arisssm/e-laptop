@extends('app')

@section('title', 'elaptop - Edit Merek')
@section('content')
<div class="page-heading">
    <h3>Edit Data Merek</h3>
</div>
<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Merek Laptop</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ url ('/merek/' .$merek->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama" 
                                                    value="{{ $merek->nama }}">
                                                <div class="invalid-feedback">
                                                    @error('nama')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Logo</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" id="" class="form-control @error('logo') is-invalid @enderror" name="logo">
                                                <div class="invalid-feedback">
                                                    @error('logo')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                        </div>
                                        <img src="{{ asset('assets/images/merek/'  . $merek->logo )}}" alt="">
                                        {{-- harusnya pakai js/ akhir pertemuan --}}
                                        <div class="col-sm-12 d-flex justify-content-end mt-2">
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