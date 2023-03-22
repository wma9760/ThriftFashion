@include('User.header')

<div class="my-5 pt-sm-5 py-5">
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="text-center">
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <div class="error-img">
                                    {{-- <img src="assets/images/404-error.png" alt="" class="img-fluid mx-auto d-block"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="text-uppercase mt-5">Your Order Has Been Placed</h4>
                    <p class="text-muted">Thank you for stopping by Thrift Fashion, We hope you'll comeby again!</p>
                    <div class="mt-5">
                        <a class="btn btn-primary waves-effect waves-light" href="{{url('products')}}">Back to Shop more</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('User.footer')
