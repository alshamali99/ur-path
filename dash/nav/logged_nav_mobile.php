<div class="mobile-navbar">
  <div class="mobile-header">
    <div class="mobile-logo">
      <img src="https://ur-path.com/images/untitled-1-01-2.png" alt="logo" />
    </div>
    <div class="mobile-menu-btn" onclick="toggleMobileMenu()">
      <i class="fas fa-bars"></i>
    </div>
  </div>

  <div id="mobileNavMenu" class="mobile-nav-links">
    <a href="dash_home.php">الرئيسية</a>
    <a href="account_options.php">خيارات الحساب</a>
    <a href="inbox.php">البريد الوارد</a>
  </div>
</div>

<script>
function toggleMobileMenu() {
  const menu = document.getElementById("mobileNavMenu");
  menu.classList.toggle("show");
}
</script>
