document.getElementById("login_btn").addEventListener("click", function(event) {
    
    let errorMessage = document.getElementById("errorMessage");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    //////////// Email check //////////////////
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    function validateEmail(email) {
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
        if (!emailPattern.test(email) ) {
            document.getElementById('errorMessage').innerHTML="يرحى كتابة الايميل بطريقة صحيحة"
        } 
    
         
    }
    let e1 = document.getElementById("email").value;
    
    let result = validateEmail(e1);
    //alert(result);

  ////////////  If Email or password Empty ////////////
   if (password.value =="" || email.value=="") {
        document.getElementById("errorMessage").innerHTML="يرجى تعبئة جميع الحقول "
    }

////////////// التحقق من تطابق كلمة المرور والبريد الإلكتروني
    // التحقق قبل ارسال الطلب 
    if(password.value !="" && email.value !="" && emailPattern.test(e1) ){
        
        $.ajax({
            url: "u_login_reg/login_jobs.php",  
            type: "POST",
            data: {
                email: email.value,
                password:password.value
            },
            success: function(response,textStatus,jqXhr) {
                if(response.trim()=='no_email'){
                     document.getElementById('errorMessage').innerHTML="هذا الايميل غير مسجل";
                }
                 if(response.trim()=='wrong_password'){
                     document.getElementById('errorMessage').innerHTML="كلمة المرور خاطئة";
                }
                 if(response.trim()!="no_email" && response.trim() !="wrong_password" ){
                   document.body.innerHTML=response;
                   setTimeout(() => {
                    window.location.href='home.php';
                  }, 3000);
                 }
                 
                 //document.getElementById('login_done').innerHTML=response; 
                     
               
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }

        });  // End of request Func
        
        } // End of if -> request

});
 

//////////////////////////////////////////////////////////
 