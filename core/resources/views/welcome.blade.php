<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Surokkha</title>
    <!-- Favicons -->
    <link href="{{asset('assets/image/logo/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/image/logo/favicon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('assets/welcome/css/styles.css')}}" rel="stylesheet" />
    <style>
        .gr-btn-orange {
            color: white;
            border: 1px solid rgba(255,70,57,1);
            background: linear-gradient(180deg, rgba(255,70,57,1) 0%, rgb(249, 163, 101) 55%, rgba(255,223,188,1) 100%);
            box-shadow: 0 0.5rem 1rem rgb(255 34 0 / 49%) !important;
        }
        .gr-btn-purple {
            color: white;
            border: 1px solid rgb(143, 57, 255);
            background: linear-gradient(180deg, rgb(143, 57, 255) 0%, rgb(211, 116, 255) 55%, rgb(249, 188, 255) 100%);
            box-shadow: 0 0.5rem 1rem rgb(235 0 255 / 49%) !important;
        }

        .gr-btn-orange:hover {
            color: white;
            border: 1px solid rgba(255,70,57,1);
            background: linear-gradient(90deg, rgba(255,70,57,1) 0%, rgb(249, 163, 101) 55%, rgba(255,223,188,1) 100%);
            box-shadow: 0 0.5rem 1rem rgb(255 34 0 / 49%) !important;
        }
        .gr-btn-purple:hover {
            color: white;
            border: 1px solid rgb(143, 57, 255);
            background: linear-gradient(90deg, rgb(143, 57, 255) 0%, rgb(211, 116, 255) 55%, rgb(249, 188, 255) 100%);
            box-shadow: 0 0.5rem 1rem rgb(235 0 255 / 49%) !important;
        }

        .gr-btn-orange:focus {
            color: white;
            border: 1px solid rgba(255,70,57,1);
            background: linear-gradient(90deg, rgba(255,70,57,1) 0%, rgb(249, 163, 101) 55%, rgba(255,223,188,1) 100%);
            box-shadow: 0 0.5rem 1rem rgb(255 34 0 / 49%) !important;
        }
        .gr-btn-purple:focus {
            color: white;
            border: 1px solid rgb(143, 57, 255);
            background: linear-gradient(90deg, rgb(143, 57, 255) 0%, rgb(211, 116, 255) 55%, rgb(249, 188, 255) 100%);
            box-shadow: 0 0.5rem 1rem rgb(235 0 255 / 49%) !important;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5 text-center">
            <a class="navbar-brand fw-bold" href="#page-top">Surokkha</a>
        </div>
    </nav>
    <!-- Mashead header-->
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-3">Make Your Own Card</h1>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto">
                                <a class="btn btn-lg shadow gr-btn-orange" href="{{route('login')}}">Login</a>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-lg shadow gr-btn-purple" href="{{route('register')}}">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Masthead device mockup feature-->
                    <div class="masthead-device-mockup">
                        <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                    <stop class="gradient-start-color" offset="0%"></stop>
                                    <stop class="gradient-end-color" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg>
                        <svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(120.42 -49.88) rotate(45)"></rect>
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(-49.88 120.42) rotate(-45)"></rect>
                        </svg>
                        <svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg>
                        <div class="device-wrapper">
                            <div class="device" data-device="iPhoneX" data-orientation="portrait"
                                data-color="black">
                                <div class="screen bg-black">
                                    <!-- PUT CONTENTS HERE:-->
                                    <!-- * * This can be a video, image, or just about anything else.-->
                                    <!-- * * Set the max width of your media to 100% and the height to-->
                                    <!-- * * 100% like the demo example below.-->
                                    {{-- <video muted="muted" autoplay="" loop=""
                                        style="max-width: 100%; height: 100%">
                                        <source src="assets/img/demo-screen.mp4" type="video/mp4" />
                                    </video> --}}
                                    <img style="max-width: 100%; height: 100%" src="{{asset('assets/welcome/assets/img/demo-screen.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    </aside>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('assets/welcome/js/scripts.js')}}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
