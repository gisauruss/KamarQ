@extends('Landing.index')

@section('title', 'KamarQ')

@section('main')
     <!-- home section starts -->

     <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="box swiper-slide">
                    <img src="{{ asset('template3/images/kamar1.jpg') }}" alt="">
                    <div class="flex">
                        <h3>KamarQ rooms</h3>
                        <a href="{{ route('landing.rooms')}}" class="btn">check availability</a>
                    </div>
                </div>
                <div class="box swiper-slide">
                    <img src="{{ asset('template3/images/food.jpg') }}" alt="">
                    <div class="flex">
                        <h3>foods and drinks</h3>
                    </div>
                </div>
                <div class="box swiper-slide">
                    <img src="{{ asset('template3/images/beach.jpg') }}" alt="">
                    <div class="flex">
                        <h3>KamarQ halls</h3>
                        <a href="#reviews" class="btn">check our reviews</a>
                    </div>
                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- end home sec -->

    <!-- about section starts -->

    <section class="about" id="about">
        <div class="row">
            <div class="image">
                <img src="{{ asset('template3/images/about1.jpg') }}" alt=" gambar kamar">
            </div>
            <div class="content">
                <h3>Best room</h3>
                <p>
                    The best room in a hotel offers a premium experience with top-tier comfort, luxurious furnishings,
                    and exclusive amenities. It is designed to provide guests with exceptional convenience, privacy, and
                    a memorable stay, often including features like spacious layouts, high-quality bedding, advanced
                    technology, and stunning views.</p>
            </div>
        </div>
        <div class="row revers">
            <div class="image">
                <img src="{{ asset('template3/images/turtlee.jpg') }}" alt="gambar fasilitas">
            </div>
            <div class="content">
                <h3>Best View</h3>
                <p>The best view of turtles offers a close and serene encounter with these magnificent creatures, often
                    in their natural habitats like sandy beaches or underwater environments, providing a unique and
                    peaceful experience.</p>
            </div>
        </div>
        <div class="row">
            <div class="image">
                <img src="{{ asset('template3/images/gedung.jpg') }}" alt="gambar view">
            </div>
            <div class="content">
                <h3>best build</h3>
                <p>refers to the most effective or efficient configuration, setup, or combination of elements that
                    maximize performance or quality. It’s often used in contexts like gaming, architecture, or even
                    product design, where choosing the right components or design can lead to the best results.</p>
            </div>
        </div>

    </section>

    <!-- end abot sec -->

    <!-- services starts -->

    <section class="services">
        <div class="box-container">
            <div class="box">
                <img src="{{ asset('template3/images/pulaubodong.png') }}" alt="">
                <h3>Beach Scenery</h3>
                <p>is the natural beauty of the coast with sand, waves, and sunsets.</p>
            </div>
            <div class="box">
                <img src="{{ asset('template3/images/renang.png') }}" alt="">
                <h3>Swimming Pool</h3>
                <p>is a man-made water area for swimming and relaxing.</p>
            </div>
            <div class="box">
                <img src="{{ asset('template3/images/kelapa-removebg-preview.png') }}" alt="">
                <h3>food and drinks</h3>
                <p>refer to items consumed for nourishment and refreshment</p>
            </div>
            <div class="box">
                <img src="{{ asset('template3/images/turtle-removebg-preview.png') }}" alt="">
                <h3>Sea turtle breeding center</h3>
                <p>refers to a marine reptile with a hard shell, living in oceans and known for long migrations</p>
            </div>
            <div class="box">
                <img src="{{ asset('template3/images/smartdoor-removebg-preview.png') }}" alt="">
                <h3>Smart Door</h3>
                <p>is a door equipped with technology like sensors or smart locks, allowing remote control and enhanced
                    security features</p>
            </div>
            <div class="box">
                <img src="{{ asset('template3/images/ac-removebg-preview.png') }}" alt="">
                <h3>Air Conditioner</h3>
                <p>An air conditioner is a device that cools and dehumidifies indoor air</p>
            </div>

        </div>

    </section>
    <!-- end service -->
    <!-- review section starts -->
    <section class="reviews" id="reviews">
        <div class="swiper reviews-slider">
            <div class="swiper-wrapper">
               @foreach ($review as $row)
               <div class="swiper-slide box">
                <img src="https://ui-avatars.com/api/?name={{ $row->user->name }}" alt="">
                <h3>{{ $row->user->name }}</h3>
                <p>{{ $row->review_text }}</p>
            </div>
               @endforeach
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </section>
@endsection