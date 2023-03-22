
@php
session_start();
@endphp

@auth
@php
$_SESSION['u_id']=Auth::user()->id;
@endphp
@endauth

@php

if( !(isset($_SESSION['u_id'])) || $_SESSION['u_id']=='' ){
    $_SESSION['u_id'] = rand(1,9999);
}
@endphp






<script>
    var csrf="{{csrf_token()}}";
    var userId = "{{$_SESSION["u_id"]}}"
    let baseURL = "http://127.0.0.1:8000/"

</script>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />

    <base href="/">

    <title>Thrift eCommerce</title>

    @include("User.style")

</head>

<body data-layout="horizontal" data-topbar="colored">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box mt-4">
                    <a href="{{url('/')}}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-dark.png" alt="" width="80">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" width="80">
                        </span>
                    </a>

                    <a href="{{url('/')}}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-dark.png" alt="" width="80">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" width="80">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <!-- <i class="fa fa-fw fa-bars"></i> -->
                    <i class="fa-solid fa-bars"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-block ">
                    <div class="position-relative ">
                        <input type="text" class="form-control mt-4 " id="navSearchBar" placeholder="Search..." >
                        <span class="my-2"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <div id="searchGet">



                        </div>


                        <span class="uil-search"></span>
                    </div>
                </form>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <i class="uil-search"></i> -->
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                        aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <!-- <i class="mdi mdi-magnify"></i> -->

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect mt-1" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <i class="uil-bell"></i> -->
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="badge bg-danger rounded-pill" id="cartCountArea">0</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="m-0 font-size-16"> Your Cart </h5>
                                </div>
                                <div class="col-auto">
                                    <a href="javascript:void(0)" onclick="clearCart()" class="small">Clear Cart</a>
                                </div>
                            </div>
                        </div>

                        <div data-simplebar class="headerCartMaxHeight" id="getCart">

                        </div>

                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="{{url('cart')}}">
                                <i class="uil-arrow-circle-right me-1"></i> See Entire Cart
                            </a>
                        </div>
                    </div>

                </div>

                @guest

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-4.png"
                            alt="Header Avatar">
                        {{-- <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Marcus</span> --}}
                        <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{url('login')}}"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Log in</span></a>
                        <a class="dropdown-item" href="{{url('register')}}"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">Sign Up</span></a>
                    </div>
                </div>

                @endguest

                @auth
                {{-- If User Logged In --}}
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-4.png"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{ Auth::user()->name }}</span>
                        <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{url('user')}}"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">View Profile</span></a>

                        @if (Auth::user()->role==2)
                        <a class="dropdown-item" href="{{url('admin/dashboard')}}"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Admin Panel</span></a>
                        @endif

                        <a class="dropdown-item" href="{{url('logout')}}"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign Out</span></a>
                    </div>
                </div>

                @endauth

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="uil-cog"></i>
                    </button>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="topnav">

                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}">
                                    <i class="uil-home-alt me-2"></i> Home
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{url('/products')}}" id="topnav-uielement" role="button">
                                    <i class="uil-flask me-2"></i>Products
                                </a>

                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{url('products/categories')}}" id="topnav-more" role="button"
                                   >
                                    <i class="uil-copy me-2"></i>Categories <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-more">

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="{{url('products/category/1')}}" id="topnav-auth"
                                            role="button">
                                            Men <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                            <a href="{{url('products/1/1')}}" class="dropdown-item">Tops</a>
                                            <a href="{{url('products/1/2')}}" class="dropdown-item">Dresses</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="{{url('products/category/2')}}" id="topnav-utility"
                                            role="button">
                                            Women <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                            <a href="{{url('products/2/1')}}" class="dropdown-item">Tops</a>
                                            <a href="{{url('products/2/2')}}" class="dropdown-item">Dresses</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{url('about')}}" id="topnav-layout" role="button">
                                    <i class="uil-window-section me-2"></i>About Us
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{url('contact')}}" id="topnav-layout" role="button">
                                    <i class="uil-window-section me-2"></i>Contact Us
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{url('feedback')}}" id="topnav-layout" role="button">
                                    <i class="uil-window-section me-2"></i>Feedback
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
