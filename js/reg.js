// reg.js

// 1) نختار الفورم مرة واحدة
const form = document.querySelector('.registration-form-container');

// 2) نربط المستمع على زر "reg"
document.getElementById("reg").addEventListener("click", function(event) {

  // ===== HTML5 built-in validation =====
  if (!form.checkValidity()) {
    // نلوّن كل حقل غير صالح بالأحمر
    form.querySelectorAll('input:invalid, select:invalid').forEach(el => {
      el.style.borderColor = 'red';
    });
    form.reportValidity();
    return; // نوقف السكربت لو فيه خطأ
  }

  // ===== إذا اجتاز التحقق، نتابع باقي الكود =====
  let errorMessage     = document.getElementById("errorMessage");
  let f_name           = document.getElementById("f_name");
  let l_name           = document.getElementById("l_name");
  let key_code         = document.getElementById("key_code");
  let phone_number     = document.getElementById("phone_number");
  let email            = document.getElementById("email");
  let confirm_email    = document.getElementById("re-email");
  let password         = document.getElementById("password");
  let confirm_password = document.getElementById("confirm-password");

  // ===== Email & Password match checks =====
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // مطابقة البريد
  if (!emailPattern.test(email.value) || !emailPattern.test(confirm_email.value)) {
    alert("البريد الإلكتروني غير صالح");
    email.style.borderColor = confirm_email.style.borderColor = 'red';
    return;
  }
  if (email.value !== confirm_email.value) {
    errorMessage.innerText = "* تأكد من تطابق البريد الإلكتروني *";
    errorMessage.style.color = "red";
    email.style.borderColor = confirm_email.style.borderColor = 'orange';
    return;
  }

  // مطابقة كلمة المرور
  if (password.value !== confirm_password.value) {
    errorMessage.innerText = "* تأكد من تطابق كلمات المرور *";
    errorMessage.style.color = "red";
    password.style.borderColor = confirm_password.style.borderColor = 'orange';
    return;
  }

  // إذا كل شيء تمام، نُعيد تلوين الحدود بالخضراء
  [email, confirm_email, password, confirm_password].forEach(el => {
    el.style.borderColor = 'green';
  });

  // ===== AJAX Submission =====
  $.ajax({
    url: "u_login_reg/reg_jobs.php",
    type: "POST",
    data: {
      f_name: f_name.value,
      l_name: l_name.value,
      key_code: key_code.value,
      phone_number: phone_number.value,
      email: email.value,
      confirm_email: confirm_email.value,
      password: password.value
    },
    success(response) {
      const res = response.trim();
      if (res === 'error_email') {
        alert("هذا الايميل مستخدم");
      } else if (res === 'error_number') {
        alert("هذا الرقم مستخدم");
      } else {
        document.body.innerHTML = response;
      }
    },
    error(xhr, status, error) {
      console.error("Error:", error);
    }
  });

});
