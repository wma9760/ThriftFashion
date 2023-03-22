<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Register | Thrift</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="{{url('/')}}" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="{{url('/')}}" class="mb-5 d-block auth-logo">
                                <img src="assets/images/logo-dark.png" alt="" height="22" class="logo logo-dark">
                                <img src="assets/images/logo-light.png" alt="" height="22" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Register Account</h5>
                                    <p class="text-muted">Get your free Thrift account now.</p>
                                </div>
                                @if(count($errors) > 0)
                                <div class="p-1">
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}}</div>
                                    @endforeach
                                </div>
                                @endif
                                <div class="p-2 mt-4">
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Enter email">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="phone">Phone</label>
                                            <input type="number" name="phone" class="form-control" value="{{old('phone')}}" id="email" placeholder="Enter Phone">
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="confirmpassword">Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="confirmpassword" placeholder="Confirm password">
                                        </div>

                                        {{-- <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-terms-condition-check">
                                            <label class="form-check-label" for="auth-terms-condition-check">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                        </div> --}}



                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Register</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="text-muted mb-0">Already have an account ? <a href="{{url('login')}}" class="fw-medium text-primary"> Login</a></p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> Thrift</p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/minible/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 May 2021 17:32:52 GMT -->
</html>
