<?php
include "db_conn.php";
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars(($data));
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (empty($username)) {
        header("Location: index.php?error= username is required");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error= Password is required");
        exit();
    } else {
        echo 'geklappt';

        if (!isset($conn)) {
            die("Datenbankverbindung nicht gefunden. Bitte überprüfen Sie die db_conn.php Datei.");
        }
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("Location: home.php");
            } else {
                header("Location: index.php?error=Password or User name is incorrect");
            }
        } else {
            header("Location: index.php?error=Password or User name is incorrect");
        }
    }
} else {
    header("Location: index.php");
}