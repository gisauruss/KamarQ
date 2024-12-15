@extends('landing.index')

@section('title', 'rooms KamarQ')

@section('main')
<section class="coba">
        @if ($liked->isEmpty())
            <p>You haven't liked any posts yet.</p>
        @else
            @foreach ($liked as $row)
                <div class="container">
                    <div class="card">
                        <div class="imgBx">
                            <img src="{{ asset('storage/' . $row->foto_kamar) }}" alt="">
                        </div>
                        <div class="content">
                            <h2 style="color: white;">{{ $row->nama_kamar }}</h2>
                            <p>{!! strip_tags($row->fasilitas) !!}</p>
                            <a href="{{ route('sewa.index.auth', ['kamar_id' => $row->id]) }}">book now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
@endsection
