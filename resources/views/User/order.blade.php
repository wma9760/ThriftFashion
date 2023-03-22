@include("User.header");

<div class="page-content">



    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Orders</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li> --}}
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div>

                    {{-- <div class="float-end">
                        <form class="d-inline-flex mb-3">
                            <label class="form-check-label my-2 me-2" for="order-selectinput">Orders</label>
                            <select class="form-select" id="order-selectinput">
                                <option selected>All</option>
                                <option value="1">Active</option>
                                <option value="2">Unpaid</option>
                            </select>
                        </form>
                    </div> --}}

                </div>
                <div class="table-responsive mb-4">
                    <table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                        <thead>
                            <tr class="bg-transparent">
                                <th style="width: 20px;">
                                    <div class="form-check text-center font-size-16">
                                        <label class="form-check-label" for="ordercheck"></label>
                                    </div>
                                </th>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Billing Name</th>
                                <th>Total</th>
                                <th>Order Status</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="getOrdersHere">



                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>



</div>

@include("User.footer");
<script src="assets/js/user.js"></script>

<script>


    function getOrders(){
        $.ajax({
            "type":"GET",
            "url":baseURL+"thrift/get-order",
            "data":{
                "_token":csrf,
                "user_id":"{{$_SESSION["u_id"]}}"
            },
            success:function(res){
                // console.log(res)
                document.getElementById("getOrdersHere").innerHTML = ``
                if(res.length>0){
                    for(var orders of res){

                        if(orders.status==0){
                            var statusResult = `<div class="badge bg-pill bg-soft-danger font-size-12">Cancelled</div>`

                            var cancelBtn = `<button class="btn btn-secondary btn-sm" disabled>Cancelled Order</button>`
                        }
                        if(orders.status==1){
                            var statusResult = `<div class="badge bg-pill bg-soft-warning font-size-12">Ordered</div>`

                            var cancelBtn = `<button class="btn btn-danger btn-sm" onclick="cancelOrder('${orders.order_id}')">Cancel Order</button>`
                        }
                        if(orders.status==2){
                            var statusResult = `<div class="badge bg-pill bg-soft-success font-size-12">Delivered</div>`

                            var cancelBtn = ``
                        }

                        document.getElementById("getOrdersHere").innerHTML += `
                            <tr>
                                <td>
                                    <div class="form-check text-center font-size-16">
                                        <label class="form-check-label" for="ordercheck2"></label>
                                    </div>
                                </td>

                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#OI${orders.order_id}</a> </td>
                                <td>
                                    ${orders.order_date}
                                </td>
                                <td>
                                    ${orders.order_name}
                                </td>

                                <td>
                                   $ ${orders.total}
                                </td>
                                <td>
                                    ${statusResult}
                                </td>

                                <td>
                                    ${cancelBtn}
                                </td>
                            </tr>
                        `

                    }
                }
            }
        })
    }
    getOrders()


    function cancelOrder(o_id){
        $.ajax({
            "type":"POST",
            "url":baseURL+"thrift/cancel-order",
            "data":{
                "_token":csrf,
                "order_id":o_id
            },
            success:function(res){
                getOrders()
            }
        })
    }


</script>
