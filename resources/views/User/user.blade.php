@include("User.header");

<div class="page-content">


                    <div class="container">

                        <div class="row">

                            <!-- Update Profile Section Start -->
                            <div class="col-xl-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h4 class="card-title">Welcome Back {{Auth::user()->name}}</h4>
                                        <p class="card-title-desc">Update your form info by filling out or changing the form below.</p>

                                        <form class="custom-validation" action="#" novalidate="">

                                            <div class="row">

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" id="name" value="{{$user->name}}" required="" placeholder="Enter Full Name">
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">Contact Number</label>
                                                    <div>
                                                        <input type="number" class="form-control" id="contact"  value="{{$user->phone}}" required="" placeholder="Enter a Valid Contact Number">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Email Address</label>
                                                    <div>
                                                        <input type="email" class="form-control" id="email"  value="{{$user->email}}" required="" parsley-type="email" placeholder="Enter a valid e-mail">
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
                                                    }
                                                    else {
                                                        $address1="";
                                                        $address2="";
                                                        $city="";
                                                        $state="";
                                                        $postal_code="";
                                                        $cardNumber="";
                                                    }
                                                @endphp

                                                <div class="mb-3">
                                                    <label class="form-label">Address Line 1</label>
                                                    <div>
                                                        <input type="text" class="form-control" value="{{$address1}}" id="address1" parsley-type="email" placeholder="Enter Address Line 1">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Address Line 2</label>
                                                    <div>
                                                        <input type="text" class="form-control" id="address2"  value="{{$address2}}" placeholder="Enter Address Line 2">
                                                    </div>
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">State</label>
                                                    <div>
                                                        <input type="text" class="form-control" id="state" value="{{$state}}" placeholder="Enter Your State">
                                                    </div>
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">City</label>
                                                    <div>
                                                        <input type="text" class="form-control" id="city" value="{{$city}}" placeholder="Enter Your City">
                                                    </div>
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">ZIP Code</label>
                                                    <div>
                                                        <input type="number" class="form-control" id="zip" value="{{$postal_code}}" placeholder="Enter Your Postal Code">
                                                    </div>
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">Credit Card Number</label>
                                                    <div>
                                                        <input type="number" class="form-control" id="cardNumber" value="{{$cardNumber}}" placeholder="Enter Your Credit Card Number">
                                                    </div>
                                                </div>

                                                <div>
                                                    <div>
                                                        <button type="button" id="update" class="btn btn-primary waves-effect waves-light me-1 mt-2">
                                                            Update Profile
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="alert mt-3" id="alertMsg" style="display:none" role="alert"></div>


                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>
                            <!-- Update Profile Section End -->

                            <!-- Change Password Section Start  -->
                            <div class="col-xl-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h4 class="card-title">Welcome Back {{Auth::user()->name}}</h4>
                                        <p class="card-title-desc">Update your form info by filling out or changing the form below.</p>
                                        <a href="{{url('orders')}}" class="btn btn-primary btn-sm me-1">View Orders</a>

                                        @if ($user->remember_token==1)
                                            <button class="btn btn-danger btn-sm" id="disabledBtn" onclick="disableAcc()">Disable Account</button>
                                        @else
                                            <button class="btn btn-success btn-sm" id="disabledBtn" onclick="disableAcc()">Enable Account</button>
                                        @endif

                                        {{-- <form action="#" class="custom-validation" action="#" id="changePass" novalidate="">
                                            @csrf
                                            <div class="row">

                                                <div class="mb-4">
                                                    <label class="form-label">Old Password</label>
                                                    <div>
                                                        <input type="password" id="oldP" class="form-control" required="" parsley-type="password" placeholder="Enter the Old Password">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">New Password</label>
                                                    <div>
                                                        <input type="password" id="newP" class="form-control" required="" parsley-type="password" placeholder="Enter the New Password">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password</label>
                                                    <div>
                                                        <input type="password" id="conP" class="form-control" parsley-type="password" placeholder="Confirm the New Password">
                                                    </div>
                                                </div>

                                                <div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1 mt-2">
                                                            Change Password
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="alert mt-3" id="alertMsg2" style="display:none" role="alert">

                                                </div>

                                            </div>

                                        </form> --}}

                                    </div>

                                </div>



                                <div class="card">

                                    <div class="card-body">

                                        <h4 class="card-title">Welcome Back {{Auth::user()->name}}</h4>
                                        <p class="card-title-desc">Update your form info by filling out or changing the form below.</p>

                                        <form action="#" class="custom-validation" action="#" id="changePass" novalidate="">
                                            @csrf
                                            <div class="row">

                                                <div class="mb-4">
                                                    <label class="form-label">Old Password</label>
                                                    <div>
                                                        <input type="password" id="oldP" class="form-control" required="" parsley-type="password" placeholder="Enter the Old Password">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">New Password</label>
                                                    <div>
                                                        <input type="password" id="newP" class="form-control" required="" parsley-type="password" placeholder="Enter the New Password">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password</label>
                                                    <div>
                                                        <input type="password" id="conP" class="form-control" parsley-type="password" placeholder="Confirm the New Password">
                                                    </div>
                                                </div>

                                                <div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1 mt-2">
                                                            Change Password
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="alert mt-3" id="alertMsg2" style="display:none" role="alert">

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>
                            <!-- Change Password Section End  -->

                    </div>





</div>

@include("User.footer");
<script src="assets/js/user.js"></script>
