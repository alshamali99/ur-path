$(document).ready(function () {
  $('#login_btn').on('click', function () {
    var email = $('#email').val().trim();
    var password = $('#password').val().trim();

    if (email === "" || password === "") {
      $('#errorMessage').text('يرجى إدخال البريد الإلكتروني وكلمة المرور');
      return;
    }

    $.ajax({
      url: 'php/handle_dash_login.php',
      type: 'POST',
      data: { email: email, password: password },
      success: function (response) {
        if (response.trim() === 'success') {
          // عرض الرسالة الترحيبية
          $('#welcomeModal').fadeIn();

          // الانتقال التلقائي بعد 3 ثواني
          setTimeout(function () {
            window.location.href = 'dash_home.php';
          }, 3000);
        } else {
          $('#errorMessage').text(response);
        }
      },
      error: function () {
        $('#errorMessage').text('حدث خطأ أثناء الاتصال بالخادم.');
      }
    });
  });
});
