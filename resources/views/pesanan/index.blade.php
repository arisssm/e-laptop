@extends('app')

@section('title', 'elaptop - Data Pesanan')

@section('content')
    <div class="page-heading">
        <h3>Pesanan</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible show fade" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $item)
                            <div class="alert alert-danger alert-dismissible show fade" role="alert">
                                {{ $item }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" placeholder="cari data.."
                                        value="">
                                    <button class="btn btn-success" type="submit" id=""><i
                                            class="fa-solid fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>Nama Bank</th> --}}
                                    <th>Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Catatan</th>
                                    {{-- <th>Nama Pengiriman</th> --}}
                                    <th>Metode Bayar</th>
                                    <th>Total Ongkir</th>
                                    <th>Total Tagihan</th>
                                    <th>Status Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + 3 * ($pesanan->currentPage() - 1) }}</td>
                                        {{-- <td>{{ $item->bank->nama }}</td> --}}
                                        <td>{{ $item->nama}}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->nomor_telepon }}</td>
                                        <td>{{ $item->catatan }}</td>
                                        {{-- <td>{{ $item->pengiriman->nama }}</td> --}}
                                        <td>{{ $item->metode_bayar }}</td>
                                        <td> Rp {{ number_format($item->total_ongkir) }}</td>
                                        <td> Rp {{ number_format($item->total_tagihan) }}</td>
                                        <td>{{ $item->status_bayar }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $pesanan->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
