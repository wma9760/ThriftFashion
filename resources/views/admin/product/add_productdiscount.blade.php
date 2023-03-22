@extends('layout.app')
@section('content')

<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Add Product Discount</h4>

            {{-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Thrift Fashion</a></li>
                    <li class="breadcrumb-item active">Add Product Discount</li>
                </ol>
            </div> --}}

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div id="addproduct-accordion" class="custom-accordion">
            <div class="card">
                <a href="#addproduct-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-billinginfo-collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        01
                                    </div>
                                </div>
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">Add Product Discount</h5>
                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                            </div>
                            <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                        </div>

                    </div>
                </a>

                <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                    <div class="p-4 border-top">
                        <form method="post" action="{{route('product.store_discount',$productdiscount->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="productname">Product Discount Name</label>
                                <input id="productname" name="name" type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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

<div class="row mb-4">
    <div class="col text-end">
        <a href="#" class="btn btn-danger"> <i class="uil uil-times me-1"></i> Cancel </a>
        <input type="submit" class="btn btn-success">  </button>
    </div> <!-- end col -->
</div> <!-- end row-->

</form>

</div> <!-- container-fluid -->
@endsection
