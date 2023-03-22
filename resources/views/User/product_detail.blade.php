@include("User.header");

<div class="page-content">
<div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Product Details</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-5">
                                                <div class="product-detail">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                @php
                                                                    $i=1;
                                                                @endphp
                                                                @foreach ($pimage as $img)

                                                                <a class="nav-link active" id="product-{{$i}}-tab" data-bs-toggle="pill" href="#product-{{$i++}}" role="tab">
                                                                    <img src="{{asset('assets/images/product/'.$img->image)}}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                                                </a>

                                                                @endforeach

                                                            </div>
                                                        </div>

                                                        <div class="col-9">
                                                            <div class="tab-content position-relative" id="v-pills-tabContent">

                                                                <div class="product-wishlist">
                                                                    <a href="#">
                                                                        <i class="mdi mdi-heart-outline"></i>
                                                                    </a>
                                                                </div>
                                                                @php
                                                                    $i=1;
                                                                @endphp
                                                                @foreach ($pimage as $item)

                                                                <div class="tab-pane fade @if($i==1) show active @endif" id="product-{{$i++}}" role="tabpanel">
                                                                    <div class="product-img">
                                                                        <img src="{{asset('assets/images/product/'.$img->image)}}" alt="" class="img-fluid mx-auto d-block" data-zoom="{{asset('assets/images/product/'.$img->image)}}">
                                                                    </div>
                                                                </div>

                                                                @endforeach

                                                            </div>
                                                            <div class="row text-center mt-2">
                                                                <div class="col-sm-12 d-grid">
                                                                    <button id="addToCart" onclick="addToCart('{{$product->id}}')" type="button" class="btn btn-primary btn-block waves-effect waves-light mt-2 me-1">
                                                                        <i class="uil uil-shopping-cart-alt me-2"></i> Add to cart
                                                                    </button>
                                                                </div>

                                                                <div class="alert alert-success mt-3"  id="pd_alert" role="alert" style="display: none">Your item has been added in cart</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="mt-4 mt-xl-3 ps-xl-4">

                                                    <h4 class="font-size-20 mb-3">{{$product->name}}</h4>


                                                    <h5 class="mt-4 pt-2">$@if ($product->discount_id!=0)
                                                        @foreach ($discounts as $discount )
                                                        @if ($discount->id==$product->discount_id)
                                                        @php
                                                        $selling_price = $product->price - ($product->price * ($discount->discount_percent / 100));
                                                        @endphp
                                                        {{ $selling_price }}
                                                        @endif
                                                        @endforeach
                                                        @else
                                                        {{$product->price}}
                                                    @endif</h5>


                                                    <div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mt-3">

                                                                    <h5 class="font-size-14">Description :</h5>
                                                                    <ul class="list-unstyled product-desc-list text-muted">
                                                                        <li><p class="mt-4 text-muted">{{$product->description}}</p></li>
                                                                    </ul>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="mt-3">
                                                                    <h5 class="font-size-14">Services :</h5>
                                                                    <ul class="list-unstyled product-desc-list text-muted">
                                                                        <li><i class="uil uil-bill text-primary me-1 font-size-16"></i> Cash on Delivery available</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3">

                                                            <h5 class="font-size-14 mb-3"><i class="uil uil-location-pin-alt font-size-20 text-primary align-middle me-2"></i> Quantity</h5>

                                                            <div class="d-inline-flex">


                                                                <div class="input-group mb-3">

                                                                    <button class="btn btn-light" id="minusQnt" type="button">-</button>

                                                                    <input type="number" id="qnt" style="width:70px; text-align:center;" class="form-control" value="1">

                                                                    <button class="btn btn-light" id="plusQnt" type="button">+</button>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="mt-4">
                                            <h5 class="font-size-14 mb-3">Product description: </h5>
                                            <div class="product-desc">
                                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                                    <li class="nav-item">
                                                      <a class="nav-link" id="desc-tab" data-bs-toggle="tab" href="#desc" role="tab">Description</a>
                                                    </li>
                                                    <li class="nav-item">
                                                      <a class="nav-link active" id="specifi-tab" data-bs-toggle="tab" href="#specifi" role="tab">Specifications</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content border border-top-0 p-4">
                                                    <div class="tab-pane fade" id="desc" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2">
                                                                <div>
                                                                    <img src="{{asset('assets/images/product/'.$img->image)}}" alt="" class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9 col-md-10">
                                                                <div class="text-muted p-2">
                                                                    <p>{{$product->description}}</p>

                                                                    <div>
                                                                        <ul class="list-unstyled product-desc-list text-muted">
                                                                            <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Sed ut perspiciatis omnis iste</li>
                                                                            <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Neque porro quisquam est</li>
                                                                            <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Quis autem vel eum iure</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                                        <div class="table-responsive">
                                                            <table class="table table-nowrap mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row" style="width: 20%;">Category</th>
                                                                        <td>Shoes</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Brand</th>
                                                                        <td>Nike</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Color</th>
                                                                        <td>Gray</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Quality</th>
                                                                        <td>High</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Material</th>
                                                                        <td>Leather</td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
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

@include("User.footer")

<script>

    var limit = {{$product->stock}}

    $("#plusQnt").click(function() {
        var qnttt = parseInt($("#qnt").val())
        if(qnttt<limit){
            $("#qnt").val(qnttt+1)
        }
    })
    $("#minusQnt").click(function() {
        var qnttt = parseInt($("#qnt").val())
        if(qnttt>1){
            $("#qnt").val(qnttt-1)
        }
    })
    $("#qnt").keyup(function(){
        var qnttt = parseInt($("#qnt").val())
        if(qnttt<1){
            $("#qnt").val(1)
        }

        if(!(qnttt<=limit)){
            $("#qnt").val(limit)
        }

    })

    if(limit<1){
        $("#addToCart"). prop('disabled', true)
        $("#addToCart").html('Out of Stock')
    }

    function addToCart(p_id){
        $.ajax({
            "type":"POST",
            "url":baseURL+"thrift/add-cart",
            "data":{
                "_token":"{{csrf_token()}}",
                "product_id":p_id,
                "product_quantity":$("#qnt").val(),
                "user_id":{{$_SESSION["u_id"]}},
            },
            success:function(response){
                getCart()
                getHeaderCart()
                $("#qnt").val(1)
                $("#pd_alert").css("display","block")
                setTimeout(() => {
                    $("#pd_alert").css("display","none")
                }, 3000);
            }
        })
    }

</script>
