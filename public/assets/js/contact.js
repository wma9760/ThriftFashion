$("#sendMsg").click(()=>{

    var fname = $("#fullname").val()
    var email = $("#email").val()
    var subject = $("#subject").val()
    var message = $("#msg").val()

    if(fname=="" || email=="" || subject=="" || message==""){

        if(fname==""){
            var fname = $("#fullname").css('outline','1px solid red')
        }if(email==""){
            var email = $("#email").css('outline','1px solid red')
        }if(subject==""){
            var subject = $("#subject").css('outline','1px solid red')
        }if(message==""){
            var message = $("#msg").css('outline','1px solid red')
        }


        $("#alertMsg2").css('display','block')
        $("#alertMsg2").addClass('alert-danger')
        $("#alertMsg2").text('Cannot Leave Any Field Blank')

        setTimeout(() => {
            $("#fullname,#email,#subject,#msg").css('outline','1px solid transparent')
            $("#alertMsg2").css('display','none')
            $("#alertMsg2").removeClass('alert-danger')
            $("#alertMsg2").text('')
        }, 3000);

    }else{

        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(regex.test(email)){

            $("#sendMsg").text('Sending...')

            $("#sendMsg").css({
                "filter":"brightness(50%)",
                "pointer-events":"none",
            })

            $.ajax({
                type: "POST",
                url: "/submit-contact",
                data: {
                    '_token': $('input:hidden[name="_token"]').val(),
                    'fullname':$('#fullname').val(),
                    'email':$('#email').val(),
                    'subject':$('#subject').val(),
                    'message':$('#msg').val()
                 },

                success: function () {
                    $("#alertMsg2").css('display','block')
                    $("#alertMsg2").addClass('alert-success')
                    $("#alertMsg2").text('Your Message has been sent successfully')
                    $("#fullname, #email, #subject, #msg").val('')
                    $("#sendMsg").text('Sent')

                    $("#sendMsg").css({
                        "filter":"brightness(100%)",
                        "pointer-events":"all",
                    })

                    setTimeout(() => {
                        $("#fullname,#email,#subject,#msg").css('outline','1px solid transparent')
                        $("#alertMsg2").css('display','none')
                        $("#alertMsg2").removeClass('alert-success')
                        $("#alertMsg2").text('')
                        $("#sendMsg").text('Send Message')
                    }, 3000);
                }
            });






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
