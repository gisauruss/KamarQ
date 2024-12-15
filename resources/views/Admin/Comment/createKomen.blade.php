{{-- <div class="modal fade" id="komen{{ $row->id }}" role="dialog" aria-hidden="true">
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
{{--     <br><br>
                        <label for="content">review</label>
                        {{-- <textarea name="review_text" class="form-control" id="" cols="30" rows="10" id="summernote"></textarea> --}}
{{--  <input type="text" id="summernote" class="form-control" name="review_text">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div> --}}

@extends('landing.index')

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
                            <form action="{{ route('review.create') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kamar</label>
                                        <select name="kamar_id" class="form-control">
                                            <option value="#">Pilih kamar</option>
                                            @foreach ($kamar as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama_kamar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="from-group">
                                        <label>Review Kamar</label>
                                        <textarea name="review_text" id="summernote" class="form-control @error('review_text') is-invalid @enderror"></textarea>
                                        @error('review_text')
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
