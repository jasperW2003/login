<?php
// true = localhost, false = webserver

    $localhost = true;

    if ($localhost == true) {
        $localhost = "localhost"; #localhost
        $dbusername = "root"; #username of phpmyadmin
        $dbpassword = "";  #password of phpmyadmin
        $dbname = "mario";  #database name
    } else {
        $localhost = "localhost"; #localhost
        $dbusername = ""; #username of phpmyadmin
        $dbpassword = "";  #password of phpmyadmin
        $dbname = "";  #database name
    }
    
    // // Vul hier je studenten nummer in:
    // $sdn = "";
    
    // // Vul hier de email in waar naar de mails gestuurd moeten worden
    // $aMail = "";
    
    $dbConnection = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
    $db = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);

    // $dbConnection = new mysqli($localhost, $dbUsername, $dbPassword, $dbName);
    if ($dbConnection->connect_error) {
        die("Connection failed: " . $dbConnection->connect_error);
    }
?>