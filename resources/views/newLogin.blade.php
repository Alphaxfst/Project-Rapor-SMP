<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{asset('bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">

    <title>Login</title>
    <link rel="icon" href="{{asset('dist/img/logo.png')}}" type="image/x-icon">
</head>

<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #23395B;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #ffffff;
            border-radius: 10px;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 30px;
        }

        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;

        }

        .text-apani {
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }
    </style>

    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row mt-2" style="text-align: center;">
                                    <div class="col-6">
                                        <a href="/" class="text-apani text-primary"><strong>Login</strong></a>
                                    </div>
                                    <div class="col-6 pb-3">
                                        <a href="/newRegister" class="text-apani text-secondary"><strong>Daftar</strong></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form id="login-form" class="form" method="POST" action="{{ route('postLogin') }}">
                                    @csrf

                                    <div class="form-group pt-2>
                                        <label for=" username" class="text-dark">Username:</label><br><i class="bi bi-person-badge"></i>
                                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Masukkan username">


                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group pt-2">
                                        <label for="password" class="text-dark">Password:</label><br>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6">
                                            <div class="form-group text-center"><br>
                                                <button type="submit" class="form-control btn btn-outline-primary">
                                                    {{ __('Masuk') }}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>