// ========== إظهار نافذة إنشاء حساب الدعم الفني ==========
document.addEventListener("DOMContentLoaded", function () {
  const openModalBtn = document.getElementById("openSupportModal");
  const modal = document.getElementById("supportModal");
  const closeBtn = document.getElementById("closeModal");

  if (openModalBtn && modal && closeBtn) {
    openModalBtn.addEventListener("click", function () {
      modal.style.display = "flex";
    });

    closeBtn.addEventListener("click", function () {
      modal.style.display = "none";
    });

    // إغلاق المودال إذا تم الضغط خارج المحتوى
    window.addEventListener("click", function (event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  }

  // ========== إظهار/إخفاء قسم إدارة حسابات المستخدمين ==========
  const toggleUserSectionBtn = document.getElementById("toggleUserSection");
  const userSection = document.getElementById("userManagementSection");

  if (toggleUserSectionBtn && userSection) {
    toggleUserSectionBtn.addEventListener("click", function () {
      userSection.style.display = userSection.style.display === "none" ? "block" : "none";
    });
  }
});
