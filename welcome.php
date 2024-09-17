<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1><?php echo $_SESSION['success']; ?></h1>
    <p>Welcome to the dashboard, <?php echo $_SESSION['username']; ?>!</p>
    <a href="logout.php">Logout</a>
</body>
</html>
