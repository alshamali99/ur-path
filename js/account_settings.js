function open_email_edit() {
   document.getElementById('email_edit').style.display="block";
   document.getElementById("overlay").style.display="block"

}

function open_password_edit() {
   document.getElementById('password_edit').style.display="block";
   document.getElementById("overlay").style.display="block"

}

function open_phone_edit() {
   document.getElementById('phone_edit').style.display="block";
   document.getElementById("overlay").style.display="block"

}

function close_all(){
   document.getElementById('phone_edit').style.display="none";
   document.getElementById('password_edit').style.display="none";
   document.getElementById('email_edit').style.display="none";
}



/*----------------------------------*/
    $(document).ready(function() {
       
      $(document).on('click', '#close_edit_btn', function() {
        $(this).closest('.div_edit').hide(); 
        document.getElementById("overlay").style.display="none"
      });
    });

/********Update*Email**********/
$(document).ready(function () {
   $('#update_email').on('click', function () {
     var e_1 = document.getElementById('e_1').value;
     var e_2 = document.getElementById('e_2').value;
     if (e_1 != e_2) {
       alert("الإيميل غير متطابق");
     }
    
     else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e_1)) {
         alert("الإيميل غير صالح");
     } else {
       
       $.post('account_settings.php', {
         update_email: e_1
       }, function (response) {


         close_all();
         document.getElementById('s_email').style.display="block";
         setTimeout(function () {  window.location.href = "account_settings.php"; }, 3000); 
         
       });
     }
   });
});
/********Update*Password**********/
$(document).ready(function () {
   $('#update_password').on('click', function () {
     var p_1 = document.getElementById('p_1').value;
     var p_2 = document.getElementById('p_2').value;

     
     if (p_1 != p_2) {
       alert(" الرقم السري غير متطابق    ");
     }else {
      
       $.post('account_settings.php', {
         update_pass: p_1
       }, function (response) {
         
         close_all();
         document.getElementById('s_pass').style.display="block";
         setTimeout(function () {  window.location.href = "account_settings.php"; }, 3000); 


       });
     }
   });
});
/********Update*PhoneNumber**********/
$(document).ready(function () {
   $('#update_phone').on('click', function () {
     var n_1 = document.getElementById('n_1').value;
     var n_2 = document.getElementById('n_2').value;
     var number = n_1 + n_2;

     
     if (!n_1 || !n_2) {
       alert("ادخل الرقم مع مفتاح المنطقة");
     } else if (!/^\+?\d{1,3}\d{7,12}$/.test(number)) {
       alert("رقم الهاتف غير صحيح");
     } 
     else {
        
       $.post('account_settings.php', {
         update_phone: number
       }, function (response) {
        
         close_all();
         document.getElementById('s_phone').style.display="block";
         setTimeout(function () {  window.location.href = "account_settings.php"; }, 3000); 


       });
     }
   });
});


 
