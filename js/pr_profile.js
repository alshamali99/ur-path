// ------------------ 1) دالة autoResizeTextarea: تضبط ارتفاع textarea بناءً على محتواه ------------------
function autoResizeTextarea(textarea) {
  textarea.style.height = 'auto';
  textarea.style.height = textarea.scrollHeight + 'px';
}

// ------------------ 2) بعد تحميل DOM: نضبط الارتفاع الأولي ونربط حدث input ------------------
document.addEventListener('DOMContentLoaded', function() {
  // 2.1) ضبط ارتفاع حقل "نبذة عني" وربط حدث input
  const aboutTextarea = document.getElementById('about_me_box');
  if (aboutTextarea) {
    autoResizeTextarea(aboutTextarea);
    aboutTextarea.addEventListener('input', function() {
      autoResizeTextarea(aboutTextarea);
    });
  }

  // 2.2) ضبط ارتفاع حقل "الخدمات المقدّمة" وربط حدث input
  const srvTextarea = document.getElementById('provide_services_box');
  if (srvTextarea) {
    autoResizeTextarea(srvTextarea);
    srvTextarea.addEventListener('input', function() {
      autoResizeTextarea(srvTextarea);
    });
  }

  // 2.3) ضبط ارتفاع حقل "تعليمات قبل الطلب" وربط حدث input
  const beforeTextarea = document.getElementById('before_order_box');
  if (beforeTextarea) {
    autoResizeTextarea(beforeTextarea);
    beforeTextarea.addEventListener('input', function() {
      autoResizeTextarea(beforeTextarea);
    });
  }

  // 2.4) ضبط ارتفاع حقل "الوسوم" وربط حدث input
  const tagsTextarea = document.getElementById('tags_box');
  if (tagsTextarea) {
    autoResizeTextarea(tagsTextarea);
    tagsTextarea.addEventListener('input', function() {
      autoResizeTextarea(tagsTextarea);
    });
  }
});

// ------------------ 3) باقي الدوال والأحداث كما كانت لديك سلفًا ------------------

// دالة تحميل قائمة الخدمات المتاحة
function show_srv_list(){
  $.get("profile_func.php?id=1", function(data){ 
    document.getElementById("srv_menu_lst").innerHTML = data; 
    delete_trash_icon(1);
  });
}
show_srv_list();

// دالة تحميل قائمة الخدمات لدى المستخدم
function get_user_srv_list(){ 
  $.get("profile_func.php?id=1", function(data){
    document.getElementById("user_srvs_list").innerHTML = data;
  });
}

// دالة تحميل قائمة الأعمال
function get_works_lst(){
  $.get("profile_func.php?id=2", function(data){
    document.getElementById("works_lst").innerHTML = data;
  });
}

// ---------------------------------------------
// حدث الضغط على أيقونة “نبذة عني – تحرير”
document.getElementById('about_me_edit_open').onclick = function () {
  const textarea = document.getElementById('about_me_box');
  // أزل صفة readonly وفعّل pointer-events
  textarea.readOnly = false;
  textarea.style.pointerEvents = 'auto';
  // أضف صنف "editing" إلى الحاوية
  document.querySelector('.textarea_wrapper').classList.add('editing');
  // إظهار أزرار الحفظ والإلغاء
  document.getElementById("edit_about_btns").style.display = "block";
  // ضع المؤشر داخل textarea
  textarea.focus();
  // أعد ضبط الارتفاع
  autoResizeTextarea(textarea);
};

// ---------------------------------------------
// حدث الضغط على أيقونة تحرير “الخدمات المقدّمة”
document.getElementById('edit_provide_services').onclick = function () {
  const textarea = document.getElementById('provide_services_box');
  textarea.readOnly = false;
  textarea.style.pointerEvents = 'auto';
  autoResizeTextarea(textarea);
  document.getElementById("edit_provide_services_btns").style.display = "block";
  textarea.focus();
};

// ---------------------------------------------
// حدث الضغط على أيقونة تحرير “قبل الطلب”
document.getElementById('edit_before_order').onclick = function () {
  const textarea = document.getElementById('before_order_box');
  textarea.readOnly = false;
  textarea.style.pointerEvents = 'auto';
  autoResizeTextarea(textarea);
  document.getElementById("edit_before_order_btns").style.display = "block";
  textarea.focus();
};

