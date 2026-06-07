<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- boostrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- fontawesome cheatsheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- google font open sans -->
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @yield('extra_css')
<body>
    <div id="app">

        <div class="header-menu">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="row">
                        
                        <div class="col-md-4 text-center">
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="">
                                <h3>@yield('title')</h3>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="">
                                <i class="fas fa-bell"></i>
                            </a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
      
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                @yield('content')
        </div>
            </div>
        </div>

        <div class="bottom-menu">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="row">
                        
                        <div class="col-md-4 text-center">
                            <a href="{{route('home')}}">
                                <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="">
                                <i class="fas fa-qrcode"></i>
                                <p>Scan</p>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{route('profile')}}">
                                <i class="fas fa-user"></i>
                                <p>Account</p>
                            </a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- boostrap js-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- custom js -->
    @yield('scripts')
</body>
</html>
