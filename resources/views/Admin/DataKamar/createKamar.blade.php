@extends('template.index')

@section('title', 'Form Input Kamar')

@section('style')
    <link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/codemirror/theme/monokai.css') }}">
@endsection

@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Validation</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Form Input Kamar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="{{ route('created.kamar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nomor Kamar</label>
                                        <input type="text" name="nomor_kamar"
                                            class="form-control @error('nomor_kamar') is-invalid @enderror"
                                            value="{{ old('nomor_kamar') }}" required id="exampleInputEmail1"
                                            placeholder="Masukan Nomor Kamar...">
                                        @error('nomor_kamar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kamar</label>
                                        <input type="text" name="nama_kamar"
                                            class="form-control @error('nama_kamar') is-invalid @enderror"
                                            value="{{ old('nama_kamar') }}" required id="exampleInputEmail1"
                                            placeholder="Masukan Nama Produk...">
                                        @error('nama_kamar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Fasilitas</label>
                                        <input type="text" name="fasilitas"
                                            class="form-control @error('fasilitas') is-invalid @enderror"
                                            value="{{ old('fasilitas') }}" required id="exampleInputEmail1"
                                            placeholder="Masukan Fasilitas Produk...">
                                        @error('fasilitas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Kamar</label>
                                        <select name="tipe_kamar" class="form-control @error('tipe_kamar') is-invalid @enderror">
                                            <option>Pilih Status</option>
                                            <option value="single">Single</option>
                                            <option value="family">Family</option>
                                        </select>
                                        @error('tipe_kamar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status Kamar</label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option>Pilih Status</option>
                                            <option value="available">Available</option>
                                            <option value="booked">booked</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Produk</label>
                                        <input type="text" name="harga"
                                            class="form-control @error('harga') is-invalid @enderror"
                                            value="{{ old('harga') }}" required id="exampleInputEmail1"
                                            placeholder="Masukan Harga Produk...">
                                        @error('harga')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Image kamar</label>
                                        <input type="file" name="foto_kamar" required class="form-control"
                                            @error('foto_kamar')
                                            is-invalid
                                        @enderror>
                                    </div>
                                    <div class="from-group">
                                        <label>Deskripsi Kamar</label>
                                        <textarea name="deskripsi" id="summernote" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('template/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('template/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('template/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('template/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endsection
