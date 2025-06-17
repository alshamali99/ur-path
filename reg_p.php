<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ملفات التنسيقات الأساسية -->
    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguide.css" />
    <link rel="stylesheet" href="assets/reg_p_style.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />

    <!-- خط Cairo من جوجل -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700&display=swap"
      rel="stylesheet"
    />

    <title>تسجيل مقدم خدمة جديد</title>
  </head>

  <body>
    <?php include 'inc/nav.php'; ?>

    <br /><br /><br />
    <center>
      <div class="welcome_msg">
        كل دقيقة تؤخرها هي فرصة قد تفوتها،<br /><br />
        فاستثمر وقتك وابدأ رحلة الربح والنجاح اليوم!
      </div>
    </center>

    <div class="registration-wrapper">
      <div class="content-columns">
        <div class="left-column">
          <!-- Note: نترك action/method لتعريف الغرض لكن الزرّ صار من نوع button -->
          <form class="registration-form-container">
            <!-- ... بقية الحقول كما هي تماماً ... -->

            <!-- مثال على حقول من ضمنها (الأسم الأول والأخير، الهاتف، البريد الإلكتروني...) -->

            <!-- الاسم الأول -->
            <label for="f_name">
              الاسم الأول <span class="required">*</span>
            </label>
            <input
              type="text"
              id="f_name"
              name="f_name"
              class="form-input"
              placeholder="الاسم الأول"
              pattern="^[A-Za-z]+$"
              title="يرجى إدخال حروف إنجليزية فقط (A–Z, a–z)"
              required
            />

            <!-- الاسم الأخير -->
            <label for="l_name">
              الاسم الأخير <span class="required">*</span>
            </label>
            <input
              type="text"
              id="l_name"
              name="l_name"
              class="form-input"
              placeholder="الاسم الأخير"
              pattern="^[A-Za-z]+$"
              title="يرجى إدخال حروف إنجليزية فقط (A–Z, a–z)"
              required
            />

            <!-- رقم الجوال -->
            <label for="phone_number">
              رقم الجوال <span class="required">*</span>
            </label>
            <div class="phone-row">
              <div class="phone-select">
                <select id="key_code" name="key_code" class="CONTRY-KEY" required>
                  <!-- خيارات مفتاح الدولة -->
                  <option value="">اختر مفتاح الدولة</option>
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

      
                </select>
              </div>
              <div class="phone-input">
                <input
                  type="text"
                  id="phone_number"
                  name="phone_number"
                  class="form-input"
                  placeholder="50xxxxxxx"
                  required
                />
              </div>
            </div>

            <!-- البريد الإلكتروني -->
            <label for="email">
              البريد الإلكتروني <span class="required">*</span>
            </label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-input"
              placeholder="البريد الإلكتروني"
              required
            />

            <!-- تأكيد البريد الإلكتروني -->
            <label for="confirm_email">
              تأكيد البريد الإلكتروني <span class="required">*</span>
            </label>
            <input
              type="email"
              id="confirm_email"
              name="confirm_email"
              class="form-input"
              placeholder="تأكيد البريد الإلكتروني"
              required
            />

            <!-- كلمة المرور -->
            <label for="password">
              أنشئ كلمة مرور <span class="required">*</span>
            </label>
            <input
              type="password"
              id="password"
              name="password"
              class="form-input"
              placeholder="••••••••"
              required
            />

            <!-- تأكيد كلمة المرور -->
            <label for="confirm_password">
              تأكيد كلمة المرور <span class="required">*</span>
            </label>
            <input
              type="password"
              id="confirm_password"
              name="confirm_password"
              class="form-input"
              placeholder="••••••••"
              required
            />

            <!-- IBAN الحساب البنكي -->
            <label for="bank_account">
              أدخل حسابك البنكي بصيغة IBAN <span class="required">*</span>
            </label>
            <input
              type="text"
              id="bank_account"
              name="bank_account"
              class="form-input"
              placeholder="IBAN"
              pattern="[A-Za-z]{2}[0-9]{2}[A-Za-z0-9]{1,30}"
              title="يرجى إدخال حروف إنجليزية أو أرقام فقط (A–Z, a–z , 1-9)"
              required
            />

            <!-- تأكيد IBAN -->
            <label for="confirm_bank_account">
              أعد إدخال حسابك البنكي بصيغة IBAN <span class="required">*</span>
            </label>
            <input
              type="text"
              id="confirm_bank_account"
              name="confirm_bank_account"
              class="form-input"
              placeholder="Confirm IBAN"
              pattern="[A-Za-z]{2}[0-9]{2}[A-Za-z0-9]{1,30}"
              title="يرجى إدخال حروف إنجليزية أو أرقام فقط (A–Z, a–z , 1-9)"
              required
            />

            <!-- اسم البنك -->
            <label for="bank_name">
              أدخل اسم البنك الذي تتعامل معه <span class="required">*</span>
            </label>
            <input
              type="text"
              id="bank_name"
              name="bank_name"
              class="form-input"
              placeholder="Bank Name"
              required
            />

            <!-- SWIFT الكود -->
            <label for="swift">
              أدخل SWIFT كود الخاص بحسابك البنكي <span class="required">*</span>
            </label>
            <input
              type="text"
              id="swift"
              name="swift"
              class="form-input"
              placeholder="SWIFT"
              pattern="[A-Za-z]{2}[0-9]{2}[A-Za-z0-9]{1,30}"
              title="يرجى إدخال حروف إنجليزية أو أرقام فقط (A–Z, a–z , 1-9)"

              required
            />

            <!-- رسالة الخطأ -->
            <div id="errorMessage" class="error-message"></div>
            <div id="bank_msg" class="error-message"></div>

            <!-- **هنا التعديل الأساسي:**
                 نغيير type إلى button وإضافة id حتى يستمع له reg_p.js -->
            <button type="button" id="reg_p" class="submit-btn">
              إنشاء حساب
            </button>

            <!-- رابط تسجيل الدخول -->
            <div class="login-link">
              <span>لديك حساب بالفعل؟</span>
              <a href="login.php">
                <span class="link-text">اضغط هنا</span>
              </a>
              <span>لتسجيل الدخول</span>
            </div>
          </form>
        </div>
      </div>
    </div>

    <br /><br />

    <?php include 'inc/footer.php'; ?>

    <!-- أولاً: نحمّل jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ثم: سكربت التحقق والإرسال AJAX -->
    <script src="js/reg_p.js"></script>
  </body>
</html>
