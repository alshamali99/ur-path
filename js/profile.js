// profile.js

document.addEventListener('DOMContentLoaded', function () {
    // استدعاء العناصر
    const changeBtn = document.getElementById('change-image-btn');
    const fileInput = document.getElementById('image-upload-input');
    const uploadForm = document.getElementById('image-upload-form');

    if (changeBtn && fileInput && uploadForm) {
        // عند النقر على زر تغيير الصورة
        changeBtn.addEventListener('click', function () {
            // نفعّل النقر على حقل اختيار الملف المخفي
            fileInput.click();
        });

        // عندما يختار المستخدم ملفًا جديدًا
        fileInput.addEventListener('change', function () {
            if (fileInput.files && fileInput.files.length > 0) {
                // نرسل النموذج تلقائيًا لتنفيذ المعالجة في update_image.php
                uploadForm.submit();
            }
        });
    }
});
