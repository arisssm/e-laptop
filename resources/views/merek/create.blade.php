@extends('app')

@section('title', 'elaptop - Tambah Merek')
@section('content')
    <div class="page-heading">
        <h3>Tambah Merek</h3>
    </div>
    <div class="page-content">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                        <h4 class="card-title">Horizontal Form</h4>
                    </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ url('/merek') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    @if (old('nama')) is-valid @endif name="nama"
                                                    placeholder="" value="{{ old('nama') }}">
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
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
