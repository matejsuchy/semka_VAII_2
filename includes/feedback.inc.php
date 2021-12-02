<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$id = 0;
$update = false;
$name = "";
$email = "";
$request = "";

//$formId = $_POST['id'];
if (isset($_POST['send'])) {
    $formMenoPriezvisko = $_POST['name'];
    $formEmail = $_POST['email'];
    $formRequest = $_POST['request'];
    if (emptyInputFeedback($formMenoPriezvisko, $formEmail, $formRequest) !== false) {
        header("location: ../kontakt.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($formEmail) !== false) {
        header("location: ../kontakt.php?error=invalidemail");
        exit();
    }

    sendFeedback($conn, $formMenoPriezvisko, $formEmail, $formRequest);

    $_SESSION['message'] = "Dáta sa úspešne odoslali!";
    $_SESSION['msg_type'] = "success";

    header("location: ../kontakt.php");
} else if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $feedbackRow = feedbackExists($conn, $id);
    if ($feedbackRow == false) {
        header("location: ../kontakt.php?error=invalidid");
        exit();
    }

    deleteFeedback($conn, $id);

    $_SESSION['message'] = "Dáta sa zmazali!";
    $_SESSION['msg_type'] = "danger";

    header("location: kontakt.php");
} else if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $feedbackRow = feedbackExists($conn, $id);
    if ($feedbackRow == false) {
        header("location: ../kontakt.php?error=invalidid");
        exit();
    }

    $update = true;
    $name = $feedbackRow['meno'];
    $email = $feedbackRow['email'];
    $request = $feedbackRow['text'];
} else if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $formMenoPriezvisko = $_POST['name'];
    $formEmail = $_POST['email'];
    $formRequest = $_POST['request'];

    if (emptyInputFeedback($formMenoPriezvisko, $formEmail, $formRequest) !== false) {
        header("location: ../kontakt.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($formEmail) !== false) {
        header("location: ../kontakt.php?error=invalidemail");
        exit();
    }

    updateFeedback($conn, $formMenoPriezvisko, $formEmail, $formRequest, $id);

    $_SESSION['message'] = "Dáta sa aktualizovali!";
    $_SESSION['msg_type'] = "warning";

    header("location: ../kontakt.php");
}
