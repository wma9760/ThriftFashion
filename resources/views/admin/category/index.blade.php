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
                          <h4>Category List</h4>
                    </ul>

                    <div class="row">
                       
                        <div class="col-xl-12 col-sm-6">
                           <table border="1" class="table">

                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Delete</a>
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