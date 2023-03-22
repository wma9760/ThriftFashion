@include("User.header");



<div class="page-content">

<div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Products</h4>


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom">
                                        <h5 class="mb-0">Filters</h5>
                                    </div>

                                    <div class="p-4">
                                        <h5 class="font-size-14 mb-3">Categories</h5>
                                        <div class="custom-accordion">
                                            <a class="text-body fw-semibold pb-2 d-block" data-bs-toggle="collapse" href="#categories-collapse" role="button" aria-expanded="false" aria-controls="categories-collapse">
                                                <i class="mdi mdi-chevron-up accor-down-icon text-primary me-1"></i>Type
                                            </a>
                                            <div class="collapse show" id="categories-collapse">
                                                <div class="card p-1 border shadow-none">
                                                    <ul class="list-unstyled categories-list mb-0">

                                                        <li class="active">
                                                            <a href="{{url('products')}}">
                                                                <i class="mdi mdi-circle-medium me-1"></i>
                                                                All
                                                            </a>
                                                        </li>

                                                        <li class="active">
                                                            <a href="{{url('products/category/1')}}">
                                                                <i class="mdi mdi-circle-medium me-1"></i>
                                                                Men
                                                            </a>
                                                        </li>

                                                        <li class="active">
                                                            <a href="{{url('products/category/2')}}">
                                                                <i class="mdi mdi-circle-medium me-1"></i>
                                                                Women
                                                            </a>
                                                        </li>


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="p-4 pt-0">
                                        <div class="custom-accordion">
                                            <a class="text-body fw-semibold pb-1 d-block" data-bs-toggle="collapse" href="#categories-collapse" role="button" aria-expanded="false" aria-controls="categories-collapse">
                                                <i class="mdi mdi-chevron-up accor-down-icon text-primary me-1"></i>Sub Categories
                                            </a>
                                            <div class="collapse show" id="categories-collapse">
                                                <div class="card p-2 border shadow-none">
                                                    <ul class="list-unstyled categories-list mb-0">
                                                        @foreach ($subcategories as $subcategory)

                                                        <li>
                                                            <a href="{{url('products/subcategory/'.$subcategory->id)}}">
                                                                <i class="mdi mdi-circle-medium me-1"></i>
                                                                {{$subcategory->subcategory_name}}
                                                            </a>
                                                        </li>

                                                        @endforeach


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div><div class="p-4 pt-0">
                                        <div class="custom-accordion">
                                            <a class="text-body fw-semibold pb-1 d-block" data-bs-toggle="collapse" href="#categories-collapse" role="button" aria-expanded="false" aria-controls="categories-collapse">
                                                <i class="mdi mdi-chevron-up accor-down-icon text-primary me-1"></i>Men
                                            </a>
                                            <div class="collapse show" id="categories-collapse">
                                                <div class="card p-2 border shadow-none">
                                                    <ul class="list-unstyled categories-list mb-0">

                                                        @foreach ($subcategories as $subcategory)

                                                        <li>
                                                            <a href="{{url('products/1/'.$subcategory->id)}}">
                                                                <i class="mdi mdi-circle-medium me-1"></i>
                                                                {{$subcategory->subcategory_name}}
                                                            </a>
                                                        </li>

                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div><div class="p-4 pt-0">
                                        <div class="custom-accordion">
                                            <a class="text-body fw-semibold pb-1 d-block" data-bs-toggle="collapse" href="#categories-collapse" role="button" aria-expanded="false" aria-controls="categories-collapse">
                                                <i class="mdi mdi-chevron-up accor-down-icon text-primary me-1"></i>Women
                                            </a>
                                            <div class="collapse show" id="categories-collapse">
                                                <div class="card p-2 border shadow-none">
                                                    <ul class="list-unstyled categories-list mb-0">

                                                        @foreach ($subcategories as $subcategory)

                                                        <li>
                                                            <a href="{{url('products/2/'.$subcategory->id)}}">
                                                                <i class="mdi mdi-circle-medium me-1"></i>
                                                                {{$subcategory->subcategory_name}}
                                                            </a>
                                                        </li>

                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- <div class="custom-accordion">
                                        <div class="p-4 border-top">
                                            <div>
                                                <h5 class="font-size-14 mb-0"><a href="#filtersizes-collapse" class="text-dark d-block" data-bs-toggle="collapse">Sizes <i class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                                                <div class="collapse show" id="filtersizes-collapse">
                                                    <div class="mt-4">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-1">
                                                                <h5 class="font-size-15 mb-0">Select Sizes</h5>
                                                            </div>
                                                            <div class="w-xs">
                                                                <select class="form-select">
                                                                    <option value="1">3</option>
                                                                    <option value="2">4</option>
                                                                    <option value="3">5</option>
                                                                    <option value="4">6</option>
                                                                    <option value="5" selected="">7</option>
                                                                    <option value="6">8</option>
                                                                    <option value="7">9</option>
                                                                    <option value="8">10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="p-4 border-top">
                                            <div>
                                                <h5 class="font-size-14 mb-0"><a href="#filterprodductcolor-collapse" class="text-dark d-block" data-bs-toggle="collapse">Colors <i class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                                                <div class="collapse show" id="filterprodductcolor-collapse">
                                                    <div class="mt-4">

                                                        <div class="form-check mt-2">
                                                            <input type="checkbox" class="form-check-input" id="productcolorCheck1">
                                                            <label class="form-check-label" for="productcolorCheck1"><i class="mdi mdi-circle text-dark mx-1"></i> Tops</label>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div> --}}

                                </div>
                            </div>

                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <ol class="breadcrumb p-0 bg-transparent mb-2">
                                                            <li class="breadcrumb-item">Thrift / <b>Product</b></li>
                                                        </ol>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">

                                                @foreach ($products as $product)

                                                @foreach($pimage as $img)
                                                    @if($img->product_id==$product->id)
                                                        <!-- {{$imgs=$img->image}} -->
                                                    @endif
                                                @endforeach

                                                <div class="col-xl-4 col-sm-6 itemCard" onclick="location.href='{{url('product/'.$product->id)}}'">
                                                    <div class="product-box">
                                                        <div class="product-img pt-4 px-4">
                                                            {{-- <div class="product-ribbon badge bg-warning">
                                                                Trending
                                                            </div> --}}
                                                            <div class="product-wishlist">
                                                                <a href="#">
                                                                    <i class="mdi mdi-heart-outline"></i>
                                                                </a>
                                                            </div>
                                                            <img src="{{asset('assets/images/product/' . $imgs)}}" alt="" class="img-fluid mx-auto d-block">
                                                        </div>

                                                        <div class="text-center product-content p-4">

                                                            <h5 class="mb-1"><a href="#" class="text-dark">{{$product->name}}</a></h5>
                                                            {{-- <p class="text-muted font-size-13">Gray, Shoes</p> --}}

                                                            <h5 class="mt-3 mb-0"><span class="text-muted me-2"></span>${{$product->price}}</h5>


                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach


                                            </div>


                                            <!-- end row -->

                                            <div class="row mt-4">
                                                <div class="col-sm-6">
                                                    <div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="float-sm-end">
                                                        <ul class="pagination pagination-rounded mb-sm-0 list-group pagination-style">
                                                            <!-- Get Pagination Here -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div>


</div>


@include("User.footer");

<script src="assets/js/pagination.js"></script>
