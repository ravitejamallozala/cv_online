
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'My CV Online') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 70vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/profile',[Auth::user()->id]) }}">My Profile</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            My CV Online
        </div>

        <div class="links">
            @auth
                @if (Auth::user()->usertype == 'Candidate')
                    <a href="{{ route('job.getall') }}">Look for Available Jobs </a>
                    <a href="{{ route('cv.show', ['user'=>Auth::user()->id]) }}">Upload Your CV </a>
                @endif
                @if (Auth::user()->usertype == 'Company')
                        <a href="{{ route('job.getall') }}">Look for Available Jobs </a>
                        <a href="{{ route('profile.getall') }}">Look for Candidates </a>
                    <a href="{{ route('job.show', ['user'=>Auth::user()->id]) }}">Post a Job Offer</a>
                @endif
            @else
                <a href="{{ route('job.getall') }}">Look for Available Jobs </a>

            @endauth
            <a href="https://laracasts.com">Contact Us</a>
        </div>
    </div>
</div>
</body>
</html>
