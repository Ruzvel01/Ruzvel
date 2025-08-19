<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'main'; // Default to dashboard

// Define allowed pages
$allowed_pages = ['main', 'overview', 'maintenance'];

if (!in_array($page, $allowed_pages)) {
    $page = 'main'; // Redirect to dashboard if page is not allowed
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logistic 2</title>
    <link rel="stylesheet" href="style.css">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
<?php

include('../includes/sidebar.php');
?>
    <!-- Main Content -->
    <div class="main-content">
      
    </div>
    <?php

?>
    <script src="script.js">
     
    </script>
</body>
</html>
