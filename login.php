<?php

// require_once 'config.php';
require_once './classes/user.php';
require_once './classes/LoginSystem.php';

// Database connection details
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mario";


// Create a database connection
$dbConnection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$loginSystem = new LoginSystem($dbConnection);

if ($loginSystem->login($email, $password)) {
    header('Location: Dashboard.php');
    exit();    
} else {
    header('Location: index.php?error=InvalidCredentials');
    exit();
}

$dbConnection->close();

?>
