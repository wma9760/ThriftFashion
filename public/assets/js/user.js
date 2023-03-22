
$("#changePass").on('submit',(e)=>{
    var oldP = $("#oldP").val()
    var newP = $("#newP").val()
    var conP = $("#conP").val()
    if(oldP==""||newP==""||conP==""){

        e.preventDefault()

        if(oldP==""){{
            $("#oldP").css({
                "outline":"1px solid red"
            })
        }}
        if(newP==""){{
            $("#newP").css({
                "outline":"1px solid red"
            })
        }}
        if(conP==""){{
            $("#conP").css({
                "outline":"1px solid red"
            })
        }}

        alertBox("Cannot Leave Any Field Blank" ,"alertMsg2" ,"0")

        setTimeout(() => {
            $("#oldP ,#newP ,#conP").css({
                "outline":"1px solid transparent"
            })
        }, 3000);
    }

    if(newP!=conP){

        e.preventDefault()

        $("#newP ,#conP").css({
            "outline":"1px solid red"
        })
        $("#newP ,#conP").val('')
        alertBox("Please Make sure that your both passowrds is match" ,"alertMsg2" ,"0")

        setTimeout(() => {
            $("#newP ,#conP").css({
                "outline":"1px solid transparent"
            })
        }, 3000);
    }

})

function alertBox(message ,id ,response){
    if(response=="1"){
        var color = "alert-success"
    }
    if(response=="0"){
        var color = "alert-danger"
    }
    $("#"+id).addClass(color)

    $("#"+id).text(message)
    $("#"+id).css("display","block")

    setTimeout(() => {
        $("#"+id).text('')
        $("#"+id).css("display","none")
        $("#"+id).removeClass(color)
    }, 3000);

}


$("#update").click(()=>{

    var fname = $("#name").val()
    var contact = $("#contact").val()
    var email = $("#email").val()
    var address1 = $("#address1").val()
    var address2 = $("#address2").val()
    var state = $("#state").val()
    var city = $("#city").val()
    var zip = $("#zip").val()
    var card = $("#cardNumber").val()

    if(fname=="" || contact=="" || email=="" || address1=="" || state=="" || city=="" || zip==""){

        if(fname==""){
            $("#name").css('outline','1px solid red')
        }if(contact==""){
            $("#contact").css('outline','1px solid red')
        }if(email==""){
            $("#email").css('outline','1px solid red')
        }if(address1==""){
            $("#address1").css('outline','1px solid red')
        }if(state==""){
            $("#state").css('outline','1px solid red')
        }if(city==""){
            $("#city").css('outline','1px solid red')
        }if(zip==""){
            $("#zip").css('outline','1px solid red')
        }


        $("#alertMsg").css('display','block')
        $("#alertMsg").addClass('alert-danger')
        $("#alertMsg").text('Cannot Leave Any Field Blank')

        setTimeout(() => {
            $("#name, #contact, #email, #address1, #state,#city,#zip").css('outline','1px solid transparent')
            $("#alertMsg").css('display','none')
            $("#alertMsg").removeClass('alert-danger')
            $("#alertMsg").text('')
        }, 3000);

    }else{

        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(regex.test(email)){


        $.ajax({
            url: "/update-user-profile",
            // dataType: "json",
            type: "Post",
            data: {
                '_token': $('input:hidden[name="_token"]').val(),
                'name':$('#name').val(),
                'email':$('#email').val(),
                'phone':$('#contact').val(),
                'address1':$('#address1').val(),
                'address2':$('#address2').val(),
                'city':$('#city').val(),
                'state':$('#state').val(),
                'postal_code':$('#zip').val(),
                'cardNumber':$('#cardNumber').val(),
                },
            success: function () {
            $("#alertMsg").css('display','block')
            $("#alertMsg").addClass('alert-success')
            $("#alertMsg").text('Your Account has been updated successfully')
            // $("#fullname, #email, #subject, #msg").val('')
            }
        })

            setTimeout(() => {
                $("#fullname,#email,#subject,#msg").css('outline','1px solid transparent')
                $("#alertMsg").css('display','none')
                $("#alertMsg").removeClass('alert-success')
                $("#alertMsg").text('')
            }, 3000);

        }else{
            var email = $("#email").css('outline','1px solid red')

            $("#alertMsg").css('display','block')
            $("#alertMsg").addClass('alert-danger')
            $("#alertMsg").text('Please Enter a valid Email Address')
            $("#email").text('')

            setTimeout(() => {
                $("#email").css('outline','1px solid transparent')
                $("#alertMsg").css('display','none')
                $("#alertMsg").removeClass('alert-danger')
                $("#alertMsg").text('')
            }, 3000);

        }
    }

})

function disableAcc()
{
    $.ajax({
        url: "/disable-user-profile",
        type: "Post",
        data: {
            '_token':csrf,
            'id':userId,
            },
            success: function (data) {
                if(data==1){
                    $("#disabledBtn").removeClass("btn-success")
                    $("#disabledBtn").addClass("btn-danger")
                    $("#disabledBtn").text("Disable Account")
                }else{
                    $("#disabledBtn").removeClass("btn-danger")
                    $("#disabledBtn").addClass("btn-success")
                    $("#disabledBtn").text("Enable Account")
                }
            }
        })
}
