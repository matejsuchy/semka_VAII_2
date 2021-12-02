<?php

if (isset($_POST['odosli'])) {
    $name = $_POST['meno'];
    $surname = $_POST['priezvisko'];
    $nickname = $_POST['prezyvka'];
    $email = $_POST['email'];
    $password = $_POST['heslo'];
    $passwordRepeat = $_POST['hesloznova'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $surname, $nickname, $email, $password, $passwordRepeat) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if (invalidNickname($nickname) !== false) {
        header("location: ../register.php?error=invalidnickname");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if (passwordMatch($password, $passwordRepeat) !== false) {
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }

    if (passwordPattern($password) !== false) {
        header("location: ../register.php?error=weakpassword");
        exit();
    }

    if (nicknameExists($conn, $nickname, $email) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $nickname, $name, $surname, $email, $passwordRepeat);
} else {
    header("location: ../register.php");
}
