<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styl.css">
    <title>Prihlasenie</title>
</head>

<body>
    <?php
    include_once 'navbar.php';
    ?>
    <main class="container main-content">
        <h1>Prihlásenie</h1>
        <form action="includes/login.inc.php" method="POST" class="contact-form container gx-4">
            <div class="row g-3">
                <div class="form-input">
                    <label for="prezyvka">Nickname alebo email</label>
                    <input required type="text" class="form-control" name="prezyvka" placeholder="Nickname / Email...">
                </div>

                <div class="form-input">
                    <label for="heslo">Heslo</label>
                    <input required type="password" class="form-control" name="heslo" placeholder="Tvoje heslo...">
                </div>
                <button type="submit" name="odosli" class="btn btn-success">Prihlás ma</button>
            </div>
        </form>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyinput") {
                echo '<p class="text-center mt-3">Je potrebne vyplnit vsetky polia!</p>';
            } else if ($_GET['error'] == "userdoesnotexists") {
                echo '<p class="text-center mt-3">Takyto pouzivatel neexistuje!</p>';
            } else if ($_GET['error'] == "wrongpassword") {
                echo '<p class="text-center mt-3">Zadane heslo je nespravne!</p>';
            } else if ($_GET['error'] == "none") {
                echo '<p class="text-center mt-3">Registracia prebehla uspesne!</p>';
            }
        }
        ?>
    </main>
    <?php
    include_once 'footer.php';
    ?>
</body>

</html>