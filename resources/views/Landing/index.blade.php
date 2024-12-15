<?php

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;


?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chicle&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Mate+SC&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Puddles&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('template3/mycss/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('template3/images/kamarQ-logo.png') }}" type="image/x-icon">
    <!-- Tambahkan ini di bagian <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @yield('style')


</head>
<style>
    #notification-list {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 10px;
        z-index: 1000;
    }

    #notifications li {
        list-style: none;
        padding: 5px 10px;
        border-bottom: 1px solid #ddd;
    }

    #notifications li:hover {
        background-color: #f9f9f9;
    }

    #notifications button {
        background: #e74c3c;
        color: white;
        border: none;
        padding: 3px 6px;
        border-radius: 3px;
        cursor: pointer;
    }

    #notifications button:hover {
        background: #c0392b;
    }

    .scroll-top-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background-color: #315098;
        color: white;
        border: none;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        display: none;
        /* Awalnya tidak terlihat */
        z-index: 1000;
        transition: opacity 0.3s;
    }

    .scroll-top-btn:hover {
        background-color: #8ca8be;
    }

    .btn-notification{
        text-decoration: none;
    }
</style>

</style>

<body>

    {{-- <a href="#home" class="go-top-btn">
        <i class="fa-solid fa-arrow-up"></i>
    </a> --}}


    <!-- header section starts -->

    <section class="header">

        @guest

            <!-- sebelum login -->
            <div class="flex">
                <img src="{{ asset('template3/images/kamaQ.png') }}" alt="" width="80px" height="80px">
                <div class="sign-in">

                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn">Sign In</a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn">Sign Up</a>
                    @endif
                </div>
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
            {{-- end sebelum login --}}
        @else
            <!-- setelah login -->
            <div class="flex">

                <img src="{{ asset('template3/images/kamaQ.png') }}" alt="" width="80px" height="80px">

                <div class="sign-in flex">
                    <div class="search-container">
                        <form action="{{ route('landing.search') }}" class="search-box" method="GET">
                            <input type="text" name="query" placeholder="Search for produk . . .">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <!-- Notifikasi -->
                    <?php
                    $notifications = Notification::where('user_id', Auth::user()->id)
                        ->where('read', false)
                        ->get();
                    $unreadNotificationsCount = $notifications->count();
                    ?>
                    <!-- Notifikasi -->
                    <div class="dropdown">
                        <a href="#" class="search-box btn-notification" id="notificationDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="background-color: transparent; color: black; cursor: pointer; display: flex; align-items: center; justify-content: center; position: relative;">
                            <i class="fa-solid fa-bell" style="font-size: 24px; color: #315098;"></i>
                            <span class="notification-count"
                                style="position: absolute; top: -5px; right: -5px; background-color: #8ca8be; color: #fff; border-radius: 50%; width: 15px; height: 15px; display: flex; align-items: center; justify-content: center;">{{ $unreadNotificationsCount }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown"
                            style="width: 300px; padding: 10px;">
                            <h6 class="dropdown-header text-center">Notifications</h6>
                            <div id="notification-items">
                                @foreach ($notifications as $notification)
                                    @php
                                        $backgroundColor = $notification->read ? '#fff' : '#e9ecef';
                                    @endphp
                                    <li class="d-flex justify-content-between align-items-center mb-2"
                                        style="background-color: #fff;">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-2">
                                                <h6 class="mb-0">{{ $notification->title }}</h6>
                                                <p class="mb-0">{{ $notification->message }}</p>
                                            </div>
                                        </div>
                                        @if (!$notification->read)
                                            <form action="{{ route('notifications.read', $notification->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-secondary"><i
                                                        class="fa-solid fa-check"></i></button>
                                            </form>
                                        @endif
                                    </li>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                    <!-- End Notifikasi -->

                    <a href="{{ route('user.liked') }}" style="margin-right: 20px;">
                        <i class="fa-solid fa-heart" style="font-size: 24px; color: #315098;"></i>
                    </a>


                    <div class="img-jay" style="margin-top: 10px;">
                        <div class="dropdown">

                            <div role="button" data-bs-toggle="dropdown">
                                <img class="img-user rounded-circle"
                                    src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                                    alt="Photo User"style="margin-bottom: 15px;" />
                            </div>
                            <ul class="dropdown-menu">
                                @if (Auth::user()->role == 'admin')
                                    <li>
                                        <br>
                                        <a href="{{ route('index.home') }}" class="dropdown-item">Dashboard</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            class="dropdown-item">
                                            <br>
                                            <p>
                                                Logout
                                            </p>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @elseif(Auth::user()->role == 'customer')
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            class="dropdown-item">
                                            <br>
                                            <p>
                                                Logout
                                            </p>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endif

                            </ul>
                        </div>


                    </div>
                </div>
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
        @endguest
        @if (Session::get('Sukses'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Sukses') }}
                <button class="close" type="button" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (Session::get('Delete'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('Delete') }}
                <button class="close" type="button" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <nav class="navbar">
            <a href="{{ route('landing.home') }}">Home</a>
            <a href="{{ route('landing.about') }}">About</a>
            <a href="{{ route('landing.rooms') }}">Rooms</a>
        </nav>
        <!-- Scroll Top Button -->
        <button id="scrollTopButton" class="scroll-top-btn">↑</button>

    </section>

    <!-- header section ends -->

    @yield('main')

    <!-- footer -->
    <section class="footer">
        <div class="credit">&copy; copyright @ 2024 by mrs. Eunseok | all rights reseved</div>

    </section>

    <!-- sw js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- js -->
    <script src="{{ asset('template3/js/script.js') }}"></script>
    {{-- bs --}}
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Ambil elemen tombol scroll top
        const scrollTopButton = document.getElementById('scrollTopButton');

        // Tampilkan tombol ketika scroll lebih dari 100px
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                scrollTopButton.style.display = 'block';
            } else {
                scrollTopButton.style.display = 'none';
            }
        });

        // Scroll ke atas ketika tombol diklik
        scrollTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
        @yield('script')

</body>

</html>
