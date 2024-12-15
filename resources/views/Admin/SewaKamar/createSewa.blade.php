@extends('template.index')

@section('title', 'Form Sewa Kamar')

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
                            <form action="{{ route('create.sewa') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" name="kamar_id" value="{{ $kamar_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Check In</label>
                                        <input type="date" name="check_in"
                                            class="form-control @error('check_in') is-invalid @enderror"
                                            value="{{ old('check_in') }}" required id="exampleInputEmail1"
                                            placeholder="Masukan Nama Produk...">
                                        @error('check_in')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Check Out</label>
                                        <input type="date" name="check_out"
                                            class="form-control @error('check_out') is-invalid @enderror"
                                            value="{{ old('check_out') }}" required id="exampleInputEmail1"
                                            placeholder="Masukan Nama Produk...">
                                        @error('check_out')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label type="hidden">Status Kamar</label>
                                        <select type="hidden" name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option type="hidden">Pilih Status</option>
                                            <option value="confirmed">confirmed</option>
                                            <option value="pending">pending</option>
                                            <option value="done">done</option>
                                            <option value="canceled">pending</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                                    
                                    <div class="form-group">
                                        <label>Tipe Kamar</label>
                                        <select name="fasilitas_tambahan" class="form-control @error('fasilitas_tambahan') is-invalid @enderror">
                                            <option>Fasilitas tambahan</option>
                                            <option value="pelatan_mandi">Peralatan Mandi</option>
                                            <option value="peralatan_tidur">Peralatan Tidur</option>
                                        </select>
                                        @error('fasilitas_tambahan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
