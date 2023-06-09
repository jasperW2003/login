<?php
// LoginSystem.php

class LoginSystem {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function addUser($email, $password) {
        // Check if the email already exists
        $query = "SELECT COUNT(*) FROM users WHERE email = ?";
        $statement = $this->dbConnection->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();
        $count = $result->fetch_row()[0];
    
        if ($count > 0) {
            // Email already exists, return false or throw an exception
            return false;
        }
    
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Store the user in the database
        $query = "INSERT INTO users (email, password) VALUES (?, ?)";
        $statement = $this->dbConnection->prepare($query);
        $statement->bind_param("ss", $email, $hashedPassword);
        $statement->execute();
    
        // Return true to indicate successful user creation
        return true;
    }
    

    public function login($email, $password) {
        // Retrieve the user from the database
        $query = "SELECT password FROM users WHERE email = ?";
        $statement = $this->dbConnection->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();

        // Verify the password
        if ($row && password_verify($password, $row['password'])) {
            return true;
        } else{
            return  false;

        }
    }
}
