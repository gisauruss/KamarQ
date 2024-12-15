{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('template2/css/csslogin/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chicle&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Mate+SC&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Puddles&display=swap"
        rel="stylesheet">
</head>

<body class="sign-in">
    <!-- sign in -->
    <div class="containerr active">
        <div class="form-box login">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>login</h1>
                <div class="input-box"> 
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" name="email" placeholder="Email">
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                            value=" {{ old('password') }}" name="password" placeholder="Password">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <a href="">Forgot Password</a>
                </div>
                <button type="submit" class="btn">
                    login
                </button>
            </form>
        </div>

        <!-- sign up -->
        <div class="form-box register">
            <form action="{{ route('register')}}" method="POST">
                @csrf
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" name="name" placeholder="name">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" name="email" placeholder="Email">
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                        value="{{ old('email') }}" name="phone_number" placeholder="Phone">
                    <i class='bx bxs-phone'></i>
                </div>
                <div class="input-box">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        value=" {{ old('password') }}" name="password" placeholder="Password">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm Password">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">
                    Register
                </button>
            </form>
        </div>

        <!--  -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>hello,Welcome</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('template2/js/signIn.js') }}"></script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('template4/style.css') }}" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="{{ route('login') }}" method="POST" class="sign-in-form">
            @csrf
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class='bx bx-envelope'></i>
             <input type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" name="email" placeholder="Email">
          </div>
          <div class="input-field">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
            value=" {{ old('password') }}" name="password" placeholder="Password">
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>




        <form action="{{ route('register')}}" method="POST" class="sign-up-form">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class='bx bxs-user'></i>
            <input type="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" name="name" placeholder="name">
          </div>
          <div class="input-field">
            <i class='bx bx-envelope'></i>

            <input type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" name="email" placeholder="Email">
          </div>
          <div class="input-field">
            <i class='bx bxs-phone'></i>
            <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                        value="{{ old('email') }}" name="phone_number" placeholder="Phone">
          </div>
          <div class="input-field">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
            value=" {{ old('password') }}" name="password" placeholder="Password">
          </div>
          <div class="input-field">
            <i class='bx bxs-lock-alt'></i>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm Password">
          </div>
          <input type="submit" class="btn" value="Sign up" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content" style="margin-right: 50px">
          <h3>New here ?</h3>
          <p>
            Let's create an account to make things easier.
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <dotlottie-player class="image" src="https://lottie.host/0d7cf5b1-36b6-4561-bed9-b93a605a0a4c/1FwNDtgVGw.lottie" background="transparent" speed="1" style="width: 400px; height: 400px; margin-right: 40px;" loop autoplay></dotlottie-player>


      </div>
      <div class="panel right-panel">
        <div class="content" style="margin-right: 50px">
          <h3>One of us ?</h3>
          <p>
            Let's log in with an existing account.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <dotlottie-player class="image" src="https://lottie.host/2f3ad036-3087-4486-a007-2280db858795/8Q6twCp1tS.lottie" background="transparent" speed="1" style="width: 400px; height: 400px" loop autoplay></dotlottie-player>
      </div>
    </div>
  </div>
 

  <script src="{{ asset('template4/app.js') }}"></script>
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</body>


</html>