// ---------------------------------------------
// حدث الضغط على أيقونة تحرير “التاجز”
document.getElementById('edit_tags').onclick = function () {
  const textarea = document.getElementById('tags_box');
  textarea.readOnly = false;
  textarea.style.pointerEvents = 'auto';
  autoResizeTextarea(textarea);
  document.getElementById("tags_btns").style.display = "block";
  textarea.focus();
};

// ---------------------------------------------
// حدث الضغط على أيقونة تحرير “السجل التجاري”
document.getElementById('edit_sjl').onclick = function () {
  document.getElementById('update_sjl').style.display = 'block';
  document.getElementById("overlay").style.display = 'block';
  document.getElementById("sjl_num").value = document.getElementById("code_sjl").value;
};

// ---------------------------------------------
// حدث الضغط على أيقونة تحرير “وثيقة العمل الحر”
document.getElementById('edit_free_lancer').onclick = function () {
  document.getElementById('free_lancer').style.display = 'block';
  document.getElementById("overlay").style.display = 'block';
  document.getElementById("free_lancer_num").value = document.getElementById("code_free_lancer").value;
};

// ---------------------------------------------
// حدث الضغط على أيقونة تحرير “الرقم الضريبي”
document.getElementById('edit_tax_number').onclick = function () {
  document.getElementById('tax_number').style.display = 'block';
  document.getElementById("overlay").style.display = 'block';
  document.getElementById("tax_num").value = document.getElementById("code_tax").value;
};

// ---------------------------------------------
// حدث الضغط على أيقونة تحرير “معروف”
document.getElementById('edit_maroof').onclick = function () {
  document.getElementById('maroof').style.display = 'block';
  document.getElementById("overlay").style.display = 'block';
  document.getElementById("maroof_num").value = document.getElementById("code_maroof").value;
};

// ---------------------------------------------
// حدث الضغط على أيقونة تحرير “المواضيع الرئيسة”
document.getElementById('edit_main_topics').onclick = function () {
  document.getElementById('main_topics').style.display = 'block';
  document.getElementById("overlay").style.display = 'block';
  $.get("profile_func.php?id=1", function(data){
    document.getElementById("user_srvs_list").innerHTML = data;
  });
};

// ---------------------------------------------
// حدث الضغط على أيقونة تحرير “أعمالي”
document.getElementById('edit_my_works').onclick = function () {
  document.getElementById('my_works').style.display = 'block';
  document.getElementById("overlay").style.display = 'block';
  $.get("profile_func.php?id=2", function(data){
    document.getElementById("works_lst").innerHTML = data;
  });
};

// ---------------------------------------------
// دالة إعادة التوجيه بعد التحديث
function after_update(){
  window.location.href = "pr_profile.php";
}

// ---------------------------------------------
// حدث الضغط على زرّ الإغلاق (x) داخل أيّ نموذج منبثق
$(document).ready(function() {
  $(document).on('click', '#close_edit_btn', function() {
    $(this).closest('.edit_form').hide(); 
    document.getElementById("overlay").style.display = "none";
  });
});

// ---------------------------------------------
// حدث الضغط على زرّ “إلغاء” (cancle_btn) لجميع الحقول
$(document).ready(function() {
  $(document).on('click', '.cancle_btn', function() {
    const parentEdit = $(this).closest('.edit_btns').attr('id'); 
    // نحدّد أيّ حقل يجب إعادة تفعيل readonly له
    let textarea;
    if (parentEdit === 'edit_about_btns') {
      textarea = document.getElementById('about_me_box');
    } else if (parentEdit === 'edit_provide_services_btns') {
      textarea = document.getElementById('provide_services_box');
    } else if (parentEdit === 'edit_before_order_btns') {
      textarea = document.getElementById('before_order_box');
    } else if (parentEdit === 'tags_btns') {
      textarea = document.getElementById('tags_box');
    }
    if (textarea) {
      textarea.readOnly = true;
      textarea.style.pointerEvents = 'none';
      autoResizeTextarea(textarea);
    }
    $(this).closest('.edit_btns').hide();
    document.getElementById("overlay").style.display = "none";
  });
});

// ---------------------------------------------
// حدث الضغط على زرّ “حفظ التغيرات” (تحديث نبذة عني)
$('#update_about_me').click(() => {
  const textarea = document.getElementById("about_me_box");
  const about_me = textarea.value;
  $.post('pr_profile.php', { about_me: about_me })
    .done((response) => {
      textarea.readOnly = true;
      textarea.style.pointerEvents = 'none';
      autoResizeTextarea(textarea);
      document.getElementById("edit_about_btns").style.display = "none";
      after_update();
    });
});

