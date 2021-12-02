<?php
if (isset($_POST['odosli'])) {
    $nickname = $_POST['prezyvka'];
    $pass = $_POST['heslo'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($nickname, $pass) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $nickname, $pass);
} else {
    header("location: ../login.php");
    exit();
}
