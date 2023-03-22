
<div class="pt-4 whiteCol">
<div class="container-fluid">
  <footer class="pt-5">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-sm-12 mt-4">
        <h5>CATAGORIES</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Featured</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tops</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Bottoms</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Shoes</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-4 col-sm-12 mt-4">
        <h5>MENU</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Products</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Men</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Women</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-4 col-sm-12 mt-4">
        <h5>CUSTOMER SUPPORT</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Contact Us</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Locations</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Terms & Conditions</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">privacy Policy</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-9 col-sm-9 mt-4">
        <form class="hndrth">
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of whats new and exciting from us.</p>
          <div class="d-flex w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" id="subscribe" type="button">Subscribe</button>
          </div>
        </form>
      </div>

    </div>

    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>© 2022 Thrift, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul>
    </div>
  </footer>
</div>
</div>

</div>

<script>
    var csrf="{{csrf_token()}}";
    var userId = "{{$_SESSION["u_id"]}}"
</script>

@include("User.script");

</body>
</html>

<script>
    function getHeaderCart(){

        document.getElementById("getCart").innerHTML=``

        $.ajax({
            "type":"POST",
            "url":baseURL+"thrift/get-cart",
            "data":{
                "_token":csrf,
                "user_id":userId
            },
            success:function(data){
                document.getElementById("cartCountArea").innerHTML=``
                // alert(data)
                console.log(data)
                if(data.length>0){
                    for(var eachItem of data){
                        document.getElementById("getCart").innerHTML+=`
                            <a href="#" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                     <img src="assets/images/product/${eachItem.img}"
                                        class="me-3 avatar-xs" height="150px" alt="item-pic">
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1">${eachItem.title}</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">Quantity: ${eachItem.quantity}</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>Total: $${parseFloat(eachItem.p_price)*parseFloat(eachItem.quantity)}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        `
                    }
                    document.getElementById('cartCountArea').innerHTML = data.length
                }
            }
        })
    }

    getHeaderCart()
</script>
