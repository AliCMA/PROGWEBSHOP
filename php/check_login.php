<!--  Ali zijn code -->




<?php

session_start();

include "../db_conn.php";
include "./c_l_functions.php";

$message = [];

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

    test_input($data); //test input functie

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if (empty($username)) {
        array_push($message, 'User name is required!');
    }

    if (empty($password)) {
        array_push($message, 'wachtwoord is required!');
    } else {

        $password = md5($password);

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['role'] == $role) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];

                header("Location: ../home.php");
                exit;

            } else {
                array_push($message, 'Foute gebruikersnaam, wachtwoord of type!');
            }
        }
        else {
            array_push($message, 'Foute gebruikersnaam, wachtwoord of type!');
        }
    }

    print_r($message);

    if (count($message) ==  0){
        header("Location: ../index.php");
    } else {
        header("Location: ../index.php?error=$message[0]");
    }
}

class User {
    private $username;
    private $password;
    private $role;

    function __construct($username, $password, $role) {
        $this->username = $username;
        $this->password = md5($password);
        $this->role = $role;
    }

    function authenticate() {
        global $conn;
        global $message;

        $sql = "SELECT * FROM users WHERE username='$this->username' AND password='$this->password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['role'] == $this->role) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];

                header("Location: ../home.php");
                exit;

            } else {
                array_push($message, 'Foute gebruikersnaam, wachtwoord of type!');
            }
        }
        else {
            array_push($message, 'Foute gebruikersnaam, wachtwoord of type!');
        }
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->role;
    }
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if (empty($username)) {
        array_push($message, 'User name is required!');
    }

    if (empty($password)) {
        array_push($message, 'wachtwoord is required!');
    } else {
        $user = new User($username, $password, $role);
        $user->authenticate();
    }
}
