@extends('template.index')

@section('title', 'Form Input Produk')

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
                        <h1>Edit Kamar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index.kamar') }}">Home</a></li>
                            <li class="breadcrumb-item active">Form Edit Kamar</li>
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
                            <form action="{{ route('update.kamar', $kamar->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nomor Kamar</label>
                                        <input type="text" name="nomor_kamar" class="form-control"
                                            value="{{ $kamar->nomor_kamar }}" required
                                            placeholder="Masukkan Nomor Kamar...">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kamar</label>
                                        <input type="text" name="nama_kamar" class="form-control"
                                            value="{{ $kamar->nama_kamar }}" required placeholder="Masukkan Nama Kamar...">
                                    </div>
                                    <div class="form-group">
                                        <label>Fasilitas</label>
                                        <input type="text" name="fasilitas" class="form-control"
                                            value="{{ $kamar->fasilitas }}" required placeholder="Masukkan Fasilitas...">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Kamar</label>
                                        <select name="tipe_kamar" class="form-control">
                                            <option value="{{ $kamar->tipe_kamar }}">{{ $kamar->tipe_kamar }}</option>
                                            <option value="single" {{ 'single' == $kamar->tipe_kamar ? 'selected' : '' }}>
                                                single</option>
                                            <option value="family" {{ 'family' == $kamar->tipe_kamar ? 'selected' : '' }}>
                                                family</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="{{ $kamar->status }}">{{ $kamar->status }}</option>
                                            <option value="available"
                                                {{ 'available' == $kamar->status ? 'selected' : '' }}>Available</option>
                                            <option value="booked" {{ 'booked' == $kamar->status ? 'selected' : '' }}>
                                                booked</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="harga" class="form-control"
                                            value="{{ $kamar->harga }}" required placeholder="Masukkan Harga...">
                                    </div>
                                    <div class="from-group">
                                        <label>Deskripsi Kamar</label>
                                        <textarea name="deskripsi" id="summernote" class="form-control @error('deskripsi') is-invalid @enderror">{{ $kamar->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