// ---------------------------------------------
// حدث الضغط على زرّ حفظ “الخدمات المقدّمة”
$('#srv_save_btn').click(() => {
  const textarea = document.getElementById("provide_services_box");
  const provide_srv = textarea.value;
  $.post('pr_profile.php', { provide_srv: provide_srv })
    .done((response) => {
      textarea.readOnly = true;
      textarea.style.pointerEvents = 'none';
      autoResizeTextarea(textarea);
      document.getElementById("edit_provide_services_btns").style.display = "none";
      after_update();
    });
});

// ---------------------------------------------
// حدث الضغط على زرّ حفظ “قبل الطلب”
$('#before_save_btn').click(() => {
  const textarea = document.getElementById("before_order_box");
  const before_order = textarea.value;
  $.post('pr_profile.php', { before_order: before_order })
    .done((response) => {
      textarea.readOnly = true;
      textarea.style.pointerEvents = 'none';
      autoResizeTextarea(textarea);
      document.getElementById("edit_before_order_btns").style.display = "none";
      after_update();
    });
});

// ---------------------------------------------
// حدث الضغط على زرّ حفظ “التاجز”
$('#tags_save_btn').click(() => {
  const textarea = document.getElementById("tags_box");
  const tags_box = textarea.value;
  $.post('pr_profile.php', { tags_box: tags_box })
    .done((response) => {
      textarea.readOnly = true;
      textarea.style.pointerEvents = 'none';
      autoResizeTextarea(textarea);
      document.getElementById("tags_btns").style.display = "none";
      after_update();
    });
});

// ---------------------------------------------
// حدث الضغط على زرّ “إضافة خدمة جديدة” في قسم الخدمات الرئيسية
document.getElementById('add_main_srv').onclick = function () {
  const selected_srv = document.getElementById('srvs_menu').value;
  $.post('pr_profile.php', { new_srv: selected_srv }).done((res) => {
    get_works_lst();
  });
  show_srv_list();
  get_user_srv_list();
};

// ---------------------------------------------
// حدث الضغط على أيقونة حذف خدمة من القائمة
document.body.addEventListener('click', function(event) {
  if (event.target && event.target.classList.contains('del_srv')) {
    $.get("profile_func.php?del_srv=" + event.target.id, function(data){});
    get_user_srv_list();
    show_srv_list();
  }
});

// ---------------------------------------------
// حدث الضغط على أيقونة حذف عمل من القائمة
document.body.addEventListener('click', function(event) {
  if (event.target && event.target.classList.contains('del_work')) {
    $.get("profile_func.php?del_work=" + event.target.id, function(data){});
    get_works_lst();
    show_srv_list();
  }
});

// ---------------------------------------------
// دالة حذف عمود “سلة المهملات” من الجدول
function delete_trash_icon(ColIndex){
  const table = document.getElementById("srvs_list_tbl");
  for (let row of table.rows) {
    if (row.cells.length > ColIndex) {
      row.deleteCell(ColIndex);
    }
  }
}

// ---------------------------------------------
// حدث الضغط على زرّ “إضافة عمل”
document.getElementById('add_works').onclick = function () {
  let add_works_type = document.getElementById("add_my_works").value;
  if (add_works_type == 'add_file') {
    document.getElementById("upload_my_works").style.display = 'block';
  } else if (add_works_type == 'youtube') {
    document.getElementById("add_link").style.display = 'block';
  }
};

// ---------------------------------------------
// حدث الضغط على زرّ “إضافة رابط يوتيوب”
document.getElementById('add_youtube_link').onclick = function () {
  const youtube_link = document.getElementById("youtube_link").value;
  $.post("pr_profile.php", { youtube_link: youtube_link });
  close_form();
  get_works_lst();
};

// ---------------------------------------------
// حدث رفع ملف عمل جديد
$(document).ready(function() {
  $('#upload_work_file').click(function() {
    const file = $('#work_file')[0].files[0];
    let formData = new FormData();
    formData.append('work_file', file);

    $.ajax({
      url: 'pr_profile.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        close_form();
        get_works_lst();
      },
      error: function() {
        alert('حدث خطأ أثناء الرفع.');
      }
    });
  });
});

function close_form(){
  document.getElementById("upload_my_works").style.display = 'none';
  document.getElementById("add_link").style.display = 'none';
}

