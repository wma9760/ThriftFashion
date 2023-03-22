@include("User.header");
    <div class="main-content">
    @include("User.slider");



    <div class="page-content">

                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Featured Products</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Products</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">

                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">


                                                @foreach ($featuredReturn as $item)

                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="product-box">
                                                        <div class="product-img pt-4 px-4">



                                                        @if($item['trend']=='1')
                                                        <div class="product-ribbon badge bg-warning">
                                                            Trending
                                                        </div>
                                                        @endif


                                                            <div class="product-wishlist">
                                                                <a href="#">
                                                                    <i class="mdi mdi-heart-outline"></i>
                                                                </a>
                                                            </div>
                                                            <img src="{{asset('assets/images/product/'.$item['img'])}}" alt="" class="img-fluid mx-auto d-block">
                                                        </div>

                                                        <div class="text-center product-content p-4">

                                                            <h5 class="mb-1"><a href="#" class="text-dark">{{$item['title']}}</a></h5>

                                                            <h5 class="mt-3 mb-0"><span class="text-muted me-2"></span> ${{$item['price']}}</h5>


                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach

                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->











                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">On Sale</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Products</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">


                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="row">

                                                @foreach ($latestReturn as  $item)

                                                <div class="col-xl-2 col-sm-6 smallItem">
                                                    <div class="product-box">
                                                        <div class="product-img pt-4 px-4">



                                                        @if($item['trend']=='1')
                                                        <div class="product-ribbon badge bg-warning">
                                                            Trending
                                                        </div>
                                                        @endif

                                                            <div class="product-wishlist">
                                                                <a href="#" class=" bg-success border-0 text-white">
                                                                    {{$item['discount_percent']}}%

                                                                    {{-- <i class="mdi mdi-heart-outline"></i> --}}
                                                                </a>
                                                            </div>
                                                            <img src="{{asset('assets/images/product/'.$item['img'])}}" alt="" class="img-fluid mx-auto d-block">
                                                        </div>

                                                        <div class="text-center product-content p-4">

                                                            <h5 class="mb-1"><a href="#" class="text-dark">{{ $item['title'] }}</a></h5>
                                                            {{-- <p class="text-muted font-size-13">Gray, Shoes</p> --}}

                                                            <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>${{ $item['price'] }}</del></span> ${{ $item['selling_price'] }}</h5>


                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">New Arrivals</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Products</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">

                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">

                                            @foreach ($oldestReturn as  $item)

                                            <div class="col-xl-2 col-sm-6 smallItem">
                                                <div class="product-box">
                                                    <div class="product-img pt-4 px-4">

                                                        @if($item['trend']=='1')
                                                        <div class="product-ribbon badge bg-warning">
                                                            Trending
                                                        </div>
                                                        @endif


                                                        <div class="product-wishlist">
                                                            <a href="#">
                                                                <i class="mdi mdi-heart-outline"></i>
                                                            </a>
                                                        </div>
                                                        <img src="{{asset('assets/images/product/'.$item['img'])}}" alt="" class="img-fluid mx-auto d-block">
                                                    </div>

                                                    <div class="text-center product-content p-4">

                                                        <h5 class="mb-1"><a href="#" class="text-dark">Nike N012 Shoes</a></h5>
                                                        <p class="text-muted font-size-13">Gray, Shoes</p>

                                                        <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$280</del></span> $260</h5>


                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach

                                            </div>
                                            <!-- end row -->

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>


    </div>
@include("User.footer");
