<style>
    body.dimmer {
  background-color: rgba(0, 0, 0, 0.5);
  transition: background-color 0.3s ease;
}

.modal {
  display: none; /* المودال مخفي بشكل افتراضي */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.3); /* خلفية مظلمة */
  z-index: 1000; /* تأكد من أن المودال فوق المحتوى */
  justify-content: center;
  align-items: center;
}

</style>


<div class="screen-nav">
      <div class="frame-nav">
        <div class="untitled-wrapper-nav"><img class="untitled-nav" src="https://ur-path.com/images/untitled-1-01-2.png" /></div>
        <div class="view-nav">
          <div class="div-nav">
<!-- mobile-navbar-btr  -->
          <div class='nav_bar_m_div'><i class="fas fa-bars" id="nav_bar_mobile-btn" onclick="sidebar_func()"></i></div>


          <table class='nav_tb'>
          <tr>
              <td id='rprt1' class='after_login_btn'> <font class='after_login_btn_text'> البلاغات والدعم  </font>  </td>
              <td id='search1' class='after_login_btn'> <font class='after_login_btn_text'> البحث  </font>  </td>
              <td id='wrk1' class='after_login_btn'> <font class='after_login_btn_text'> إدارة الإعمال  </font>  </td>
              <td class='after_login_btn'> <font class='after_login_btn_text'>   البريد الوارد  </font>  </td>
              <td id='prf1' class='after_login_btn'> <font class='after_login_btn_text'> الملف الشخصي</font>  </td>
              <td class='after_login_btn'> <font class='after_login_btn_text'> الرئيسية</font>  </td>

          </tr>

          <tr>
              <td id='rprt2' class='after_login_btn'> <font class='after_login_btn_text'> انشاء بلاغ      </font>  </td>
              <td id='search2' class='after_login_btn'> <font class='after_login_btn_text'> بحث الطلبات  </font>  </td>
              <td id='wrk2'  class='after_login_btn'> <font class='after_login_btn_text'> اعمال جديدة    </font>  </td>
              <td></td>
              <td id='prf2' class='after_login_btn'> <a href='my_profile.php'><font class='after_login_btn_text'> عرض البروفايل  </font>  </td> 
              <td></a></td> 

          </tr>



          <tr>
              <td id='rprt3' class='after_login_btn'> <font class='after_login_btn_text'> بلاغات منشأة      </font>  </td>
              <td id='search3' class='after_login_btn'> <font class='after_login_btn_text'> بحث الفواتير  </font>  </td>
              <td id='wrk3' class='after_login_btn'> <font class='after_login_btn_text'> اعمال  قائمة    </font>  </td>
              <td></td>
              <td id='prf3' class='after_login_btn'> <a href='account_settings.php'> <font class='after_login_btn_text'> الحساب الشخصي    </font> </a> </td>
              <td></td>

          </tr>

          <tr>
              <td id='rprt4' class='after_login_btn'> <font class='after_login_btn_text'> بلاغات واردة      </font>  </td>
              <td>  </td>
              <td id='wrk4' class='after_login_btn'> <font class='after_login_btn_text'> اعمال مكتملة    </font>  </td>
              <td></td>
              <td>   </td>
              <td></td>

          </tr>



          <tr>
              <td>   </td>
              <td>  </td>
              <td id='wrk5' class='after_login_btn'> <font class='after_login_btn_text'> اعمال منتهية    </font>  </td>
              <td></td>
              <td>   </td>
              <td></td>

          </tr>


          <tr>
              <td></td>
              <td>  </td>
              <td> </td>
              <td></td>
              <td>   </td>
              <td></td>

          </tr>

          


          </table>  
        
        </div>
        </div>
      </div>
    </div>
    <script>
function toggleVisibility(groupToShow) {
    let allGroups = ["prf2", "prf3", "prf4", "wrk2", "wrk3", "wrk4", "wrk5", "search2", "search3", "rprt2", "rprt3", "rprt4"];

    // Hide all first
    allGroups.forEach(id => {
        let element = document.getElementById(id);
        if (element) {
            element.style.visibility = "hidden";
        }
    });

    // Show the selected
    groupToShow.forEach(id => {
        let element = document.getElementById(id);
        if (element) {
            element.style.visibility = "visible";
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    let prf1 = document.getElementById("prf1");
    let wrk1 = document.getElementById("wrk1");
    let search1 = document.getElementById("search1");
    let rprt1 = document.getElementById("rprt1");

    if (prf1) {
        prf1.addEventListener("click", function (e) {
            e.stopPropagation();
            toggleVisibility(["prf2", "prf3", "prf4"]);
        });
    }

    if (wrk1) {
        wrk1.addEventListener("click", function (e) {
            e.stopPropagation();
            toggleVisibility(["wrk2", "wrk3", "wrk4", "wrk5"]);
        });
    }

    if (search1) {
        search1.addEventListener("click", function (e) {
            e.stopPropagation();
            toggleVisibility(["search2", "search3"]);
        });
    }

    if (rprt1) {
        rprt1.addEventListener("click", function (e) {
            e.stopPropagation();
            toggleVisibility(["rprt2", "rprt3", "rprt4"]);
        });
    }

    // Hide all when clicking outside elements that have className including "1"
    document.addEventListener("click", function (event) {
        let clickedInsideClass1 = event.target.closest('[class*="1"]');
        if (!clickedInsideClass1) {
            // إذا لم يكن العنصر داخل عنصر يحمل كلاس يحتوي على "1"
            toggleVisibility([]); // هذا سيخفي كل العناصر لأن القائمة فارغة
        }
    });
});
 


function sidebar_func() {
  const el = document.getElementById("sidebar");
  const isHidden = (el.style.display === "none" || el.style.display === "");

  //   Show,Hide Sidebar
  el.style.display = isHidden ? "block" : "none";

  // check overlay
  let overlay = document.getElementById("overlay");

  if (isHidden) {
    //If showing sidebar => show overlay
    if (!overlay) {
      overlay = document.createElement("div");
      overlay.id = "overlay";
      overlay.style.position = "fixed";
      overlay.style.top = 0;
      overlay.style.left = 0;
      overlay.style.width = "100%";
      overlay.style.height = "100%";
      overlay.style.background = "rgba(0,0,0,0.5)";
      overlay.style.zIndex = 4;
      overlay.onclick = sidebar_func; // hide sidebar
      document.body.appendChild(overlay);
    }
  } else {
    // DelettingOverLay
    if (overlay) overlay.remove();
  }
}







 
      
</script>

 