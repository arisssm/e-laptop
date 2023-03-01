@extends('app')

@section('title', 'elaptop - Edit Data Pengiriman')
@section('content')
    <div class="page-heading">
        <h5>Edit Data Kurir Pengiriman</h5>
    </div>
    <div class="page-content">
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                        <h4 class="card-title">Daftar Bank</h4>
                    </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ url('/pengiriman/' .$pengiriman->id ) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Nama Pengiriman</label>
                                                    <input type="text" id="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        name="nama"
                                                        placeholder="{{ $pengiriman->nama }}">
                                                    <div class="invalid-feedback">
                                                        @error('nama')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Biaya</label>
                                                    <input type="number" id="biaya"
                                                        class="form-control @error('biaya') is-invalid @enderror"
                                                        name="biaya"
                                                        value="{{ $pengiriman->biaya }}">
                                                    <div class="invalid-feedback">
                                                        @error('biaya')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
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
