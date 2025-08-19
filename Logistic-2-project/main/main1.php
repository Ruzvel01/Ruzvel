<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar with Dropdown</title>
    <style>
        :root {
            --sidebar-width: 240px;
            --sidebar-collapsed-width: 70px;
            --primary-color: #4361ee;
            --primary-dark: #3a0ca3;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
            --transition-speed: 0.3s;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #f1f5f9;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: white;
            position: fixed;
            transition: width var(--transition-speed) ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            z-index: 1000;
        }
        
        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            height: 80px;
        }
        
        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .sidebar-logo img {
            width: 32px;
            height: 32px;
        }
        
        .sidebar-logo-text {
            font-weight: 600;
            font-size: 1.2rem;
            color: var(--dark-gray);
            white-space: nowrap;
        }
        
        .sidebar-menu {
            padding: 1rem 0;
            height: calc(100vh - 80px);
            overflow-y: auto;
        }
        
        .menu-item {
            position: relative;
            display: flex;
            align-items: center;
            padding: 0.8rem 1.5rem;
            cursor: pointer;
            transition: background-color 0.2s;
            color: #4a5568;
            text-decoration: none;
        }
        
        .menu-item:hover {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }
        
        .menu-item.active {
            background-color: rgba(67, 97, 238, 0.2);
            color: var(--primary-color);
            border-left: 3px solid var(--primary-color);
        }
        
        .menu-icon {
            font-size: 1.2rem;
            min-width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .menu-text {
            white-space: nowrap;
            margin-left: 0.5rem;
            font-size: 0.95rem;
        }
        
        .menu-arrow {
            margin-left: auto;
            transition: transform var(--transition-speed);
        }
        
        .menu-item.active .menu-arrow {
            transform: rotate(90deg);
        }
        
        .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height var(--transition-speed) ease-out;
            background-color: rgba(0, 0, 0, 0.02);
        }
        
        .submenu.open {
            max-height: 500px;
        }
        
        .submenu-item {
            padding: 0.7rem 1.5rem 0.7rem 3.5rem;
            color: #4a5568;
            font-size: 0.9rem;
            text-decoration: none;
            display: block;
            transition: background-color 0.2s;
        }
        
        .submenu-item:hover {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }
        
        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
            transition: margin-left var(--transition-speed);
        }
        
        /* Toggle Button Styles */
        .sidebar-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            background: white;
            border: none;
            border-radius: 5px;
            padding: 0.5rem;
            cursor: pointer;
            display: none;
            z-index: 1100;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-toggle span {
            display: block;
            width: 25px;
            height: 2px;
            background-color: var(--dark-gray);
            margin: 5px 0;
            transition: transform var(--transition-speed), opacity var(--transition-speed);
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: block;
            }
            
            .sidebar-toggle.open span:nth-child(1) {
                transform: translateY(7px) rotate(45deg);
            }
            
            .sidebar-toggle.open span:nth-child(2) {
                opacity: 0;
            }
            
            .sidebar-toggle.open span:nth-child(3) {
                transform: translateY(-7px) rotate(-45deg);
            }
        }
        
        /* Demo Content Styles */
        .page-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            color: var(--dark-gray);
        }
        
        .card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body>
    <!-- Sidebar Structure -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/5ca46795-0ad9-403a-9da7-ceb099e8a1f2.png" alt="Company logo with minimalist geometric design in blue and white" />
                <span class="sidebar-logo-text">Dashboard</span>
            </div>
        </div>
        
        <nav class="sidebar-menu">
            <a href="#" class="menu-item active">
                <div class="menu-icon">📊</div>
                <span class="menu-text">Dashboard</span>
            </a>
            
            <div class="menu-item has-submenu">
                <div class="menu-icon">📦</div>
                <span class="menu-text">Products</span>
                <div class="menu-arrow">›</div>
            </div>
            <div class="submenu open">
                <a href="#" class="submenu-item active">All Products</a>
                <a href="#" class="submenu-item">Add New</a>
                <a href="#" class="submenu-item">Categories</a>
                <a href="#" class="submenu-item">Inventory</a>
            </div>
            
            <div class="menu-item has-submenu">
                <div class="menu-icon">👥</div>
                <span class="menu-text">Customers</span>
                <div class="menu-arrow">›</div>
            </div>
            <div class="submenu">
                <a href="#" class="submenu-item">All Customers</a>
                <a href="#" class="submenu-item">New Customer</a>
                <a href="#" class="submenu-item">Segments</a>
            </div>
            
            <a href="#" class="menu-item">
                <div class="menu-icon">📝</div>
                <span class="menu-text">Orders</span>
            </a>
            
            <div class="menu-item has-submenu">
                <div class="menu-icon">⚙️</div>
                <span class="menu-text">Settings</span>
                <div class="menu-arrow">›</div>
            </div>
            <div class="submenu">
                <a href="#" class="submenu-item">General</a>
                <a href="#" class="submenu-item">Security</a>
                <a href="#" class="submenu-item">Integration</a>
            </div>
            
            <a href="#" class="menu-item">
                <div class="menu-icon">🆘</div>
                <span class="menu-text">Support</span>
            </a>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <button class="sidebar-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <h1 class="page-title">Dashboard Overview</h1>
        
        <div class="card">
            <h2>Welcome to your Dashboard</h2>
            <p>This responsive sidebar features dropdown menus that can be toggled, and collapses to a mobile-friendly version on smaller screens. Click on the menu items with arrows to see the dropdown functionality in action.</p>
        </div>
        
        <div class="card">
            <h3>Features:</h3>
            <ul>
                <li>Fully responsive design</li>
                <li>Animated dropdown menus</li>
                <li>Smooth transitions</li>
                <li>Mobile hamburger menu</li>
                <li>Clean, modern UI</li>
            </ul>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.has-submenu');
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.sidebar-toggle');
            const submenus = document.querySelectorAll('.submenu');
            
            // Toggle submenus
            menuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const submenu = this.nextElementSibling;
                    const arrow = this.querySelector('.menu-arrow');
                    
                    // Close all other submenus
                    submenus.forEach(sm => {
                        if (sm !== submenu) {
                            sm.classList.remove('open');
                            const otherArrow = sm.previousElementSibling.querySelector('.menu-arrow');
                            otherArrow.style.transform = 'rotate(0)';
                        }
                    });
                    
                    // Toggle current submenu
                    submenu.classList.toggle('open');
                    arrow.style.transform = submenu.classList.contains('open') 
                        ? 'rotate(90deg)' 
                        : 'rotate(0)';
                });
            });
            
            // Toggle sidebar on mobile
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                this.classList.toggle('open');
            });
            
            // Close submenus when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 && !sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                    sidebar.classList.remove('open');
                    toggleBtn.classList.remove('open');
                }
            });
            
            // Active menu item highlighting
            const menuLinks = document.querySelectorAll('.menu-item, .submenu-item');
            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    menuLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                    if (this.classList.contains('submenu-item')) {
                        const parentItem = this.parentElement.previousElementSibling;
                        parentItem.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>
</html>

