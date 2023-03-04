@extends('app')

@section('title', 'elaptop - Banner')

@section('content')
    <div class="page-heading">
        <h3>Banner {{ $spanduk }}</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link @if (Request::segment(2) == 'satu') active @endif"
                                        href="{{ url('banner/satu') }}">Banner Satu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if (Request::segment(2) == 'dua') active @endif"
                                        href="{{ url('banner/dua') }}">Banner Dua</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col text-end">
                            <form action="">
                                <input class="" type="text" name="q" placeholder="cari data..."
                                    value="">
                                <button class="btn btn-success" type="submit"> <i class="fa-solid fa-search"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-end">
                            @if (Request::segment(2) == 'satu')
                                <a href="{{ url('/banner/create/' . $spanduk) }}" type="button" class="btn-sm btn-primary">
                                    <i class="fa-solid fa-plus"></i> Tambah Banner Satu
                                </a>
                            @else
                                <a href="{{ url('/banner/create/' . $spanduk) }}" type="button" class="btn-sm btn-primary">
                                    <i class="fa-solid fa-plus"></i> Tambah Banner Dua
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table" id="">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banner as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + 5 * ($banner->currentPage() - 1) }}</td>
                                        <td>
                                            <img src="{{ asset('assets/images/banner/' .$spanduk. '/' . $item->gambar) }}"
                                                alt=" {{ $item->gambar }}" width="200vh">
                                        </td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('/banner/edit/' . $item->id . '/' . $spanduk) }}"
                                                class="btn btn-success"><i class="fa-solid fa-pencil-ruler"
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
                    {{ $banner->links() }}
                </div>
            </div>
        </section>
    </div>
    <!-- Modal Hapus Banner Satu -->
    <div class="modal fade" id="modalHapus" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formHapus" action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <h5>Apakah yakin ingin menghapus data ini ? </h5>
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
            var url = "{{ url('/banner') }}/" + id + "/{{ $spanduk }}";
            console.log(url);
            $('#modalHapus').modal('show');
            var form = document.getElementById('formHapus');
            form.action = url;
        })
    </script>
@endsection
