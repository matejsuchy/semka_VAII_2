<?php

$mysqli = new mysqli('mariadb-service.semestralka:3306', 'root', 'password-db', 'Semestralka-db') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = "";
$email = "";
$request = "";

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $request = $_POST['request'];

    $mysqli->query("INSERT INTO spatna_vazba (meno, email, text) VALUES ('$name', '$email', '$request')") or die(mysqli_error($mysqli));

    $_SESSION['message'] = "Dáta sa úspešne odoslali!";
    $_SESSION['msg_type'] = "success";

    header("location: kontakt.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM spatna_vazba WHERE id_spatna_vazba = $id") or die($mysqli->error());

    $_SESSION['message'] = "Dáta sa zmazali!";
    $_SESSION['msg_type'] = "danger";

    header("location: kontakt.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM spatna_vazba WHERE id_spatna_vazba = $id") or die($mysqli->error());
    if ($result->num_rows) {
        $update = true;
        $row = $result->fetch_array();
        $name = $row['meno'];
        $email = $row['email'];
        $request = $row['text'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $request = $_POST['request'];

    $mysqli->query("UPDATE spatna_vazba SET meno='$name', email='$email', text='$request' WHERE id_spatna_vazba=$id") or die($mysqli->error());

    $_SESSION['message'] = "Dáta sa aktualizovali!";
    $_SESSION['msg_type'] = "warning";

    header("location: kontakt.php");
}
