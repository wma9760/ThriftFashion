let navHeight = $("#page-topbar").outerHeight()

$(".main-content").css("margin-top",(navHeight-44)+"px")

$(window).resize(function() {
    navHeight = $("#page-topbar").outerHeight()
    $(".main-content").css("margin-top",(navHeight-44)+"px")
})

$(document).ready(()=>{
    $(window).scrollTop(0)
})



$("#subscribe").click(function(){
    var newsletter = $("#newsletter1").val()
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(regex.test(newsletter)){
        alert(newsletter)
    }else{
        // alert("not a valid email")
        $("#newsletter1").css({
            "outline":"1px solid red"
        })
        $("#newsletter1").attr("placeholder","*Enter A Valid Email Address")
        if(newsletter==""){
            $("#newsletter1").attr("placeholder","*Can't leave this field Blank")
        }else{
            $("#newsletter1").val('')
        }
        setTimeout(() => {
            $("#newsletter1").css({
                "outline":"1px solid transparent"
            })
            $("#newsletter1").attr("placeholder","Email Address")
        }, 3000);
    }
})


function getCart(){
    $.ajax({
        "type":"POST",
        "url":baseURL+"thrift/get-cart",
        "data":{
            "_token":csrf,
            "user_id": userId,
            // "cart_id": userId,
        },
        success: function(data){
            document.getElementById("getRealCartHere").innerHTML=``
            var subtotal = 0
            // console.log(data)
            if(data.length>0){
                for(var eachItem of data){
                    subtotal+=parseFloat(eachItem.p_price)*parseFloat(eachItem.quantity)

                    document.getElementById("getRealCartHere").innerHTML+=`

                        <div class="card border shadow-none">
                            <div class="card-body">

                                <div class="d-flex align-items-start border-bottom pb-3">

                                    <div class="me-4">
                                        <img src="assets/images/product/${eachItem.img}" alt="" class="avatar-lg">
                                    </div>
                                    <div class="flex-1 align-self-center overflow-hidden">
                                        <div>
                                            <h5 class="text-truncate font-size-16"><a href="product/${eachItem.p_id}" class="text-dark">Nike N012 Running Shoes</a></h5>
                                            <p class="mb-1">Color : <span class="fw-medium">Gray</span></p>
                                            <p>Size : <span class="fw-medium">08</span></p>
                                        </div>
                                    </div>
                                    <div class="ml-2">
                                        <ul class="list-inline mb-0 font-size-16">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-2">
                                                    <i class="uil uil-trash-alt"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-2">
                                                    <i class="uil uil-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mt-3">
                                                <p class="text-muted mb-2">Price</p>
                                                <h5 class="font-size-16">$${eachItem.p_price}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mt-3">
                                                <p class="text-muted mb-2">Quantity</p>
                                                <div class="product-cart-touchspin oneTen">

                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">

                                                    <span class="input-group-btn input-group-prepend"><button class="btn btn-primary bootstrap-touchspin-down" type="button" onclick="subQnt('${eachItem.id}')">-</button></span>

                                                    <input data-toggle="touchspin" type="text" value="${eachItem.quantity}" class="form-control">

                                                    <span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up" type="button" onclick="addQnt('${eachItem.id}')">+</button></span></div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mt-3">
                                                <p class="text-muted mb-2">Total</p>
                                                <h5 class="font-size-16">$${(parseFloat(eachItem.p_price)*parseFloat(eachItem.quantity))}</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mt-4">
                                                <button class="btn btn-primary" onclick="delcart('${eachItem.id}')">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                `
                }
            }
            document.getElementById("subtotal").innerHTML=subtotal
            document.getElementById("totalCost").innerHTML=subtotal
        }
    })
}


function addQnt(cartId){
    $.ajax({
        "type":"POST",
        "url":baseURL+"thrift/update-add-cart",
        data:{
            "_token":csrf,
            "id":cartId
        },
        success:function(response){
            getCart()
            getHeaderCart()
        }
    })
}

function subQnt(cartId){
    $.ajax({
        "type":"POST",
        "url":baseURL+"thrift/update-remove-cart",
        data:{
            "_token":csrf,
            "id":cartId
        },
        success:function(response){
            getCart()
            getHeaderCart()
        }
    })
}

function delcart(cartId){
    $.ajax({
        "type":"POST",
        "url":baseURL+"thrift/delete-cart",
        data:{
            "_token":csrf,
            "id":cartId
        },
        success:function(response){
            getCart()
            getHeaderCart()
        }
    })
}





    function clearCart(){
        $.ajax({
            "type":"POST",
            "url":baseURL+"thrift/deleteall-cart",
            "data":{
                "_token":csrf,
                "user_id":userId
            },
            success:function(){
                getCart()
                getHeaderCart()
            }
        })
    }



    $("#navSearchBar").keyup(function(){
        var keyw = $("#navSearchBar").val()
        searchItems(keyw)
        if(keyw.length>0){
            $("#searchGet").css({
                "height":"initial",
                "overflow-y":"scroll"
            })
        }else{
            $("#searchGet").css({
                "height":"0",
                "overflow":"hidden"
            })
        }
    })


    function searchItems(keyword){
        $.ajax({
            "type":"GET",
            "url":baseURL+"thrift/search",
            "data":{
                "_token":csrf,
                "keyword":keyword
            },
            success:function(res){
                console.log(res)
                document.getElementById("searchGet").innerHTML=``
                if(res.length>0){
                    for(var itemGet of res){
                        document.getElementById("searchGet").innerHTML+=`
                            <a href="product/${itemGet.p_id}" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <img src="assets/images/product/${itemGet.img}"
                                        class="me-3 avatar-xs" height="150px" alt="item-pic">
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1">${itemGet.title}</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>$${itemGet.price}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        `
                    }
                }else{
                    document.getElementById("searchGet").innerHTML=`
                    <h6 class="text-center my-3">No result Found</h6>
                    `
                }

            }
        })
    }




getCart()
