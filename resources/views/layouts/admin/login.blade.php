        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Worldpedia Education | Login</title>

            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

            <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">

            <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

            <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css?v=3.2.0') }}">

        <body class="hold-transition login-page">
            <div class="login-box">

                <div class="card card-primary">
                    <div class="card-header text-center" style="background-color: yellow;">
                        <h1 style="color: black;">Worldpedia Education</h1>
                    </div>
                    <div class="card-body">
                        <p class="h2 text-center">Login</p>
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session()->get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('login.login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <a href="{{ route('register.index') }}">If you don't have an account, please register</a>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-8">
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-warning btn-block">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            </div>

            </div>


            <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>

            <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <script src="{{ asset('tempalte/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
        </body>

        </html>
