<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styl.css">
    <title>Registrácia</title>
</head>

<body>
    <?php
    include_once 'navbar.php';
    ?>

    <main class="container main-content">
        <h1>Registrácia</h1>
        <form action="includes/register.inc.php" method="POST" class="contact-form container gx-4">
            <div class="row g-3">
                <div class="form-input">
                    <label for="meno">Meno</label>
                    <input required type="text" class="form-control" name="meno" placeholder="Tvoje meno...">
                </div>

                <div class="form-input">
                    <label for="priezvisko">Priezvisko</label>
                    <input required type="text" class="form-control" name="priezvisko" placeholder="Tvoje priezvisko...">
                </div>

                <div class="form-input">
                    <label for="prezyvka">Prezyvka</label>
                    <input required type="text" class="form-control" name="prezyvka" placeholder="Tvoja prezyvka...">
                </div>

                <div class="form-input">
                    <label for="email">Email</label>
                    <input required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" class="form-control" name="email" placeholder="Tvoja mailová adresa...">
                </div>

                <div class="form-input">
                    <label title="Heslo musí obsahovať aspoň 10 znakov, jedno veľké, jedno malé písmeno, číslo a špeciálny charakter." for="heslo">Heslo</label>
                    <input required type="password" pattern="^(?=\P{Ll}*\p{Ll})(?=\P{Lu}*\p{Lu})(?=\P{N}*\p{N})(?=[\p{L}\p{N}]*[^\p{L}\p{N}])[\s\S]{8,}$" class="form-control" name="heslo" placeholder="Tvoje heslo...">
                </div>

                <div class="form-input">
                    <label title="Heslo musí obsahovať aspoň 10 znakov, jedno veľké, jedno malé písmeno, číslo a špeciálny charakter." for="hesloznova">Heslo znova</label>
                    <input required type="password" pattern="^(?=\P{Ll}*\p{Ll})(?=\P{Lu}*\p{Lu})(?=\P{N}*\p{N})(?=[\p{L}\p{N}]*[^\p{L}\p{N}])[\s\S]{8,}$" class="form-control" name="hesloznova" placeholder="Zopakuj heslo...">
                </div>
                <button type="submit" name="odosli" class="btn btn-success">Zaregistruj ma</button>
            </div>
        </form>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyinput") {
                echo '<p class="text-center mt-3">Je potrebne vyplnit vsetky polia!</p>';
            } else if ($_GET['error'] == "invalidnickname") {
                echo '<p class="text-center mt-3">Prezyvka musi obsahovat iba cisla alebo pismena!</p>';
            } else if ($_GET['error'] == "invalidemail") {
                echo '<p class="text-center mt-3">Email nie je v spravnom formate!</p>';
            } else if ($_GET['error'] == "passwordsdontmatch") {
                echo '<p class="text-center mt-3">Zadane hesla sa nezhoduju!</p>';
            } else if ($_GET['error'] == "weakpassword") {
                echo '<p class="text-center mt-3">Heslo musí obsahovať aspoň 10 znakov, jedno veľké, jedno malé písmeno, číslo a špeciálny charakter.</p>';
            } else if ($_GET['error'] == "usernametaken") {
                echo '<p class="text-center mt-3">Prezyvka uz existuje!</p>';
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