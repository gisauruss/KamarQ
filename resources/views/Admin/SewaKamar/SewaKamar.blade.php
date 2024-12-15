   {{-- komen --}}
   <div class="modal fade" id="komen{{ $kamar->id }}" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Your Review</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('review.create') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <div class="form-group">
                            <input type="hidden" name="kamar_id" value="{{ $kamar_id }}">
                        </div>
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