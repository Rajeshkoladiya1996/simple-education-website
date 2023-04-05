<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Feb 2020 04:49:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Lock screen | {{ env('APP_NAME') }}</title>
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
                                    <h5 class="text-primary">Lock screen</h5>
                                    <p>Enter your password to unlock the screen!</p>
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

                            {{Form::open(array('url'=>'la-admin/lock','method'=>'post','name'=>'lockscreen','class'=>'form-horizontal'))}}
                                <div class="user-thumb text-center mb-4">

                                    @if(file_exists(storage_path('app/public/user/'.Auth::user()->profile_pic)) && Auth::user()->profile_pic != '')
                                        <img src="{{URL::to('storage/app/public/user/'.Auth::user()->profile_pic)}}" class="rounded-circle img-thumbnail avatar-md"
                                             alt="user">
                                    @else
                                        <img src="{{URL::to('storage/app/public/default/default_user.jpg')}}" class="rounded-circle img-thumbnail avatar-md"
                                             alt="user">
                                    @endif
                                    <h5 class="font-size-15 mt-3">{{Auth::user()->name}}</h5>
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

                                <div class="form-group row mb-0">
                                    <div class="col-12 text-right">
                                        {{Form::submit('Unlock',array('class'=>'btn btn-primary w-md waves-effect waves-light'))}}
                                    </div>
                                </div>

                            {{Form::close()}}
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>Not you ? return <a href="{{URL::to('la-admin/login')}}" class="font-weight-medium text-primary"> Sign In </a> </p>
                    <p>© 2020 Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Punit</p>
                </div>

            </div>
        </div>
    </div>
</div>

</body>

<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Feb 2020 04:49:44 GMT -->
</html>
