<?php

function emptyInputSignup($name, $surname, $nickname, $email, $password, $passwordRepeat)
{
    return (empty($name) || empty($surname) || empty($nickname) || empty($email) || empty($password) || empty($passwordRepeat));
}

function invalidNickname($nickname)
{
    return !(preg_match("/^[a-zA-Z0-9]*$/", $nickname));
}

function invalidEmail($email)
{
    return !(filter_var($email, FILTER_VALIDATE_EMAIL));
}

function passwordPattern($pass)
{
    return !(preg_match("/^(?=\P{Ll}*\p{Ll})(?=\P{Lu}*\p{Lu})(?=\P{N}*\p{N})(?=[\p{L}\p{N}]*[^\p{L}\p{N}])[\s\S]{8,}$/", $pass));
}

function passwordMatch($password, $passwordRepeat)
{
    return $password !== $passwordRepeat;
}

function nicknameExists($conn, $nickname, $email)
{
    $result = false;
    $sql = "SELECT * FROM pouzivatel WHERE prezyvka = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=sqlerr");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $nickname, $email);

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $nickname, $name, $surname, $email, $pass)
{
    $sql = "INSERT INTO pouzivatel (prezyvka, meno, priezvisko, email, heslo) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=sqlerr");
        exit();
    }

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $nickname, $name, $surname, $email, $hashedPass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../register.php?error=none");
    exit();
}

function sendFeedback($conn, $name, $email, $request)
{
    $sql = "INSERT INTO spatna_vazba (meno, email, text) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../kontakt.php?error=sqlerr");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $request);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    //header("location: ../kontakt.php?error=none");
    //exit();
}

function emptyInputFeedback($name, $email, $request)
{
    return empty($name) || empty($email) || empty($request);
}

function emptyInputLogin($nickname, $pass)
{
    return empty($nickname) || empty($pass);
}

function loginUser($conn, $nickname, $pass)
{
    $nicknameExists = nicknameExists($conn, $nickname, $nickname);
    if ($nicknameExists == false) {
        header("location: ../login.php?error=userdoesnotexists");
        exit();
    }
    $passHashed = $nicknameExists["heslo"];
    $checkPass = password_verify($pass, $passHashed);

    if ($checkPass == false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    } else if ($checkPass == true) {
        session_start();
        $_SESSION['userid'] = $nicknameExists["id_pouzivatel"];
        $_SESSION['usernickname'] = $nicknameExists["prezyvka"];
        header("location: ../index.php");
        exit();
    }
}

function feedbackExists($conn, $id)
{
    $result = false;
    $sql = "SELECT * FROM spatna_vazba WHERE id_spatna_vazba = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../kontakt.php?error=sqlerr");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function deleteFeedback($conn, $id)
{
    $sql = "DELETE FROM spatna_vazba WHERE id_spatna_vazba = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../kontakt.php?error=sqlerr");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

function updateFeedback($conn, $menoPriezvisko, $email, $request, $id)
{
    $sql = "UPDATE spatna_vazba SET meno=?, email=?, text=? WHERE id_spatna_vazba = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../kontakt.php?error=sqlerr");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssi", $menoPriezvisko, $email, $request, $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

function getAllFeedback($conn)
{
    $sql = "SELECT * FROM spatna_vazba;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../kontakt.php?error=sqlerr");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $res;
}
