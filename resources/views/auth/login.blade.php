<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    <style>
        body {

          background-color: #0b6e7e;

        }
        .login-logo{
            width: 30%;
        }
    </style>
</head>
<body>
    <body>
        <div class="position-relative vh-100">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="card ">
                                <img src="{{ asset('assets/img/cife-logo.png') }}" class="img-fluid login-logo p-2 m-auto" alt="cife-logo.png">
                                <div class="card-body p-5">

                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailinfo" value="{{ old('email') }}" autofocus>
                                            @error('email')
                                            <div id="emailinfo" class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                          <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" autofocus>
                                            @error('password')
                                            <div  class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                          {{-- <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                          </div> --}}
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</body>
</html>
