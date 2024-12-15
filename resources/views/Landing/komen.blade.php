
@extends('landing.index')

@section('title', 'Form Comment Kamar')

@section('style')
    <link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/codemirror/theme/monokai.css') }}">
@endsection

@section('main')
    <div class="justify-content-center" style="margin-top: -25px;">
        <section class="about" id="about">
            <div class="row revers">
                <div class="content">
                    <div class="reservation">
                        <form action="{{ route('review.auth.create') }}" method="post">
                            @csrf
                            <h3 style="color: white;">Your Review</h3>
                            <div class="flex" style="flex-direction: column;">
                                <div class="box form-group">
                                    <input type="hidden" name="kamar_id" value="{{ $kamar_id }}">
                                </div>
                                <div class="box" style=" margin-top: -350px;">
                                    <label class="text-input">Review Kamar</label>
                                    <textarea name="review_text" id="summernote" class="input @error('complaint_text') is-invalid @enderror"> </textarea>
                                    @error('review_text')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer" style=" margin-top: -250px;">
                                <button type="submit" class="btnn" style="width: 400px;">Send Review</button>
                            </div>
                            {{-- @guest
                                <a href="{{ route('login') }}" class="btnn" style="width: 400px">sek, login dulu
                                    yo</a>
                            @else
                                @if (Auth::user()->role == 'customer')
                                    <div class="card-footer">
                                        <button type="submit" class="btnn" style="width: 400px">Submit</button>
                                    </div>
                                @endif
                            @endguest --}}
                        </form>
                    </div>
                </div>
            </div>
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
