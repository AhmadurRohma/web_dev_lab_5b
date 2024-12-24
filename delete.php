
<?php
include 'Database.php';
include 'User.php';

if (isset($_GET['Matric'])) {
    $Matric = $_GET['Matric'];

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    if ($user->deleteUser($Matric)) {
        header("Location: display.php");
        exit();
    } else {
        echo "Error: Unable to delete user.";
    }
}
?>