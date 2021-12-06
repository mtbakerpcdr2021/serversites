$(document).ready(function(){

    $('.btntop').click(function(e){
        e.preventDefault();
        $("html, body").animate({
            scrollTop: $($(this).attr('href')).offset().top - 0
        }, 500);
    });



    $('#contactformonindex').submit(function(e){
        
        e.preventDefault();
        
        if(get_action(e)){
          var name=$("input[name=name]").val();
          var email=$("input[name=email]").val();
          var msg = $('textarea#msg').val();
          if(name=="" || email=="" || msg==""){
              swal("Error", "All Fields are Required!", "error");
          }else{
              $.ajax({
                    url:"assets/ajax.php",
                    method:"post",
                    data:{contactmsg:"contactmsg",name:name,email:email,msg:msg},
                    success:function(data){
                      if(data=="yes"){
                          
                          swal("Done", "We've Received your Message!", "success");
                          $("input[name=name]").val("");
                          $("input[name=email]").val("");
                          $('textarea#msg').val("");
                          grecaptcha.reset();
                      }else{
                           swal("Error", "Try Later!", "error");
                      }
                      // alert(data);
                  }
              });//ajax 
          }

        }else{
          swal("Error", "Captcha Failed, try again!", "error");
        }
        
    });

    $('#subscribeBtn').click(function(e){
        
        e.preventDefault();
        
        var email=$("input[name=subEmail]").val();
        
        if(email==""){
            swal("Error", "Email Field is Required!", "error");
        }else{
            $.ajax({
                  url:"assets/ajax.php",
                  method:"post",
                  data:{subscription:"subscription",email:email},
                  success:function(data){
                    if(data=="yes"){
                        
                        swal("Done", "We've Received your Email!", "success");
                    }else{
                         swal("Error", "Try Later!", "error");
                    }
                    // alert(data);
                }
            });//ajax 
        }
    });

    $('#commentBtn').click(function(e){
        
        e.preventDefault();
        var name=$("input[name=commentName]").val();
        var email=$("input[name=commentEmail]").val();
        var msg = $('textarea#commentMsg').val();
        
        if(name=="" || email=="" || msg==""){
            swal("Error", "All Fields are Required!", "error");
        }else{
            $.ajax({
                  url:"assets/ajax.php",
                  method:"post",
                  data:{commentBtn:"commentBtn",name:name,email:email,msg:msg},
                  success:function(data){
                    if(data=="yes"){
                        
                        swal("Done", "We've Received your Comment!", "success");
                    }else{
                         swal("Error", "Try Later!", "error");
                    }
                    // alert(data);
                }
            });//ajax 
        }
    });//click

    $('#arabicWhitePaperClick').click(function(e){
      e.preventDefault();
      
      swal("250 FTS Coin Bounty For Anyone who translate White Paper Into Arabic!");

    });
});//docuemnt ready
function get_action(form) 
{
    var v = grecaptcha.getResponse();
    if(v.length == 0)
    {
        // document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
        // alert('false');
        return false;
    }
    else
    {
         // document.getElementById('captcha').innerHTML="Captcha completed";
         // alert('true');
        return true; 
    }
}