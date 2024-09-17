<?php
include 'db.php';  // Include database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $accountType = $conn->real_escape_string($_POST['accountType']); // Get account type

    $sql = "INSERT INTO users (username, email, password, account_type) VALUES ('$username', '$email', '$password', '$accountType')";

    if ($conn->query($sql) === TRUE) {
        echo "Registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
