<?php
session_start();
?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand active" href="/index.php">Minútovka</a>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav active">
                <li class="nav-item">
                    <a href="/info.php" class="nav-link">Info o hre</a>
                </li>
                <li class="nav-item">
                    <a href="/statistika.php" class="nav-link">Statistika</a>
                </li>
                <li class="nav-item">
                    <a href="/top100.php" class="nav-link">Top 100</a>
                </li>
                <li class="nav-item">
                    <a href="/kontakt.php" class="nav-link">Kontakt</a>
                </li>
            </ul>
        </div>
        <?php
        if (isset($_SESSION['userid'])) {
            echo '<button class="btn btn-light mx-1" type="button">
            <a href="/profile.php">' . $_SESSION["usernickname"] . '</a>
        </button>';
            echo "<button class='btn btn-warning mx-1' type='button'>
            <a href='/logout.inc.php'>Odhlásiť</a>
        </button>";
        } else {
            echo '<button class="btn btn-dark btn-register mx-1" type="button">
                <a href="/register.php">Registrácia</a>
            </button>';
            echo '<button class="btn btn-light btn-login mx-1" type="button">
                <a href="/login.php">Prihlásenie</a>
            </button>';
        }
        ?>
    </div>

</nav>

<script src="script.js">

</script>