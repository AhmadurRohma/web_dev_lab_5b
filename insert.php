<?php
include 'Database.php';
include 'User.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Matric = $_POST['Matric'];
    $Name = $_POST['Name'];
    $Password = $_POST['Password'];
    $Role = $_POST['Role'];

    if ($user->createUser($Matric, $Name, $Password, $Role)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: Registration failed. Please check your input.";
    }
}
?>