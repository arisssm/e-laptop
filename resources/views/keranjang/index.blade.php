@extends('app')

@section('title', 'elaptop - Data Keranjang')

@section('content')
    <div class="page-heading">
        <h3>Keranjang</h3>
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
                                        value="{{ $q }}">
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
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Banyak</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keranjang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + 3 * ($keranjang->currentPage() - 1) }}</td>
                                        <td>{{ $item->produk->nama }}</td>
                                        <td> Rp {{ number_format($item->produk->harga) }}</td>
                                        <td>{{ $item->banyak }}</td>
                                        <td> Rp {{ number_format($item->total_harga) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $keranjang->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
