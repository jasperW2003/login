<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php 
require './config.php';

require_once './classes/user.php';

?>
<body>
<nav><a href="./register.php">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</a></nav>
<section class="vh-100 IBG-red" >
  <div class="container py-6 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-10 col-lg-6 col-xl-10 ">
      <form method="POST" action="login.php" onsubmit="return validateForm()">

        <div class="card cardLogin corners shadow-2-strong justify-content-center align-items-center IBG-blue">
        <div class="col-12 col-md-10 col-lg-6 col-xl-7 ">

          <div class="card-body  pb-5 pl-5 pr-5 Imb-4">
            <div class="text-center mb-5 pb-1">
                <img src="./img/mario.png" class="login-logo">
                         <?php 
                         
                         if (isset($_GET['error']) && $_GET['error'] === 'InvalidCredentials') {
                            echo '<p class="error-msg text-danger validationerrors">Wrong email or password. Please try again.</p>';
                        }

                         ?>
            </div>
            <div class="form-outline mb-5 Imb-4">
              <label class="form-label text-light login-input-label" for="typeEmailX-2">Email</label>
              <input type="email" id="email" name="email"class="form-control corners  form-control-lg" />
              <div id="emailError" class="error text-danger"></div> <!-- Error message placeholder -->

            </div>
            <div class="form-outline pb-5 Imb-4">
              <label class="form-label text-light login-input-label" for="password"><b>Password</b></label>
              <input type="password" id="password" name="password" class="form-control corners form-control-lg" />
              <div id="passwordError" class="error text-danger"></div> <!-- Error message placeholder -->
            </div>
            <div  class="mt-5 pb-5">
            <button class="btn btn-light login-btn float-right corners " type="submit"><b>Login</b></button>

            </div>
          </div>
        </div>
        </div>
     </form>
      </div>
    </div>
  </div>
</section>
<script>
       function validateForm() {
            const emailValid = validateEmail();
            const passwordValid = validatePassword();
            if (!emailValid) {
                document.getElementById("emailError").textContent = "Invalid email.";
            } else {
                document.getElementById("emailError").textContent = "";
            }

            if (!passwordValid) {
                document.getElementById("passwordError").textContent = "Password should be at least 12 characters long and contain at least one number and one special character.";
            } else {
                document.getElementById("passwordError").textContent = "";
            }
            var_dump($emailValid, $passwordInput);

            // return emailValid && passwordValid;
        }

        function validateEmail() {
            const emailInput = document.getElementById("email");
            const email = emailInput.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var_dump(emailInput);

            return emailRegex.test(email);
        }
        function validatePassword() {
            const passwordInput = document.getElementById("password");
            var_dump(passwordInput);

            const password = passwordInput.value.trim();
            const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*()\-_=+[\]{};':"\\|,.<>/?])(?=.*[a-z]).{12,}$/;

            return passwordRegex.test(password);
        }


        
    </script>
</body>
</html>