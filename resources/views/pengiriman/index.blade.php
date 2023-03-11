@extends('app')

@section('title', 'elaptop - Pengiriman')

@section('content')
    <div class="page-heading">
        <h3>Daftar Kurir Pengiriman</h3>
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
                        <div class="col-md-8">
                            <a href="{{ url('/pengiriman/create') }}" type="button" class="btn-sm btn-primary mb-3">
                                <i class="fa-solid fa-plus"></i> Tambah
                            </a>
                        </div>
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
                        <table class="table table-striped table" id="">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Pengiriman</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengiriman as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + 4 * ($pengiriman->currentPage() - 1) }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->biaya }}</td>
                                        <td>
                                            <a href="{{ url('/pengiriman/' . $item->id . '/edit') }}" type="submit"
                                                class="btn btn-success">
                                                <i class="fas fa-pencil-ruler"></i>
                                            </a>
                                            <button id="btnHapus" type="button" class="btn btn-danger"
                                                data-id="{{ $item->id }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $pengiriman->links() }}
                </div>
            </div>
        </section>
    </div>
    {{-- Modal Hapus --}}
    <div class="modal fade" id="modalHapus" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formHapus" action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <h5>Apakah yakin ingin menghapus data?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
        $('body').on('click', '#btnHapus', function(event) {
            var id = $(this).data('id');
            var url = "{{ url('/pengiriman') }}/" + id;
            console.log(url);
            $('#modalHapus').modal('show');
            var form = document.getElementById('formHapus');
            form.action = url;
        })
    </script>
@endsection
