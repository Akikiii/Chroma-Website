<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Black Dashboard') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
    </head>

    <style>
         .myNav {
            display: flex;
            align-items: center;
            height: 50px;
            line-height: 50px;
            background-color: #F1E6FF;
            padding: 0 20px; 
            max-width: 100%; 
            justify-content: space-between;
            }

            .myNav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: inline-block; 
            width: 100%;
            display: flex; 
            align-items: center; 
            }

            .myNav li {
            font-weight:bold;
            float: left;
            display: flex;
            align-items: center; 
            }

            .myNav li a {
            font-size:17px;
            font-weight:bold;    
            display: inline-block;
            text-align: center;
            padding: 14px 16px;
            color: #5F1CFF;
            text-decoration: none;
            }

            .myNav li a:hover {
            color: #333; 
            }
            
            .myNav li a.active {
                background-color: #ccc; 
                color: #fff; 
            }

            .login-signup a:first-child {
                margin-right: 10px;
                }

                .login-signup {
                float: right;
                margin-top: 5px;
                display: flex; 
                align-items: center; 
                }

            .login-signup a {
                top: 5px;
                display: relative;
                padding: 10px;
                border: none;
                border-radius: 5px;
                width: 80px;
                height: 40px;
                background-color: #5F1CFF; 
                color: #F1E6FF; 
                text-decoration: none;
                cursor: pointer;
                text-align: center; 
                white-space: nowrap; 
                overflow: hidden;
                line-height: 20px;
                text-overflow: ellipsis; 
                }

            .login-signup a:hover {
            background-color: #333; /* Change the button background color on hover */
            color: #F1E6FF; /* Keep the button text color the same on hover */
            }

            .login-signup.login {
            margin-right: 10px;
            }

            
            .logo {
            width: 150px; /* Set the logo width */
            height: 150px; /* Set the logo height */
            margin-right: 20px; /* Add some margin between the logo and the navigation links */
            }

            .MainBackground {
            background-image: url("storage/uploads/MainBg.jpg");
            background-repeat: no-repeat;
            background-size: cover; 
            height: 100vh; 
            width: 100vw;
            position: fixed; 
            top: 0;
            left: 0;
            }

            .ContentContainer {
            position: relative;
            height: 100%;
            width: 100%;
            box-sizing: border-box; /* include the padding in the width and height */
            background-color: rgba(42, 29, 68, 0.8); /* white background with 80% opacity */
            opacity: 1; /* add this to make the content fully opaque */
            }

            .headline{
                display: flex;
                color: white;
                font-size: 74px;
                font-weight: bold;
                text-align: left;
                margin-top: 9%; 
                margin-left:5%;
                }
                .subheadline{
                color: white;
                font-size: 74px;
                font-weight: bold;
                text-align: left; 
                margin-left:5%;
                margin-top: -20px;
                }
            
                .miniText{
       
                    color:white;
                    font-size:24;
                    font-weight:bold;
                    text-align:left;
                    margin-top: -25px;
                    margin-left: 5%;
                    
                }
                .side-input {
                    background-color: white;
                    margin-left:20%;
                    border-radius: 20px;
                    padding: 15px 20px;
                    font-size: 16px;
                    margin-top: -25px;
                    width: 800px;
                    margin-bottom: 4px; 
                    border: 2px solid #8E44AD;
                    }

                    .start-mixing {
                    background-color:#BA44AD;
                    position:relative;
                    font-weight:bold;
                    font-size: 20px;
                    font-style: italic;
                    color: white;
                    width: 55%; 
                    height: 50px; 
                    margin-top: -40px;
                    margin-left: -30px;
                    border-radius: 30px;
                    text-align: center;
                    white-space: nowrap;
                    overflow: hidden;
                    top: -17px;
                    left: 670px;
                    line-height: 10px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                    }

                    .start-mixing:hover {
                        background-color: #9C4E9F; /* darker purple button color on hover */
                        }
   
    </style>
    <body class="{{ $class ?? '' }}">
        @auth()
            <div class="wrapper">
                    <div class="MainBackground">
                        <div class="ContentContainer">
                            <nav class="myNav">
                            <ul>
                                <img src="storage\uploads\BGMain2.png" alt="Logo" class="logo"> 
                                <li><a href="home">Home</a></li>
                                <li><a href="storage\uploads\about.jpg">About Us</a></li>
                                <li><a href="Color_mixer#FFFFFF">Mixing Simulator</a></li>
                                <li><a href="Hex_Identifier">Pixel Finder</a></li>
                                <li><a href="Measurement_Tool">Canvas Measurement</a></li>
                            </ul>
                            <div class="login-signup">
                                <a href="#" class="login">Log in</a>
                                <a href="#" class="signup">Sign up</a>
                            </div>
                            </nav>
                            <div class="content">
                            @yield('content')
                            </div>
                            <h1 class="headline">Get the perfect mix in</h1>
                            <h1 class="subheadline">just a few seconds.</h1>
                            <h2 class="miniText"> Mixing paint has never been easier </h2>
                            <div class="email-holder">
                                <div class="form-group col-md-3">
                                <input type=""  class="side-input" id="email" name="side1Width" placeholder="Enter Your Email Address">
                                <button class="start-mixing">Start Mixing!</button>
                                </div>
                            </div>
                            @include('layouts.footer')
                            </div>
                        </div>
        @else
            @include('layouts.navbars.navbar')
            <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        @endauth
       
        <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('black') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script> --}}
        <!--  Notifications Plugin    -->
        <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
        <script src="{{ asset('black') }}/js/theme.js"></script>

        @stack('js')

        <script>



            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');
                    $navbar = $('.navbar');
                    $main_panel = $('.main-panel');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');
                    sidebar_mini_active = true;
                    white_color = false;

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    $('.fixed-plugin a').click(function(event) {
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .background-color span').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data', new_color);
                        }

                        if ($main_panel.length != 0) {
                            $main_panel.attr('data', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data', new_color);
                        }
                    });

                    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            sidebar_mini_active = false;
                            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                        } else {
                            $('body').addClass('sidebar-mini');
                            sidebar_mini_active = true;
                            blackDashboard.showSidebarMessage('Sidebar mini activated...');
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });

                    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                            var $btn = $(this);

                            if (white_color == true) {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').removeClass('white-content');
                                }, 900);
                                white_color = false;
                            } else {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').addClass('white-content');
                                }, 900);

                                white_color = true;
                            }
                    });
                });
            });
        </script>
        @stack('js')
    </body>
</html>
