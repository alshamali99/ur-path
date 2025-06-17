 





    <div class="sidebar" id='sidebar'>
        <div class="menu-item" onclick="toggleMenu(this)">
             <div id='home_btn'><img class='img-1' id='mobile_nav_logged_one' src="../images/op_home.png"></div>
             
             <div class="circle"><img class='img-1'  id='mobile_nav_logged' src="../images/op_home.png"></div>
             <div class="options">   
       
          </div></div>
    
      
        <div class="menu-item" onclick="toggleMenu(this)">
            <div id='user_profile'><img class='img-1'  id='mobile_nav_logged_one' src="../images/peersonal.png"></div> 
              <div class="circle"><img class='img-1'  id='mobile_nav_logged' src="../images/peersonal.png"></div>
              <div class="options">
              <a href="my_profile.php"><div class='second_option'>    عرض البروفايل</div></a>
             <a href='account_settings.php'> <div class='second_option'> خيارات الحساب   </div> </a>
              <div class='second_option'>  المعلومات البنكية  </div>
              </div></div>
       
        
        
        
    <div class="menu-item" onclick="toggleMenu(this)"> 
         <div id='user_mail'>   <img class='img-1'  id='mobile_nav_logged_one' src="../images/emmail.png"></div>
            
            <div class="circle"><img class='img-1'  id='mobile_nav_logged' src="../images/emmail.png"></div>
            <div class="options"> 
      
            </div></div>

      
        <div class="menu-item" onclick="toggleMenu(this)">
           <div id='user_work'>  <img id='mobile_nav_logged_one' src="../images/woork.png"> </div>
             <div class="circle"><img id='mobile_nav_logged' src="../images/woork.png"></div>
             <div class="options">
             <div class='second_option'>  أعمال جديدة  </div>
             <div class='second_option'>   أعمال قائمة </div>
             <div class='second_option'>   أعمال مكتملة </div>
             <div class='second_option'>   أعمال منتهية </div>

             </div>
            
            </div>
      

        <div class="menu-item" onclick="toggleMenu(this)">
            <div id='user_search'> <img id='mobile_nav_logged_one' src="../images/seearch.png"></div>
             <div class="circle"><img id='mobile_nav_logged' src="../images/seearch.png"></div>
             <div class="options">   
             <div class='second_option'>  بحث الفواتير  </div>
             <div class='second_option'>   بحث الطلبات </div>
             </div>
            </div>
      
       
        <div class="menu-item" onclick="toggleMenu(this)">
            <div id='user_support'> <img id='mobile_nav_logged_one' src="../images/suuuport.png"></div>
             <div class="circle"><img id='mobile_nav_logged' src="../images/suuuport.png"></div>
             <div class="options">  
             <div class='second_option'>  إنشاء بلاغ  </div>   
             <div class='second_option'>   بلاغات منشأة </div>
             <div class='second_option'>  بلاغات واردة  </div>


             </div>
            </div>
</div>
    <script>


 


function toggleMenu(element) {
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');   
            });
            element.classList.add('active');
            }


            const buttons = document.querySelectorAll("#home_btn, #user_profile, #user_mail, #user_work, #user_search, #user_support");
const images = {
    home_btn: "../images/op_home.png",
    user_profile: "../images/peersonal.png",
    user_mail: "../images/emmail.png",
    user_work: "../images/woork.png",
    user_search: "../images/seearch.png",
    user_support: "../images/suuuport.png"
};

const labels = {
    home_btn: "الرئيسية",
    user_profile: "البروفايل",
    user_mail: "&nbsp;&nbsp;&nbsp; البريد &nbsp;&nbsp;&nbsp;  ",
    user_work: "الأعمال",
    user_search: "البحـث",
    user_support: "الدعـم"
};

buttons.forEach(button => {
    button.addEventListener("click", function() {
        buttons.forEach(btn => {
            btn.innerHTML = `<img class='img-1' src='${images[btn.id]}'>`;
        });
        this.innerHTML = labels[this.id]; // Chaange Text
    });
});

 

    </script> 