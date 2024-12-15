@extends('template.index')

@section('title', 'Form Edit Sewa')

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
                            <form action="{{ route('update.sewa', $kamar->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- <div class="form-group">
                                        <input type="hidden" name="kamar_id" value="{{ $kamar_id }}">
                                    </div>                         
                                    <div class="form-group"> --}}
                                        <label>Status Kamar</label>
                                        <select name="status" class="form-control">
                                            <option value="{{ $kamar->status }}">{{ $kamar->status }}</option>
                                            <option value="confirmed" {{ 'confirmed' == $kamar->status ? 'selected' : '' }}>
                                                confirmed</option>
                                            <option value="pending" {{ 'pending' == $kamar->status ? 'selected' : '' }}>
                                                pending</option>
                                            <option value="done" {{ 'done' == $kamar->status ? 'selected' : '' }}>
                                                done</option>
                                            <option value="canceled" {{ 'canceled' == $kamar->status ? 'selected' : '' }}>
                                                canceled</option>
                                        </select>
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
