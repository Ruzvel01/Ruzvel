    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.querySelector('.sidebar');
      const toggleBtn = document.getElementById('toggle-btn');
      const mainContent = document.getElementById('main-content');
      const mobileToggleBtn = document.getElementById('mobile-toggle-btn');

      // Toggle sidebar on desktop
      toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        if (sidebar.classList.contains('collapsed')) {
          mainContent.style.marginLeft = '80px';
        } else {
          mainContent.style.marginLeft = '250px';
        }
      });

      // Check screen size and adjust sidebar
      function checkScreenSize() {
        if (window.innerWidth <= 768) {
          sidebar.classList.add('collapsed');
          mainContent.style.marginLeft = '80px';
          mobileToggleBtn.style.display = 'block';
        } else {
          sidebar.classList.remove('collapsed');
          mainContent.style.marginLeft = '250px';
          mobileToggleBtn.style.display = 'none';
        }
      }

      // Toggle sidebar on mobile
      mobileToggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        if (sidebar.classList.contains('collapsed')) {
          mainContent.style.marginLeft = '80px';
        } else {
          mainContent.style.marginLeft = '250px';
        }
      });

      // Initialize and add resize listener
      checkScreenSize();
      window.addEventListener('resize', checkScreenSize);

      // Highlight active menu item
      const menuItems = document.querySelectorAll('.menu-item');
      menuItems.forEach(item => {
        item.addEventListener('click', function() {
          menuItems.forEach(i => i.classList.remove('active'));
          this.classList.add('active');
        });
      });

      // Dropdown toggle
      const dropdownItems = document.querySelectorAll('.menu-item.has-dropdown');
      dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
          this.classList.toggle('open');
        });
      });
    });