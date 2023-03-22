let leftCardHeight = $(".getHeight").outerHeight()
$(".feedback-img").css("height", leftCardHeight + "px");


$("#sendMsg").click(()=>{

    var fname = $("#fullname").val()
    var email = $("#email").val()
    var subject = $("#subject").val()
    var message = $("#feedback").val()

    if(fname=="" || email=="" || subject=="" || message==""){

        if(fname==""){
            var fname = $("#fullname").css('outline','1px solid red')
        }if(email==""){
            var email = $("#email").css('outline','1px solid red')
        }if(subject==""){
            var subject = $("#subject").css('outline','1px solid red')
        }if(message==""){
            var message = $("#feedback").css('outline','1px solid red')
        }


        $("#alertMsg2").css('display','block')
        $("#alertMsg2").addClass('alert-danger')
        $("#alertMsg2").text('Cannot Leave Any Field Blank')

        setTimeout(() => {
            $("#fullname,#email,#subject,#feedback").css('outline','1px solid transparent')
            $("#alertMsg2").css('display','none')
            $("#alertMsg2").removeClass('alert-danger')
            $("#alertMsg2").text('')
        }, 3000);

    }else{

        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(regex.test(email)){



        $.ajax({
            url: "/submit-feedback",
            // dataType: "json",
            type: "Post",
            data: {
                '_token': $('input:hidden[name="_token"]').val(),
                'name':$('#fullname').val(),
                'email':$('#email').val(),
                'feedback':$('#feedback').val()
             },
            success: function () {
                $("#alertMsg2").css('display','block')
                $("#alertMsg2").addClass('alert-success')
                $("#alertMsg2").text('Your feedback has been submitted successfully')
                $("#fullname, #email, #subject, #feedback").val('')
            },
        });


        setTimeout(() => {
            $("#fullname,#email,#subject,#feedback").css('outline','1px solid transparent')
            $("#alertMsg2").css('display','none')
            $("#alertMsg2").removeClass('alert-success')
            $("#alertMsg2").text('')
        }, 3000);





        }else{
            var email = $("#email").css('outline','1px solid red')


            $("#alertMsg2").css('display','block')
            $("#alertMsg2").addClass('alert-danger')
            $("#alertMsg2").text('Please Enter a valid Email Address')
            $("#email").text('')

            setTimeout(() => {
                $("#email").css('outline','1px solid transparent')
                $("#alertMsg2").css('display','none')
                $("#alertMsg2").removeClass('alert-danger')
                $("#alertMsg2").text('')
            }, 3000);

        }
    }

})
