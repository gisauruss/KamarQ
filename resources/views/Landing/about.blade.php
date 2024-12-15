@extends('Landing.index')

@section('title', 'about KamarQ')

@section('main')
<section class="about" id="about">
    <div class="row">
        <div class="image">
            <img src="{{ asset('template3/images/hotel lagi.jpg')}}" alt=" gambar kamar">
        </div>
        <div class="content">
            <h3>KamarQ</h3>
            <p>KamarQ is a hotel built a few years ago but still maintains a strong and clean structure. It is
                located right next to a beautiful beach, with a turtle and sea turtle sanctuary. KamarQ is highly
                recommended for a family vacation.</p>
            <a href="{{ route('landing.rooms')}}" class="btn">Book Now</a>
        </div>
    </div>
</section>

@endsection