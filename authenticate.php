<?php

include 'Database.php';
include 'User.php';

if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    // Create database connection
    $database = new Database();
    $db = $database->getConnection();

    // Sanitize inputs using mysqli_real_escape_string
    $matric = $db->real_escape_string($_POST['Matric']);
    $password = $db->real_escape_string($_POST['Password']);

    // Validate inputs
    if (!empty($matric) && !empty($password)) {
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        // Check if user exists and verify password
        if ($userDetails && password_verify($password, $userDetails['Password'])) {
            // Start session and set session variables
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $userDetails['id']; // Assuming `id` is a column in your users table
            $_SESSION['user_name'] = $userDetails['name']; // Assuming `name` is a column in your users table

            // Redirect to display.php
            header("Location: display.php");
            exit(); // Ensure no further code is executed after redirection
        } else {
            echo 'Login Failed';
        }
    } else {
        echo 'Please fill in all required fields.';
    }
}
