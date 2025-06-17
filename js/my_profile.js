document.getElementById("open_msg_box").addEventListener('click', function() {

	document.getElementById('aboute_me_box').style.pointerEvents ='auto';
    document.getElementById('m_aboute_me_box').style.pointerEvents ='auto'
   	document.getElementById('save_btn').style.display ='flex';
   	document.getElementById('m_save_btn').style.display ='block'

 });
//---------------
document.getElementById("m_open_msg_box").addEventListener('click', function() {

    document.getElementById('aboute_me_box').style.pointerEvents ='auto';
    document.getElementById('m_aboute_me_box').style.pointerEvents ='auto'
    document.getElementById('save_btn').style.display ='flex';
    document.getElementById('m_save_btn').style.display ='block'

 });

/////////////////////////////////////////////////////////////
 
///////////////////////////////////////////////////////////////




function save_edit(){
    document.getElementById('aboute_me_box').style.pointerEvents ='none';
    document.getElementById('m_aboute_me_box').style.pointerEvents ='none'
   	document.getElementById('save_btn').style.display ='none';
   	document.getElementById('m_save_btn').style.display ='none'
    
}




//////////////////
   function syncTextAreas(event) {
            var text1 = document.getElementById("aboute_me_box").value;
            var text2 = document.getElementById("m_aboute_me_box").value;
 
            if (event.target.id === "aboute_me_box" && text1 !== text2) {
                document.getElementById("m_aboute_me_box").value = text1;
            }

             if (event.target.id === "m_aboute_me_box" && text1 !== text2) {
                document.getElementById("aboute_me_box").value = text2;
            }
        }

        document.getElementById("aboute_me_box").addEventListener("input", syncTextAreas);
        document.getElementById("m_aboute_me_box").addEventListener("input", syncTextAreas);


////////////////////////////////////////////////////////////////////////////
function open_form(){
   document.getElementById('upload_form').style.display='flex';
      document.getElementById('overlay').style.display='flex';
}
function close_form(){
   document.getElementById('upload_form').style.display='none';
      document.getElementById('overlay').style.display='none';
}







////////////// Update use image ///////////////////
  $(document).ready(function() {
            $('#update_img').click(function() {
                var fileInput = $('#file')[0];  
                var file = fileInput.files[0];  

                if (!file) {
                    $('#response').html('<p>يرجى اختيار ملف أولاً.</p>');
                    return;
                }

                var formData = new FormData(); 
                formData.append('file', file); 

                $.ajax({
                    url: 'my_profile.php', 
                    type: 'POST',
                    data: formData,
                    contentType: false,  
                    processData: false,  
                    success: function(response) {
                     document.getElementById("file").value="";
                     close_form()
                     window.location.href='my_profile.php';
                         
                    },
                    error: function() {
                        alert("حدث خطأ برفع  الملف")
                    }
                });
            });

        });



  ////////////// Update About me //////////// 
      $(document).ready(function() {
            $('#save_btn').click(function() {
                
                var postData = {
                    about_me: document.getElementById("aboute_me_box").value
                };

                
                $.post('my_profile.php', postData, function(response) {
                     
                    save_edit()
                });
            });
        });
 ///------------- Mobile version -------------------
            $(document).ready(function() {
            $('#m_save_btn').click(function() {
                
                var postData = {
                    about_me: document.getElementById("aboute_me_box").value
                };

                
                $.post('my_profile.php', postData, function(response) {
                     
                    save_edit()
                });
            });
        });