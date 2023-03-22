@extends('layout.app')
@section('content')
<div class="container-fluid">

<!-- start page title -->

<!-- end page title -->

<div class="row">
    

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                          <h4>Discount List</h4>
                    </ul>

                    <div class="row">
                       
                        <div class="col-xl-12 col-sm-6">
                           <table border="1" class="table">

                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Discount percent</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($discounts as $discount)
                                <tr>
                                    <td>{{$discount->id}}</td>
                                    <td>{{$discount->name}}</td>
                                    <td>{{$discount->discount_percent}}%</td>
                                    <td>
                                        <a href="{{route('discount.edit',$discount->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('discount.delete',$discount->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                           </table>
                        </div>
                       
                      
                    </div>
                   
                    <!-- end row -->
                       
                    <!-- <div class="row mt-4">
                        <div class="col-sm-6">
                       
                        </div>
                       
                    </div> -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

</div> <!-- container-fluid -->

@endsection