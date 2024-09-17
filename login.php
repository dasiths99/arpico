<?php
session_start();
include 'db.php';  // Include database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $accountType = $conn->real_escape_string($_POST['accountType']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND account_type = '$accountType'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['accountType'] = $accountType;
            $_SESSION['success'] = "Login successful! Welcome, " . $username . ".";

            // Redirect to a welcome page
            header("Location: welcome.php");
            exit(); // Ensure no further processing is done after redirect
        } else {
            $_SESSION['error'] = "Invalid password. Please try again.";
            header("Location: login.html"); // Redirect back to login page
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid username or account type. Please try again.";
        header("Location: login.html"); // Redirect back to login page
        exit();
    }

    $conn->close();
}
?>
