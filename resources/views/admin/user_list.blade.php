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
                          <h4>Users List</h4>
                    </ul>

                    <div class="row">
                       
                        <div class="col-xl-12 col-sm-6">
                           <table border="1" class="table">

                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    @if($user->role == 1)
                                    <td>Admin</td>
                                    @elseif($user->role == 2)
                                    <td>User</td>
                                    @endif  
                                    <td>
                                        <a href="{{route('admin.userdelete',$user->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                           </table>
                        </div>
                       
                      
                    </div>
                   
        
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

</div> <!-- container-fluid -->

@endsection