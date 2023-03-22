@include("User.header");

<div class="page-content">

<div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Cart</h4>

                                    <div class="page-title-right">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">

                            <div class="col-xl-8" id="getRealCartHere">

                                <!-- Get All Cart Items Here -->

                            </div>

                            <div class="col-xl-4">
                                <div class="mt-5 mt-lg-0">
                                    <div class="card border shadow-none">
                                        <div class="card-header bg-transparent border-bottom py-3 px-4">
                                            <h5 class="font-size-16 mb-0">Order Summary <span class="float-end">#MN0124</span></h5>
                                        </div>
                                        <div class="card-body p-4">

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Sub Total :</td>
                                                            <td class="text-end">$<span id="subtotal">0</span></td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <td>Discount : </td>
                                                            <td class="text-end">- $ 78</td>
                                                        </tr> --}}
                                                        {{-- <tr>
                                                            <td>Shipping Charge :</td>
                                                            <td class="text-end">$ 25</td>
                                                        </tr> --}}
                                                        {{-- <tr>
                                                            <td>Estimated Tax : </td>
                                                            <td class="text-end">$ 18.20</td>
                                                        </tr> --}}
                                                        <tr class="bg-light">
                                                            <th>Total :</th>
                                                            <td class="text-end">
                                                                <span class="fw-bold">
                                                                    $<span id="totalCost">0</span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6">
                                        <a href="products" class="btn btn-link text-muted">
                                            <u>Continue Shopping</u>
                                        </a>
                                    </div> <!-- end col -->
                                    <div class="col-sm-6">
                                        <div class="text-sm-end mt-2 mt-sm-0">
                                            <form action="{{url('checkout')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="userId" value="{{$_SESSION['u_id']}}">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="uil uil-shopping-cart-alt me-1"></i> Checkout
                                                </button>
                                            </form>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                            </div>


                        </div>
                        <!-- end row -->

                    </div>
</div>

@include("User.footer")

