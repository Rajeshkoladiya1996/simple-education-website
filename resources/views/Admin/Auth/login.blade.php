<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{URL::to('storage/app/public/Adminassets/images/favicon.ico')}}">
    <!-- Bootstrap Css -->
    <link href="{{URL::to('storage/app/public/Adminassets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{URL::to('storage/app/public/Adminassets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{URL::to('storage/app/public/Adminassets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to {{ env('APP_NAME') }} .</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{URL::to('storage/app/public/Adminassets/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="#">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{URL::to('storage/app/public/Adminassets/images/logo.svg')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">

                            {{Form::open(array('url'=>'/login','method'=>'post','name'=>'login'))}}
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="username" name="email" placeholder="Enter Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password" placeholder="Enter password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>

                                <div class="mt-3">
                                    {{Form::submit('Log In',array('class'=>'btn btn-primary btn-block waves-effect waves-light'))}}
                                </div>

                                <div class="mt-4 text-center">
                                    <a  href="{{URL::to('/signup')}}" class="text-muted"> Create a New Account ?</a>
                                </div>
                           {{Form::close()}}
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                </div>

            </div>
        </div>
    </div>
</div>

</body>

</html>
