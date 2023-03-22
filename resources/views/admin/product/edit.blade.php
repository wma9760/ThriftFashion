@extends('layout.app')
@section('content')
<div class="container-fluid">
<base href="/">
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
                                <h5 class="font-size-16 mb-1">Edit Product</h5>
                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                            </div>
                            <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                        </div>
                        
                    </div>
                </a>

                <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                    <div class="p-4 border-top">
                        <form method="post" action="{{route('product.update',$product->id)}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="productname">Product Name</label>
                                <input id="productname" name="name" type="text" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                                  
                                </div>
                                <div class="col-lg-6">
                                    
                                <div class="mb-3">
                                        <label class="form-label" for="manufacturerbrand">Product Size</label>
                                        <select class="form-select  @error('category') is-invalid @enderror" aria-label="Default select example" name="size" requiredname="size" id="">
                                        <option value="small" {{ ($product->size == "small") ? 'selected' : '' }} >Small</option>
                                        <option value="medium" {{ ($product->size == "medium") ? 'selected' : '' }}>Medium</option>
                                        <option value="large" {{ ($product->size == "large") ? 'selected' : '' }}>Large</option>
                                        <option value="extra large" {{ ($product->size == "extra large") ? 'selected' : '' }}>Extra Large</option>
                                        </select> 
                                
                                        @error('size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                            <label class="form-label" for="image">Product Image</label>
                                            <!-- <input id="image" name="image[]" type="file" class="form-control  @error('image') is-invalid @enderror" multiple required> -->
                                            <input id="image" name="image[]" type="file"  class="form-control" multiple   >
                                          
                                    </div>
                                  
                                 </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 text-center">
                                        <div class="images-preview-div">
                                        @foreach($images as $image)
                                        <div class="d-inline">

                                            <img src="{{asset('assets/images/product/'.$image->image)}}" alt="product image" class="img-fluid rounded mb-3" width="100px" height="100px">
                                            <a class="close text-danger" href="{{route('product.deleteImage',$image->id)}}" data-bs-toogle="tooltip" data-bs-pacement="bottom" title="Remove"> 
                                                <span > &times;</span></a>
                                            </div>
                                        @endforeach
                                        
                                          </div>
                                    </div>
                                 </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="manufacturerbrand">Product Stock</label>
                                        <input id="manufacturerbrand" name="stock" type="number" value="{{$product->stock}}"class="form-control  @error('stock') is-invalid @enderror" required>
                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="mb-3">
                                        <label class="form-label" for="price">Price</label>
                                        <input id="price" name="price" type="number" value="{{$product->price}}" class="form-control  @error('size') is-invalid @enderror" required>
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Category</label>
                                        <select  id="category-dropdown" class="form-select   @error('category') is-invalid @enderror" aria-label="Default select example" name="category_id" required>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <option selected disabled>Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-6">
                                <div class="mb-3">
                                        <label class="form-label" class="control-label">Sub Category</label>
                                        <select id="subcategory-dropdown"class="form-select  @error('subcategory') is-invalid @enderror" aria-label="Default select example" name="subcategory_id" >
                                        @error('subcategory')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            @foreach($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}" {{$product->subcategory_id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->subcategory_name}}</option>
                                            @endforeach

                                    </select>




                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Discount</label>
                                        <select class="form-select  @error('discount') is-invalid @enderror" aria-label="Default select example" name="discount_id" required>
                                        @error('discount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <option selected disabled>Select Discount</option>
                                        <option selected  value="0">No Discount</option>
                                            @foreach($discount as $discount)
                                            <option value="{{$discount->id}}" {{$product->discount_id == $discount->id ? 'selected' : ''}}>{{$discount->name}}</option>
]                                            @endforeach
                                    </select>                       
                                </div>
                            </div>

                            <div class="mb-0">
                                <label class="form-label" for="productdesc">Product Description</label>
                                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="productdesc" rows="4" required>{{$product->description}}</textarea>
                                @error('description')
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