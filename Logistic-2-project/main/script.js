   document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.toggle-btn');
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const menuItems = document.querySelectorAll('.menu-item');
            const logoText = document.querySelector('.sidebar-logo-text');
            const logoIcon = document.querySelector('.sidebar-logo-icon');

            // Toggle sidebar collapse/expand
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                
                // Toggle logo text/icon in collapsed state
                if (sidebar.classList.contains('collapsed')) {
                    logoText.style.display = 'none';
                    logoIcon.style.display = 'block';
                } else {
                    logoText.style.display = 'block';
                    logoIcon.style.display = 'none';
                }
            });

            // Mobile menu toggle
            mobileMenuBtn.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });

            // Active menu item
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Check screen size and adjust sidebar
            function checkScreenSize() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.add('collapsed');
                    sidebar.classList.remove('show');
                    mobileMenuBtn.style.display = 'block';
                    logoText.style.display = 'none';
                    logoIcon.style.display = 'block';
                } else {
                    sidebar.classList.remove('collapsed', 'show');
                    mobileMenuBtn.style.display = 'none';
                    logoText.style.display = 'block';
                    logoIcon.style.display = 'none';
                }
            }

            // Initial check
            checkScreenSize();

            // Monitor screen size changes
            window.addEventListener('resize', checkScreenSize);
        });
// Handle dropdown toggle
document.querySelectorAll('.menu-item.has-dropdown').forEach(item => {
    item.addEventListener('click', function (e) {
        // Prevent toggling if clicking on a child link
        if (e.target.tagName.toLowerCase() === 'a') return;

        this.classList.toggle('open');
    });
});

// Ensure clicking dropdown links doesn't close parent
document.querySelectorAll('.menu-item.has-dropdown .dropdown a').forEach(link => {
    link.addEventListener('click', function(e) {
        e.stopPropagation(); // ✅ prevents parent toggle
    });
});

  function logout() {
    // Clear session or localStorage (if you use it)
    localStorage.clear();
    alert('You have been logged out!');
    // Redirect to login page
    window.location.href = "login.html";
}

