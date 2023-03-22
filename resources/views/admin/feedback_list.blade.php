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
                          <h4>Feedback List</h4>
                    </ul>

                    <div class="row">
                       
                        <div class="col-xl-12 col-sm-6">
                           <table border="1" class="table">

                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Feedback</th>
                                </tr>
                                @foreach($feedbacks as $feedback)
                                <tr>
                                    <td>{{$feedback->id}}</td>
                                    <td>{{$feedback->name}}</td>
                                    <td>{{$feedback->email}}</td>
                                    <td>{{$feedback->feedback}}</td>
                                 
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