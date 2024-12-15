@extends('landing.index')

@section('title', 'order KamarQ')

@section('style')
    <style>
        .star-rating {
            display: flex;
            flex-direction: row;
            gap: 5px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 20px;
            color: #ddd;
            cursor: pointer;
        }

        .star-rating input:checked~label,
        .star-rating input:hover~label,
        .star-rating label:hover~label {
            color: #315098;
        }
    </style>
@endsection

@section('main')
    <section class="container detail-checkout">
        <div class="row">

            <div class="col-md-6 left-content">
                <div class="p-5">
                    <div class="video">
                        <img class="img-fluid" style="border-radius: 30px;"
                            src="{{ $kamar->foto_kamar ? asset('storage/' . $kamar->foto_kamar) : asset('images/default-image.jpg') }}"
                            alt="View Video">
                    </div>
                    <button class="like-btn" data-kamar-id="{{ $kamar->id }}"
                        style="font-size: 20px; background-color: transparent; color: #315098"><i
                            class="fa-regular fa-heart"></i></button>
                    <a href="{{ route('komen.index.auth', ['kamar_id' => $kamar->id]) }}" class="btn-secondary"
                        style="font-size: 20px; background-color: transparent; color: #315098; margin-left: 7px;"><i
                            class="fas fa-comment"></i></a>
                    <a href="{{ route('komplen.index.auth', ['kamar_id' => $kamar->id])}}" class="btn-secondary"
                        style="font-size: 20px; background-color: transparent; color: #315098; margin-left: 7px;"><i
                            class="fa-solid fa-exclamation"></i></a>
                    <div class="star-rating">
                        <input type="radio" id="star5-{{ $kamar->id }}" name="rating-{{ $kamar->id }}"
                            value="5" /><label for="star5-{{ $kamar->id }}"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star4-{{ $kamar->id }}" name="rating-{{ $kamar->id }}"
                            value="4" /><label for="star4-{{ $kamar->id }}"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star3-{{ $kamar->id }}" name="rating-{{ $kamar->id }}"
                            value="3" /><label for="star3-{{ $kamar->id }}"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star2-{{ $kamar->id }}" name="rating-{{ $kamar->id }}"
                            value="2" /><label for="star2-{{ $kamar->id }}"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star1-{{ $kamar->id }}" name="rating-{{ $kamar->id }}"
                            value="1" /><label for="star1-{{ $kamar->id }}"><i class="fa fa-star"></i></label>
                    </div>
                    <div class="desc">
                        <span
                            style="color: #315098">{{ $kamar->nama_kamar ? $kamar->nama_kamar : 'Nama kamar belum tersedia' }}</span>
                        <p style="color: #315098">
                            {{ $kamar->deskripsi ? strip_tags($kamar->deskripsi) : 'Deskripsi belum tersedia.' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 right-content d-flex justify-content-center" style="margin-top: -25px;">
                <section class="about" id="about">
                    <div class="row revers">
                        <div class="content">
                            <div class="reservation">
                                <form action="{{ route('create.auth.sewa') }}" method="post">
                                    @csrf
                                    <h3 style="color: white;">make a reservation</h3>
                                    <div class="flex">
                                        <div class="box">
                                            <input type="hidden" name="kamar_id" value="{{ $kamar_id }}">
                                        </div>
                                        <div class="box">
                                            <label class="text-input">Check In</label>
                                            <input type="date" name="check_in"
                                                class="input @error('check_in') is-invalid @enderror"
                                                value="{{ old('check_in') }}" required id="exampleInputEmail1"
                                                placeholder="Masukan Nama Produk...">
                                            @error('check_in')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="box">
                                            <label class="text-input">Check Out</label>
                                            <input type="date" name="check_out"
                                                class="input @error('check_out') is-invalid @enderror"
                                                value="{{ old('check_out') }}" required id="exampleInputEmail1"
                                                placeholder="Masukan Nama Produk...">
                                            @error('check_out')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="box">
                                            <label class="text-input">Fasilitas Tambahan</label>
                                            <select name="fasilitas_tambahan"
                                                class="input @error('fasilitas_tambahan') is-invalid @enderror">
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
                                        <div class="box">
                                            <label class="text-input">Deskripsi Kamar</label>
                                            <textarea name="deskripsi" id="summernote" class="input @error('deskripsi') is-invalid @enderror"> </textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btnn" style="width: 400px">Book Now</button>
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
                </section>
                {{-- <form class="mt-4">
                    <div class="mb-3 inputan">
                        <label for="exampleInputEmail1" class="form-label">Kategori Produk</label>
                        <input type="text" class="form-control" readonly value="#">
                    </div>
                    <div class="mb-3 inputan">
                        <label for="fullName" class="form-label">Merk Produk</label>
                        <input type="text" class="form-control" value="#"" readonly>
                    </div>
                    <div class="mb-3 inputan">
                        <label for="Occupation" class="form-label">Harge</label>
                        <input type="text" class="form-control" value="Rp.10.000" readonly>
                    </div>



                </form> --}}
            </div>

        </div>
    </section>


@endsection

@section('script')
    <script>
        document.querySelectorAll('.like-btn').forEach(button => {
            button.addEventListener('click', function() {
                const kamarId = this.getAttribute('data-kamar-id');
                const isLiked = this.querySelector('i').classList.contains('fa-solid');

                fetch(isLiked ? '/unlike' : '/like', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            kamar_id: kamarId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.querySelector('i').classList.toggle('fa-solid');
                            this.querySelector('i').classList.toggle('fa-regular');
                        }
                    });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.star-rating input').forEach(radio => {
            radio.addEventListener('change', function() {
                const kamarId = this.name.split('-')[1]; // Pastikan formatnya benar
                const rating = this.value;

                fetch('/rate', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            kamar_id: kamarId,
                            rating: rating
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Rating submitted successfully!');
                        } else {
                            alert('Failed to submit rating. Please try again.');
                        }
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                        alert('Error submitting rating. Please try again later.');
                    });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.confirm-button').forEach(button => {
    button.addEventListener('click', function() {
        const sewakamarId = this.dataset.sewakamarId;

        fetch(`/confirm-booking/${sewakamarId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
            }
        });
    });
});

    </script>

@endsection
