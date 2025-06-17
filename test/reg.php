<html dir="rtl">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguide.css" />
    <link rel="stylesheet" href="reg_style.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <title>تسجيل مستخدم جديد</title>
    <style>
      :root {
        --primary-color: #24759f;
        --secondary-color: #f8f9fa;
        --error-color: #dc3545;
        --success-color: #28a745;
        --border-color: #ced4da;
        --text-color: #495057;
        --placeholder-color: #6c757d;
      }
    </style>
  </head>
  <body>
    <?php include 'inc/nav.php'; ?>

    <div class="container">
      <div class="welcome-section">
        <div class='welcome_msg'>خطوتك الأولى إلى تجربة مميزة تبدأ هنا!</div>
      </div>

      <div class="registration-container">
        <div class="service-provider-section">
          <div class="provider-text">
            <p>هل أنت مقدم خدمة؟ <br />ابدأ رحلة النجاح وسجل معنا الآن</p>
          </div>
          <a href='#' class="provider-btn"><div>إنشاء حساب مقدم خدمة</div></a>
        </div>

        <div class="registration-form-container">
          <div class="form-header">
            <img class="header-image" src="images/hand-5.png" />
            <p class="header-text">مرحبًا بك!<br> أنشئ حساب جديد الآن</p>
          </div>

          <div class="name-fields">
            <div class="name-field">
              <label for='f_name'>* الاسم الأول</label>
              <input type='text' id='f_name' name='f_name' placeholder='الاسم الأول'>
            </div>
            <div class="name-field">
              <label for='l_name'>* الاسم الأخير</label>
              <input type='text' id='l_name' name='l_name' placeholder='الاسم الثاني'>
            </div>
          </div>

          <div class="form-section">
            <div class="phone-field">
              <label>* أدخل رقم الهاتف الخاص بك</label>
              <div class="phone-input-group">
                <select id='key_code' class="country-code">
                  <option>اختر مفتاح الدولة</option>
                  <option value="+966">السعودية (+966)</option>
            <option value="+212">المغرب (+212)</option>
            <option value="+258">موزمبيق (+258)</option>
            <option value="+95">ميانمار (بورما) (+95)</option>
            <option value="+264">ناميبيا (+264)</option>
            <option value="+674">ناورو (+674)</option>
            <option value="+977">نيبال (+977)</option>
            <option value="+31">هولندا (+31)</option>
            <option value="+599">نيوي (+599)</option>
            <option value="+687">كاليدونيا الجديدة (+687)</option>
            <option value="+64">نيوزيلندا (+64)</option>
            <option value="+505">نيكاراغوا (+505)</option>
            <option value="+227">النيجر (+227)</option>
            <option value="+234">نيجيريا (+234)</option>
            <option value="+683">جزر نييوي (+683)</option>
            <option value="+672">جزر نورفولك (+672)</option>
            <option value="+47">النرويج (+47)</option>
            <option value="+968">عمان (+968)</option>
            <option value="+92">باكستان (+92)</option>
            <option value="+680">بالاو (+680)</option>
            <option value="+970">فلسطين (+970)</option>
            <option value="+507">بنما (+507)</option>
            <option value="+675">بابوا غينيا الجديدة (+675)</option>
            <option value="+595">باراغواي (+595)</option>
            <option value="+51">بيرو (+51)</option>
            <option value="+63">الفلبين (+63)</option>
            <option value="+48">بولندا (+48)</option>
            <option value="+351">البرتغال (+351)</option>
            <option value="+1">بورتو ريكو (+1)</option>
            <option value="+974">قطر (+974)</option>
            <option value="+262">ريونيون (+262)</option>
            <option value="+40">رومانيا (+40)</option>
            <option value="+7">روسيا (+7)</option>
            <option value="+250">رواندا (+250)</option>
            <option value="+685">ساموا (+685)</option>
            <option value="+378">سان مارينو (+378)</option>
            <option value="+239">ساو تومي وبرينسيب (+239)</option>
           
            <option value="+221">السنغال (+221)</option>
            <option value="+381">صربيا (+381)</option>
            <option value="+248">سيشيل (+248)</option>
            <option value="+232">سيراليون (+232)</option>
            <option value="+65">سنغافورة (+65)</option>
            <option value="+421">سلوفاكيا (+421)</option>
            <option value="+386">سلوفينيا (+386)</option>
            <option value="+677">جزر سليمان (+677)</option>
            <option value="+252">الصومال (+252)</option>
            <option value="+27">جنوب أفريقيا (+27)</option>
            <option value="+34">إسبانيا (+34)</option>
            <option value="+94">سريلانكا (+94)</option>
            <option value="+249">السودان (+249)</option>
            <option value="+597">سورينام (+597)</option>
            <option value="+268">سوازيلاند (+268)</option>
            <option value="+46">السويد (+46)</option>
            <option value="+41">سويسرا (+41)</option>
            <option value="+963">سوريا (+963)</option>
            <option value="+886">تايوان (+886)</option>
            <option value="+992">طاجيكستان (+992)</option>
            <option value="+255">تنزانيا (+255)</option>
            <option value="+66">تايلاند (+66)</option>
            <option value="+228">التوغو (+228)</option>
            <option value="+690">توكيلاو (+690)</option>
            <option value="+676">تونغا (+676)</option>
            <option value="+1">ترينيداد وتوباغو (+1)</option>
            <option value="+216">تونس (+216)</option>
            <option value="+90">تركيا (+90)</option>
            <option value="+993">تركمانستان (+993)</option>
            <option value="+1">ترينيداد وتوباغو (+1)</option>
            <option value="+1">توفالو (+1)</option>
            <option value="+256">أوغندا (+256)</option>
            <option value="+380">أوكرانيا (+380)</option>
            <option value="+971">الإمارات العربية المتحدة (+971)</option>
            <option value="+44">المملكة المتحدة (+44)</option>
            <option value="+1">الولايات المتحدة الأمريكية (+1)</option>
            <option value="+598">أوروغواي (+598)</option>
            <option value="+998">أوزبكستان (+998)</option>
            <option value="+678">فانواتو (+678)</option>
            <option value="+379">الفاتيكان (+379)</option>
            <option value="+58">فنزويلا (+58)</option>
            <option value="+84">فيتنام (+84)</option>
            <option value="+681">واليس وفوتونا (+681)</option>
            <option value="+967">اليمن (+967)</option>
            <option value="+260">زامبيا (+260)</option>
            <option value="+263">زيمبابوي (+263)</option>
                  <!-- بقية خيارات الدول -->
                </select>
                <input type='text' id='phone_number' name='phone_number' placeholder='50xxxxxxx'>
              </div>
            </div>

            <div class="form-field">
              <label>* البريد الإلكتروني</label>
              <input type='text' id='email' name='email' placeholder='البريد الإلكتروني'>
            </div>

            <div class="form-field">
              <label>* تأكيد إدخال البريد الإلكتروني</label>
              <input type='text' id='re-email' name='re-email' placeholder='تأكيد البريد الإلكتروني'>
            </div>

            <div class="form-field">
              <label>* أنشئ رقم سري جديد</label>
              <input type='password' id='password' name='password' placeholder='كلمة المرور'>
            </div>

            <div class="form-field">
              <label>* تأكيد الرقم السري</label>
              <input type='password' id='confirm-password' name='confirm-password' placeholder='تأكيد كلمة المرور'>
              <div id="errorMessage"></div>
            </div>

            <button class="submit-btn" id='reg'>إنشاء حساب</button>

            <div class="login-link">
              <p>لديك حساب بالفعل؟ <a href='#'>اضغط هنا</a> لتسجيل الدخول</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'inc/footer.php'; ?>

    <script src='js/reg.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>