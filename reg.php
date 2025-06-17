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
    <link rel="stylesheet" href="assets/reg_style.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />
    
    <!-- خط Cairo من جوجل -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700&display=swap"
      rel="stylesheet"
    />
    
    <title>تسجيل مستخدم جديد</title>
  </head>

  <body>
    <?php include 'inc/nav.php'; ?>

    <br /><br /><br />

    <!-- العنوان الرئيسي -->
    <center>
      <div class="welcome_msg">
        خطوتك الأولى إلى تجربة مميزة تبدأ هنا!
      </div>
    </center>

    <!-- الحاوية الرئيسية للنموذج -->
    <div class="registration-wrapper">
      <div class="content-columns">

        <!-- العمود الأيسر: نموذج التسجيل -->
        <div class="left-column">
          <form class="registration-form-container">
            <!-- الصورة والنص الترحيبي -->
            <div class="side-image-container">
              <div class="image-box">
                <img
                  class="hand-image"
                  src="images/hand-5.png"
                  alt="رمز يد ترحيبية"
                />
              </div>
              <p class="side-text">
                مرحبًا بك!<br />
                أنشئ حساب جديد الآن
              </p>
            </div>

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

            <!-- مفتاح الدولة + رقم الجوال -->
            <div class="phone-row">
              <div class="phone-select">
                <label for="key_code">مفتاح الدولة</label>
                <select
                  id="key_code"
                  name="key_code"
                  class="CONTRY-KEY"
                  required
                >
                  <option value="">اختر مفتاح الدولة</option>
                  <option value="+966">السعودية (+966)</option>
                  <option value="+212">المغرب (+212)</option>
                  <!-- … بقية الخيارات … -->
                </select>
              </div>
              <div class="phone-input">
                <label for="phone_number">
                  رقم الجوال <span class="required">*</span>
                </label>
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
            <label for="re-email">
              تأكيد البريد الإلكتروني <span class="required">*</span>
            </label>
            <input
              type="email"
              id="re-email"
              name="re-email"
              class="form-input"
              placeholder="تأكيد البريد الإلكتروني"
              required
            />

            <!-- كلمة المرور -->
            <label for="password">
              أنشئ رقم سري جديد <span class="required">*</span>
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
            <label for="confirm-password">
              تأكيد الرقم السري <span class="required">*</span>
            </label>
            <input
              type="password"
              id="confirm-password"
              name="confirm-password"
              class="form-input"
              placeholder="••••••••"
              required
            />

            <!-- رسالة الخطأ -->
            <div id="errorMessage" class="error-message"></div>

            <!-- زر إنشاء الحساب -->
            <button type="button" id="reg" class="submit-btn">
              إنشاء حساب
            </button>

            <!-- رابط تسجيل الدخول -->
            <div class="login-link">
              <span>لديك حساب بالفعل؟</span>
              <a href="login.php"><span class="link-text">اضغط هنا</span></a>
              <span>لتسجيل الدخول</span>
            </div>
          </form>
        </div>

        <!-- العمود الأيمن: صندوق “مقدم الخدمة” -->
        <div class="right-column">
          <div class="service-provider-box">
            <h3>هل أنت مقدم خدمة؟</h3>
            <p>ابدأ رحلة النجاح وسجل معنا الآن</p>
            <a href="reg_p.php">
              <button class="provider-btn">إنشاء حساب مقدم خدمة</button>
            </a>
          </div>
        </div>

      </div>
    </div>

    <br /><br />

    <?php include 'inc/footer.php'; ?>

    <!-- أولاً: jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ثم: سكربت التحقق والإرسال AJAX -->
    <script src="js/reg.js"></script>
  </body>
</html>
