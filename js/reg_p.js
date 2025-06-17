// reg_p.js

// 1) نختار الفورم مرة واحدة
const form = document.querySelector('.registration-form-container');

// 2) نربط المستمع على زر إنشاء الحساب
document.getElementById("reg_p").addEventListener("click", function(event) {

  // ===== HTML5 built-in validation =====
  if (!form.checkValidity()) {
form.querySelectorAll('input:invalid, select:invalid').forEach(el => {
    el.style.borderColor = 'red';
  });
    // يعرض رسائل الخطأ للحقول الناقصة أو التي لم تطابق الـpattern
    form.reportValidity();
    return; // يوقف تنفيذ السكربت إذا كان هناك خطأ
  }

  // ===== إذا اجتاز التحقق، نتابع باقي الكود =====
  let errorMessage          = document.getElementById("errorMessage");
  let bankMsg               = document.getElementById("bank_msg");
  let f_name                = document.getElementById("f_name");
  let l_name                = document.getElementById("l_name");
  let phone_number          = document.getElementById("phone_number");
  let key_code              = document.getElementById("key_code");
  let email                 = document.getElementById("email");
  let confirm_email         = document.getElementById("confirm_email");
  let password              = document.getElementById("password");
  let confirm_password      = document.getElementById("confirm_password");
  let bank_account          = document.getElementById("bank_account");
  let confirm_bank_account  = document.getElementById("confirm_bank_account");
  let bank_name             = document.getElementById("bank_name");
  let swift                 = document.getElementById("swift");

  // ===== Email check =====
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  function validateEmail(e1, e2) {
    if (!emailPattern.test(e1) || !emailPattern.test(e2)) {
      alert("البريد الإلكتروني غير صالح");
      return false;
    } else if (e1 !== e2) {
      alert("البريد الإلكتروني لا يتطابق");
      return false;
    }
    return true;
  }
  const e1 = email.value;
  const e2 = confirm_email.value;
  if (!validateEmail(e1, e2)) {
    return; // أوقف التنفيذ إذا الإيميل غير صالح أو غير مطابق
  }

  // ===== تلوين الحدود حسب ملء الحقول =====
  [f_name, l_name, phone_number, bank_account, confirm_bank_account, bank_name, swift].forEach(el => {
    if (el.value) el.style.borderColor = 'green';
  });

  // required fields
  if (!f_name.value)               f_name.style.borderColor = 'red';
  if (!l_name.value)               l_name.style.borderColor = 'red';
  if (!phone_number.value)         phone_number.style.borderColor = 'red';
  if (key_code.value === "")       key_code.style.borderColor = 'red';
  if (!email.value)                email.style.borderColor = 'red';
  if (!confirm_email.value)        confirm_email.style.borderColor = 'red';
  if (!password.value)             password.style.borderColor = 'red';
  if (!confirm_password.value)     confirm_password.style.borderColor = 'red';
  if (!bank_account.value)         bank_account.style.borderColor = 'red';
  if (!confirm_bank_account.value) confirm_bank_account.style.borderColor = 'red';
  if (!bank_name.value)            bank_name.style.borderColor = 'red';
  if (!swift.value)                swift.style.borderColor = 'red';

  // مطابقة كلمة المرور
  if (password.value !== confirm_password.value) {
    password.style.borderColor = confirm_password.style.borderColor = 'orange';
    errorMessage.innerText = "* تأكد من مطابقة كلمة المرور *";
    return;
  } else {
    password.style.borderColor = confirm_password.style.borderColor = 'green';
  }

  // مطابقة IBAN
  if (bank_account.value !== confirm_bank_account.value) {
    bank_account.style.borderColor = confirm_bank_account.style.borderColor = 'orange';
    bankMsg.innerText = "* تحقق من مطابقة حساب البنك *";
    return;
  } else {
    bank_account.style.borderColor = confirm_bank_account.style.borderColor = 'green';
    bankMsg.innerText = "";
  }

  // ===== إذا اجتازت كل الشروط ننفذ AJAX =====
  $.ajax({
    url: "u_login_reg/reg_jobs.php",
    type: "POST",
    data: {
      f_name: f_name.value,
      l_name: l_name.value,
      phone_number: phone_number.value,
      key_code: key_code.value,
      email: email.value,
      confirm_email: confirm_email.value,
      password: password.value,
      bank_account: bank_account.value,
      confirm_bank_account: confirm_bank_account.value,
      bank_name: bank_name.value,
      swift: swift.value
    },
    success: function(response) {
      const res = response.trim();
      if (res === 'error_email') {
        alert("هذا الايميل مستخدم");
      } else if (res === 'error_number') {
        alert("هذا الرقم مستخدم");
      } else {
        document.body.innerHTML = response;
      }
    },
    error: function(xhr, status, error) {
      console.error("Error:", error);
    }
  });

});