// ---------------------------------------------
// Docs Sjl
document.getElementById('upload_sjl').addEventListener('change', function(e) {
  const file = e.target.files[0];
  const sjl_msg = document.getElementById('sjl_changes');
  const allowedTypes = ['image/jpeg','image/png','image/gif','application/pdf'];
  if (file && allowedTypes.includes(file.type)) {
    sjl_msg.textContent = file.name;
  } else if (file) {
    sjl_msg.textContent = "   خطأ : نوع الملف غير مسموح   ";
    e.target.value = '';
  } else {
    sjl_msg.textContent = 'لم يتم اختيار أي ملف.';
  }
});
document.getElementById('select_sjl').addEventListener('click', function() {
  document.getElementById('upload_sjl').click();
});
document.getElementById("sjl_done").addEventListener("click", function() {
  let sjl_num = document.getElementById("sjl_num").value;
  let update_sjl = document.getElementById("upload_sjl").value;
  const sjl_msg = document.getElementById('sjl_changes');
  sjl_msg.textContent = "File Uploaded . . .";
  sjl_msg.style.color = "green";
  if (update_sjl === "") {
    sjl_msg.textContent = "فضلا قم باختيار ملف";
    sjl_msg.style.color = "red";
  } else if (sjl_num === "") {
    sjl_msg.textContent = "فضلا ادخل رقم السجل التجاري";
    return;
  } else {
    let sjl_file = $('#upload_sjl')[0].files[0];
    let formData = new FormData();
    formData.append('org_doc_file', sjl_file);
    formData.append('sjl_num', sjl_num);
    $.ajax({
      url: 'pr_profile.php?d_type=1',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        document.getElementById("update_sjl").style.display = "none";
        setTimeout(() => { window.location.href = "pr_profile.php"; }, 2000);
      },
      error: function() {
        alert('حدث خطأ أثناء الرفع.');
      }
    });
  }
});
$('#del_doc_sjl').click(function() {
  $.get("profile_func.php?del_sjl=1", function(){
    window.location.href = "pr_profile.php";
  });
});

// ---------------------------------------------
// Docs Free Lancer
document.getElementById('upload_free_lancer').addEventListener('change', function(e) {
  const file = e.target.files[0];
  const free_lancer_msg = document.getElementById('free_lancer_changes');
  const allowedTypes = ['image/jpeg','image/png','image/gif','application/pdf'];
  if (file && allowedTypes.includes(file.type)) {
    free_lancer_msg.textContent = file.name;
  } else if (file) {
    free_lancer_msg.textContent = "   خطأ : نوع الملف غير مسموح   ";
    e.target.value = '';
  } else {
    free_lancer_msg.textContent = 'لم يتم اختيار أي ملف.';
  }
});
document.getElementById('select_free_lancer').addEventListener('click', function() {
  document.getElementById('upload_free_lancer').click();
});
document.getElementById("free_lancer_done").addEventListener("click", function() {
  let free_lancer_num = document.getElementById("free_lancer_num").value;
  let update_free_lancer = document.getElementById("upload_free_lancer").value;
  const free_lancer_msg = document.getElementById('free_lancer_changes');
  free_lancer_msg.textContent = "File Uploaded . . .";
  free_lancer_msg.style.color = "green";
  if (update_free_lancer === "") {
    free_lancer_msg.textContent = "فضلا قم باختيار ملف";
    free_lancer_msg.style.color = "red";
  } else if (free_lancer_num === "") {
    free_lancer_msg.textContent = "فضلا ادخل رقم الوثيقة";
    return;
  } else {
    let free_lancer_file = $('#upload_free_lancer')[0].files[0];
    let formData = new FormData();
    formData.append('upload_free_lancer', free_lancer_file);
    formData.append('free_lancer_num', free_lancer_num);
    $.ajax({
      url: 'pr_profile.php?d_type=2',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        document.getElementById("free_lancer").style.display = "none";
        setTimeout(() => { window.location.href = "pr_profile.php"; }, 2000);
      },
      error: function() {
        alert('حدث خطأ أثناء الرفع.');
      }
    });
  }
});
$('#del_doc_free_lancer').click(function() {
  $.get("profile_func.php?del_free_lancer=1", function(){
    window.location.href = "pr_profile.php";
  });
});

