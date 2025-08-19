<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Responsive Sidebar</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    
    </style>
</head>
<body>
    <?php
    include('../secondop\includes/sidebar.php')
    ?>
      <main class="main-content" id="main-content">
        <div class="content-header">
            <h1>Dashboard</h1>
            <button class="mobile-toggle-btn " id="mobile-toggle-btn" style="display: none;">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="content-card">
            <h2>Welcome to the Admin Panel</h2>
            <p>This is a demonstration of a responsive sidebar navigation with collapsible functionality.</p>
            <p>Click the toggle button in the sidebar header to see it in action.</p>
        </div>
        <div class="content-card">
            <h3>Recent Activity</h3>
            <p>No recent activity to display</p>
        </div>
    </main>
    <!-- Sidebar -->
   
    <script src="script.js">
       
    </script>
</body>
</html>
