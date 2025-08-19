<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // Default page
// Define allowed pages
$allowed_pages = ['dashboard', 'overview', 'maintenance', 'vehicle', 'dispatch', 'driver-performance', 'vehicle-performance', 'settings-profile', 'settings-account', 'settings-notifications'];

if (!in_array($page, $allowed_pages)) {
    $page = 'dashboard'; // fallback
}
?>

<div class="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <span class="sidebar-logo-text">Logistic 2</span>
        </div>
        <button class="toggle-btn">
            <i class="fas fa-chevron-left"></i>
        </button>
    </div>

    <div class="sidebar-menu">

        <!-- Dashboard -->
        <div class="menu-item <?php if ($page == 'dashboard') echo 'active'; ?>">
            <a href="../main/main.php?page=dashboard">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </div>

        <div class="fleet"><p>Fleet & Vehicle Management</p></div>

        <!-- Vehicle Reservation -->
        <div class="menu-item <?php if ($page == 'reservation') echo 'active'; ?>">
            <a href="../main/main.php?page=reservation">
                <i class="fa-solid fa-box"></i>
                <span>Vehicle Reservation</span>
            </a>
        </div>

        <!-- Vehicle Management -->
        <div class="menu-item <?php if ($page == 'vehicle') echo 'active'; ?>">
            <a href="../main/main.php?page=vehicle">
                <i class="fa-solid fa-box"></i>
                <span>Vehicle Management</span>
            </a>
        </div>

        <!-- Maintenance Dropdown -->
        <div class="menu-item has-dropdown <?php if ($page == 'maintenance') echo 'open'; ?>">
            <i class="fas fa-cog"></i>
            <span>Maintenance</span>
            <i class="fas fa-chevron-down arrow"></i>
            <div class="dropdown <?php if ($page == 'maintenance') echo 'active'; ?>">
                <a href="../maintenance/maintenance.php?page=maintenance"
                   class="<?php if ($page == 'maintenance') echo 'active'; ?>">
                   Maintenance
                </a>
                <a href="../main/main.php?page=add-maintenance"
                   class="<?php if ($page == 'add-maintenance') echo 'active'; ?>">
                   Add Maintenance
                </a>
            </div>
        </div>

        <div class="fleet"><p>Vehicle Reservation and Dispatch</p></div>

        <!-- Dispatch -->
        <div class="menu-item <?php if ($page == 'dispatch') echo 'active'; ?>">
            <a href="../main/main.php?page=dispatch">
                <i class="fa-solid fa-box"></i>
                <span>Dispatch</span>
            </a>
        </div>

        <!-- Trip Performance Dropdown -->
        <div class="menu-item has-dropdown <?php if (in_array($page, ['overview', 'driver-performance', 'vehicle-performance'])) echo 'open'; ?>">
            <i class="fa-solid fa-chart-line"></i>
            <span>Trip Performance</span>
            <i class="fas fa-chevron-down arrow"></i>
            <div class="dropdown">
                <a href="../Overview-tripperformance/overview.php?page=overview" class="<?php if ($page == 'overview') echo 'active'; ?>">Overview</a>
                <a href="../main/main.php?page=driver-performance" class="<?php if ($page == 'driver-performance') echo 'active'; ?>">Driver Performance</a>
                <a href="../main/main.php?page=vehicle-performance" class="<?php if ($page == 'vehicle-performance') echo 'active'; ?>">Vehicle Performance</a>
            </div>
        </div>

        <!-- Settings Dropdown -->
        <div class="menu-item has-dropdown <?php if (in_array($page, ['settings-profile', 'settings-account', 'settings-notifications'])) echo 'open'; ?>">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
            <i class="fas fa-chevron-down arrow"></i>
            <div class="dropdown">
                <a href="../main/main.php?page=settings-profile" class="<?php if ($page == 'settings-profile') echo 'active'; ?>">Profile Settings</a>
                <a href="../main/main.php?page=settings-account" class="<?php if ($page == 'settings-account') echo 'active'; ?>">Account Settings</a>
                <a href="../main/main.php?page=settings-notifications" class="<?php if ($page == 'settings-notifications') echo 'active'; ?>">Notification Settings</a>
            </div>
        </div>

    </div>
</div>