// ---------------------------------------------
// Docs TAX
document.getElementById('upload_tax').addEventListener('change', function(e) {
  const file = e.target.files[0];
  const tax_msg = document.getElementById('tax_changes');
  const allowedTypes = ['image/jpeg','image/png','image/gif','application/pdf'];
  if (file && allowedTypes.includes(file.type)) {
    tax_msg.textContent = file.name;
  } else if (file) {
    tax_msg.textContent = "   خطأ : نوع الملف غير مسموح   ";
    e.target.value = '';
  } else {
    tax_msg.textContent = 'لم يتم اختيار أي ملف.';
  }
});
document.getElementById('select_tax').addEventListener('click', function() {
  document.getElementById('upload_tax').click();
});
document.getElementById("tax_done").addEventListener("click", function() {
  let tax_num = document.getElementById("tax_num").value;
  let update_tax = document.getElementById("upload_tax").value;
  const tax_msg = document.getElementById('tax_changes');
  tax_msg.textContent = "File Uploaded . . .";
  tax_msg.style.color = "green";
  if (update_tax === "") {
    tax_msg.textContent = "فضلا قم باختيار ملف";
    tax_msg.style.color = "red";
  } else if (tax_num === "") {
    tax_msg.textContent = "ادخل الرقم الضريبي";
    return;
  } else {
    let tax_file = $('#upload_tax')[0].files[0];
    let formData = new FormData();
    formData.append('upload_tax', tax_file);
    formData.append('tax_num', tax_num);
    $.ajax({
      url: 'pr_profile.php?d_type=3',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        document.getElementById("tax_number").style.display = "none";
        setTimeout(() => { window.location.href = "pr_profile.php"; }, 2000);
      },
      error: function() {
        alert('حدث خطأ أثناء الرفع.');
      }
    });
  }
});
$('#del_doc_tax').click(function() {
  $.get("profile_func.php?del_tax=1", function(){
    window.location.href = "pr_profile.php";
  });
});

// ---------------------------------------------
// Docs Maroof
document.getElementById('upload_maroof').addEventListener('change', function(e) {
  const file = e.target.files[0];
  const maroof_msg = document.getElementById('maroof_changes');
  const allowedTypes = ['image/jpeg','image/png','image/gif','application/pdf'];
  if (file && allowedTypes.includes(file.type)) {
    maroof_msg.textContent = file.name;
  } else if (file) {
    maroof_msg.textContent = "   خطأ : نوع الملف غير مسموح   ";
    e.target.value = '';
  } else {
    maroof_msg.textContent = 'لم يتم اختيار أي ملف.';
  }
});
document.getElementById('select_maroof').addEventListener('click', function() {
  document.getElementById('upload_maroof').click();
});
document.getElementById("maroof_done").addEventListener("click", function() {
  let maroof_num = document.getElementById("maroof_num").value;
  let update_maroof = document.getElementById("upload_maroof").value;
  const maroof_msg = document.getElementById('maroof_changes');
  maroof_msg.textContent = "File Uploaded . . .";
  maroof_msg.style.color = "green";
  if (update_maroof === "") {
    maroof_msg.textContent = "فضلا قم باختيار ملف";
    maroof_msg.style.color = "red";
  } else if (maroof_num === "") {
    maroof_msg.textContent = "ادخل الرقم الضريبي";
    return;
  } else {
    let maroof_file = $('#upload_maroof')[0].files[0];
    let formData = new FormData();
    formData.append('upload_maroof', maroof_file);
    formData.append('maroof_num', maroof_num);
    $.ajax({
      url: 'pr_profile.php?d_type=4',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        document.getElementById("maroof").style.display = "none";
        setTimeout(() => { window.location.href = "pr_profile.php"; }, 2000);
      },
      error: function() {
        alert('حدث خطأ أثناء الرفع.');
      }
    });
  }
});
$('#del_doc_maroof').click(function() {
  $.get("profile_func.php?del_maroof=1", function(){
    window.location.href = "pr_profile.php";
  });
});

// ---------------------------------------------
// My Works Slider
let slides = document.querySelectorAll('.slide');
let currentIndex = 0;
let slideInterval = setInterval(nextSlide, 3000);

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove('active');
    if (i === index) slide.classList.add('active');
  });
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
}

function prevSlide() {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex);
}

document.getElementById('next').onclick = () => {
  nextSlide();
  resetInterval();
};

document.getElementById('prev').onclick = () => {
  prevSlide();
  resetInterval();
};

document.getElementById("ok_btn").onclick = function () {
  // إغلاق النموذج المنبثق
  document.getElementById("my_works").style.display = "none";
  document.getElementById("overlay").style.display = "none";

  // إعادة تحميل الصفحة لتطبيق التغييرات (اختياري)
  location.reload();
};


function resetInterval() {
  clearInterval(slideInterval);
  slideInterval = setInterval(nextSlide, 3000000);
}
