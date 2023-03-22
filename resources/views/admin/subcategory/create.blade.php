@extends('layout.app')
@section('content')

<div class="container-fluid">

<!-- start page title -->

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
                                <h5 class="font-size-16 mb-1">Add SubCategory</h5>
                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                            </div>
                            <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                        </div>
                        
                    </div>
                </a>

                <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                    <div class="p-4 border-top">
                        <form method="post" action="{{route('subcategory.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Category</label>
                                        <select class="form-select  @error('category') is-invalid @enderror" aria-label="Default select example" name="category_id" required>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <option selected disabled>Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                    </select>                       
                                </div>
                            </div>
                            
                           
                               
                        </div>
                        <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="productname">SubCategory Name</label>
                                    <input id="productname" name="subcategory_name" type="text" value="{{old('subcategory_name')}}" class="form-control @error('name') is-invalid @enderror" required>
                                    @error('subcategory_name')
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
<!-- end row -->

<div class="row mb-4">
    <div class="col text-end">
        <a href="{{route('admin.form_cancel')}}" class="btn btn-danger"> <i class="uil uil-times me-1"></i> Cancel </a>
        <input type="submit" class="btn btn-success">  </button>
    </div> <!-- end col -->
</div> <!-- end row-->

</form>

</div> <!-- container-fluid -->
@endsection