@extends('template.index')

{{-- judul --}}
@section('title', 'Dashboard Categori')

{{-- css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

{{-- body --}}
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-end align-items-center mb-3">
                                    <a href="{{ route('tambah.kamar') }}" class="btn btn-primary">
                                        + Data Produk
                                    </a>
                                </div>

                                @if (Session::get('Sukses'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('Sukses') }}
                                        <button class="close" type="button" data-dismiss="alert">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if (Session::get('Delete'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('Delete') }}
                                        <button class="close" type="button" data-dismiss="alert">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th>Nama Kamar</th>
                                            <th>Tipe Kamar</th>
                                            <th>Fasilitas</th>
                                            <th width="10%">Foto Kamar</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kamar as $row)
                                            <tr>
                                                <td>{{ $row->nomor_kamar }}</td>
                                                <td>{{ $row->nama_kamar }}</td>
                                                <td>{{ $row->tipe_kamar }}</td>
                                                <td>{{ $row->fasilitas }}</td>
                                                <td><img src="{{ asset('storage/' . $row->foto_kamar) }}" width="50px"
                                                        height="50px" alt="{{ $row->nama_kamar }}"></td>
                                                <td>Rp. {{ number_format($row->harga, 2, ',', '.') }}</td>
                                                <td>{{ $row->status }}</td>
                                                <td>
                                                    <a href="{{ route('edit.kamar', $row->id) }}" class="btn btn-info"><i
                                                            class="fas fa-pencil"></i></a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#hapus{{ $row->id }}" class="btn btn-danger"><i
                                                            class="fas fa-trash-can"></i></a>
                                                    <div class="modal fade" id="hapus{{ $row->id }}" role="dialog"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Hapus Data Kamar</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('delete.kamar') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div class="mb-3">
                                                                            <p class="text-center">Beneran mau hapus kamar
                                                                                <strong
                                                                                    style="color: red">{{ $row->nama_kamar }}</strong>????????????
                                                                            </p>
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $row->id }}"
                                                                                class="form-control">
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">HAH
                                                                        HAPUS??????????</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#detail{{ $row->id }}" class="btn btn-primary"><i
                                                            class="fas fa-eye"></i></a>
                                                    @include('Admin.DataKamar.detailKamar')
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#komen{{ $row->id }}" class="btn btn-secondary"><i
                                                            class="fas fa-comment"></i></a>
                                                    <a href="{{ route('sewa.index', ['kamar_id' => $row->id]) }}"
                                                        class="btn icon btn-primary" title="Beri Respon">Sewa<a>
                                                
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- hapus --}}
    <div class="modal fade" id="tambah" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        @csrf
                        <div class="mb-3">
                            <label>Kategori</label>
                            <input type="text" name="categori"
                                class="form-control @error('categori') is-invalid @enderror"
                                value="{{ old('categori') }}">
                            @error('categori')
                                <div class="invalid-feedback">
                                    <strong> {{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    {{-- komen --}}
    <div class="modal fade" id="komen{{ $row->id }}" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Your Review</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('review.create')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label>Kamar</label>
                            <select name="kamar_id" class="form-control">
                                <option value="#">Pilih kamar</option>
                                @foreach ($kamar as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kamar }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="categori"
                                class="form-control @error('categori') is-invalid @enderror"
                                value="{{ old('categori') }}">
                            @error('categori')
                                <div class="invalid-feedback">
                                    <strong> {{ $message }}</strong>
                                </div>
                            @enderror --}}
                                <br><br>
                            <label for="content">review</label>
                            {{-- <textarea name="review_text" class="form-control" id="" cols="30" rows="10" id="summernote"></textarea> --}}
                            <input type="text" id="summernote" class="form-control" name="review_text">
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- javascript --}}
@section('script')
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    {{-- @if (Session::has('Sukses'))
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                $('.swalDefaultSuccess').click(function() {
                    Toast.fire({
                        icon: 'success',
                        title: '{{ Session::get('Sukses')}}'
                    })

                });
            })
        </script>
    @endif --}}
@endsection
