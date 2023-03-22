@include("User.header");

<div class="page-content">

<div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Checkout</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">

                                            <li class="breadcrumb-item active">Checkout</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <form action="{{url('thrift/order')}}" method="POST" class="col-xl-8">
                                <input type="hidden" name="userId" value="{{$_SESSION['u_id']}}">


                                @php
                                    $total=0;
                                @endphp
                                @foreach ($desc as $allData)
                                @php
                                    $total+= $allData['quantity']*$allData['price'];
                                @endphp
                                @endforeach

                                <input type="hidden" name="totalCost" value="{{$total}}">

                                <div class="custom-accordion">
                                    <div class="card">
                                        <a href="#checkout-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse">
                                            <div class="p-4">

                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <i class="uil uil-receipt text-primary h2"></i>
                                                    </div>
                                                    <div class="flex-1 overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">Billing Info</h5>
                                                        <p class="text-muted text-truncate mb-0">Sed ut perspiciatis unde omnis iste</p>
                                                    </div>
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>

                                            </div>
                                        </a>

                                        <div id="checkout-billinginfo-collapse" class="collapse show">
                                            <div class="p-4 border-top">
                                                <div>
                                                    @csrf
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3 mb-4">
                                                                    <label class="form-label" for="billing-name">Name</label>
                                                                    <input type="text" name="checkout_name" value="{{$userdata->name}}" class="form-control" id="billing-name" placeholder="Enter name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3 mb-4">
                                                                    <label class="form-label" for="billing-email-address">Email Address</label>
                                                                    <input type="email" name="checkout_email" value="{{$userdata->email}}" class="form-control" id="billing-email-address" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3 mb-4">
                                                                    <label class="form-label" for="billing-phone">Phone</label>
                                                                    <input type="text" name="checkout_phone" value="{{$userdata->phone}}" class="form-control" id="billing-phone" placeholder="Enter Phone no.">
                                                                </div>
                                                            </div>
                                                        </div>


                                                @php
                                                if($address)
                                                {
                                                    $address1=$address->address1;
                                                    $address2=$address->address2;
                                                    $city=$address->city;
                                                    $state=$address->state;
                                                    $postal_code=$address->postal_code;
                                                    $cardNumber=$address->cardNumber;
                                                    $address= $address1.",".$address2;
                                                }
                                                else {
                                                    $address="";
                                                    $city="";
                                                    $state="";
                                                    $postal_code="";
                                                    $cardNumber="";
                                                }
                                            @endphp

                                                        <div class="mb-4">
                                                            <label class="form-label" for="billing-address">Address</label>
                                                            <textarea class="form-control" id="billing-address" required name="checkout_address" rows="3" placeholder="Enter full address">{{$address}}</textarea>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group mb-4 mb-lg-0">
                                                                    <label class="form-label">Country</label>
                                                                    <select class="form-control form-select" title="Country" disabled>
                                                                        <option value="">-- Select Country --</option>
                                                                        <option value="Pakistan" selected>Pakistan</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="mb-4 mb-lg-0">
                                                                    <label class="form-label" for="billing-city">City</label>
                                                                    <input name="checkout_city" type="text" required value="{{$city}}" class="form-control" id="billing-city" placeholder="Enter City">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="mb-0">
                                                                    <label class="form-label" for="zip-code">Zip / Postal code</label>
                                                                    <input name="checkout_zip" type="text" required value="{{$postal_code}}" class="form-control" id="zip-code" placeholder="Enter Postal code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <a href="#checkout-paymentinfo-collapse" class="collapsed text-dark" data-bs-toggle="collapse">
                                            <div class="p-4">

                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <i class="uil uil-bill text-primary h2"></i>
                                                    </div>
                                                    <div class="flex-1 overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">Payment Info</h5>
                                                        <p class="text-muted text-truncate mb-0">Duis arcu tortor, suscipit eget</p>
                                                    </div>
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>

                                            </div>
                                        </a>

                                        <div id="checkout-paymentinfo-collapse" class="collapse">
                                            <div class="p-4 border-top">
                                                <div>
                                                    <h5 class="font-size-14 mb-3">Payment method :</h5>

                                                    <div class="row">

                                                        <div class="col-lg-3 col-sm-6">
                                                            <div data-bs-toggle="collapse">
                                                                <label class="card-radio-label">
                                                                    <input type="radio" name="pay-method" id="pay-methodoption1" class="card-radio-input">

                                                                    <span class="card-radio text-center text-truncate">
                                                                        <i class="uil uil-postcard d-block h2 mb-3"></i>
                                                                        Credit / Debit Card
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <label class="card-radio-label">
                                                                    <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input">

                                                                    <span class="card-radio text-center text-truncate">
                                                                        <i class="uil uil-paypal d-block h2 mb-3"></i>
                                                                        Paypal
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div> --}}

                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <label class="card-radio-label">
                                                                    <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked="">

                                                                    <span class="card-radio text-center text-truncate">
                                                                        <i class="uil uil-money-bill d-block h2 mb-3"></i>
                                                                        <span>Cash on Delivery</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row my-4">
                                    <div class="col">
                                        <a href="ecommerce-products.html" class="btn btn-link text-muted">
                                            <i class="uil uil-arrow-left me-1"></i> Continue Shopping </a>
                                    </div> <!-- end col -->
                                    <div class="col">
                                        <div class="text-sm-end mt-2 mt-sm-0">
                                            <button type="submit" class="btn btn-success">
                                                Procced
                                            </button>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                            </form>
                            <div class="col-xl-4">
                                <div class="card checkout-order-summary">
                                    <div class="card-body">
                                        <div class="p-3 bg-light mb-4">
                                            <h5 class="font-size-16 mb-0">Order Summary
                                                {{-- <span class="float-end ml-2">#MN0124</span> --}}
                                            </h5>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                                        <th class="border-top-0" scope="col">Product Desc</th>
                                                        <th class="border-top-0" scope="col">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $total=0;
                                                    @endphp
                                                    @foreach ($desc as $allData)

                                                    @php
                                                        $total+= $allData['quantity']*$allData['price'];
                                                    @endphp

                                                        <tr>
                                                            <th scope="row"><img src="assets/images/product/{{$allData['p_img']}}" alt="product-img" title="product-img" class="avatar-md"></th>
                                                            <td>
                                                                <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$allData['title']}}</a></h5>
                                                                <p class="text-muted mb-0">$ {{$allData['price']}} x {{$allData['quantity']}}</p>
                                                            </td>
                                                            <td>$ {{$allData['price']*$allData['quantity']}}</td>
                                                        </tr>


                                                    @endforeach

                                                    <tr>
                                                        <td colspan="2">
                                                            <h5 class="font-size-14 m-0">Sub Total :</h5>
                                                        </td>
                                                        <td>
                                                            $ {{$total}}
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td colspan="2">
                                                            <h5 class="font-size-14 m-0">Discount :</h5>
                                                        </td>
                                                        <td>
                                                            - $ 78
                                                        </td>
                                                    </tr> --}}

                                                    <tr class="bg-light">
                                                        <td colspan="2">
                                                            <h5 class="font-size-14 m-0">Total:</h5>
                                                        </td>
                                                        <td>
                                                            $ {{$total}}
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>

</div>
@include("User.footer");
