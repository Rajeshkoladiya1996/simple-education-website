<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Recover Password | {{ env('APP_NAME') }}</title>
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
                                    <h5 class="text-primary"> Reset Password</h5>
                                    <p>Re-Password with {{ env('APP_NAME') }}.</p>
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
                            <div class="alert alert-success text-center mb-4" role="alert">
                                Enter your Email and instructions will be sent to you!
                            </div>
                            <form class="form-horizontal" action="https://themesbrand.com/skote/layouts/vertical/index.html">

                                <div class="form-group">
                                    <label for="useremail">Email</label>
                                    <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>Remember It ? <a href="{{URL::to('la-admin/login')}}" class="font-weight-medium text-primary"> Sign In here</a> </p>
                    <p>© 2020 Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Punit</p>
                </div>

            </div>
        </div>
    </div>
</div>

</body>

</html>
