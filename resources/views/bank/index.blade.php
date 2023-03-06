@extends('app')

@section('title', 'elaptop - Bank')

@section('content')
    <div class="page-heading">
        <h3>Daftar Bank</h3>
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
                        <div class="col">
                            <a href="{{ url('/bank/create') }}" type="button" class="btn-sm btn-primary">
                                <i class="fa-solid fa-plus"></i> Tambah
                            </a>
                        </div>
                        <div class="col text-end">
                            <form action="">
                                <input class="" type="text" name="q" placeholder="cari data..."
                                    value="{{ $q }}">
                                <button class="btn btn-success" type="submit"> <i class="fa-solid fa-search"
                                        aria-hidden="true"></i></button>
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
                                    <th>Nama Bank</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nomor Rekening</th>
                                    <th>Logo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bank as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + 1 * ($bank->currentPage() - 1) }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nama_pemilik }}</td>
                                        <td>{{ $item->no_rekening }}</td>
                                        <td>
                                            <img src="{{ asset('assets/images/bank/' . $item->logo) }}" width="150vh"
                                                alt="{{ $item->logo }}">
                                        </td>
                                        <td>
                                            <a href="{{ url('/bank/' . $item->id . '/edit') }}" type="submit"
                                                class="btn btn-success"><i class="fa-solid fa-pen-ruler"
                                                    aria-hidden="true"></i></a>
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
                    {{ $bank->links() }}
                </div>
            </div>
        </section>
    </div>
    {{-- Modal Hapus --}}
    <div class="modal fade" id="modalHapus" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}
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
            var url = "{{ url('/bank') }}/" + id;
            console.log(url);
            $('#modalHapus').modal('show');
            var form = document.getElementById('formHapus');
            form.action = url;
        })
    </script>
@endsection
