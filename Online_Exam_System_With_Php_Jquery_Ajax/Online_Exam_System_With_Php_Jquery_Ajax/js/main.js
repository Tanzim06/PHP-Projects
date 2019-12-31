$(function(){
    //for user registration
    
    $("#regsubmit").click(function(){// here it is saying that this function will work only when there will be a click on"sign-up" button who's id is"regsubmit".
        var name= $("#name").val();
        var username= $("#username").val();    //we are catching the input value of the fields in "register.php" by these line from 3 to 6
        var password= $("#password").val();
        var email= $("#email").val();
        var dataString='name='+name+'&username='+username+'&password='+password+'&email='+email;
        $.ajax({
            type:'POST',// defining the method type of transfering the data to the atrget page "getregister.php"
            url:'getregister.php',// defining that where we are sending the data.
            data: dataString,// defining what data we are sending to the target page.
            success:function(data){//defining that when all work of the function have done then what finishing will it give
                $("#state").html(data);//
            }
        });
        return false;
    });
       
       //for userlogin
       $("#loginsubmit").click(function(){// here it is saying that this function will work only when there will be a click on "Login" button who's id is"regsubmit".
        var email= $("#email").val();
        var password= $("#password").val();
        var dataString='email='+email+'&password='+password;
        $.ajax({
            type:'POST',// defining the method type of transfering the data to the atrget page "getregister.php"
            url:'getlogin.php',// defining that where we are sending the data.
            data: dataString,// defining what data we are sending to the target page.
            success:function(data){//defining that when all work of the function have done then what finishing will it give
                if($.trim(data) == "empty"){
                    $(".empty").show();
                    setTimeout(function(){
                        $(".empty").fadeOut();
                    },4000);
                }else if($.trim(data) == "disable"){
                    $(".disable").show();
                    setTimeout(function(){
                        $(".disable").fadeOut();
                    },4000);
                }else if($.trim(data) == "error"){
                    $(".error").show();
                    setTimeout(function(){
                        $(".error").fadeOut();
                    },4000);
                }else{
                    window.location="Exam.php";
                }
            }
        });
        return false;
    });
});