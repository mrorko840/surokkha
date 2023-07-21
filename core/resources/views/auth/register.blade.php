<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surokkha - Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <!-- Favicons -->
    <link href="{{asset('assets/image/logo/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/image/logo/favicon.png')}}" rel="apple-touch-icon">
    <style>
        :root {
            --main-bg: #e91e63;
        }

        .main-bg {
            background: var(--main-bg) !important;
        }
        .main-bg-2 {
            background-image: url("assets/image/bg/bg.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        input:focus,
        button:focus {
            border: 1px solid var(--main-bg) !important;
            box-shadow: none !important;
        }

        .form-check-input:checked {
            background-color: var(--main-bg) !important;
            border-color: var(--main-bg) !important;
        }

        .card,
        .btn,
        input {
            border-radius: 20px !important;
        }
        .card {
            color:white;
            background: rgba(255, 255, 255, 0.207);
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 8px );
            -webkit-backdrop-filter: blur( 8px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        }
        .shadow {
            box-shadow: 0 4px 6px #0f4c51a3 !important;
        }
    </style>
</head>

<!-- notify -->
@include('includes.notify')

<body class="main-bg-2">
    <!-- Signup Form -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <script>
            notify('error', '{{$error}}')
        </script>
        @endforeach
    @endif
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 col-md-10 col-sm-12 ">
                <div class="card rounded shadow mb-5">
                    <div class="card-title text-center border-bottom">
                        <img width="130px" class="pt-3" src="{{asset('assets/image/logo/surokkha-logo.png')}}" alt="">
                        <h4 class="p-2">Sign Up</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6 mb-4">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}" />
                                </div>
                                <div class="col-sm-12 col-md-6 mb-4">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" />
                                </div>
                                <div class="col-sm-12 col-md-6 mb-4">
                                    <label for="number" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="number" value="{{old('number')}}" id="number" />
                                </div>
                                <div class="col-sm-12 col-md-6 mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" />
                                </div>
                                <div class="col-sm-12 col-md-6 mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" value="{{old('password')}}" id="password" />
                                </div>
                                <div class="col-sm-12 col-md-6 mb-4">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" id="password_confirmation" />
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn text-light main-bg-2 border-0 shadow">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
