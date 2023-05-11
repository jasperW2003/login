<!-- <?php
require_once 'config.php';
require_once 'loginsystem.php';

$loginSystem = new LoginSystem($dbConnection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email is already registered
    // if ($loginSystem->isEmailRegistered($email)) {
    //     header('Location: register.php?error=EmailAlreadyExists');
    //     exit();
    // }

    // // Add the new user
    $loginSystem->addUser($email, $password);

    // Redirect to the login page or any other desired page after successful registration
    header('Location: login.php');
    exit();
}
?> -->
