<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styl.css">
    <title>Kontakt</title>
</head>

<body>
    <?php
    include_once 'navbar.php';
    ?>

    <main class="container main-content">
        <?php //require_once 'process.php'; 
        ?>

        <?php
        require_once 'includes/feedback.inc.php';
        include_once 'includes/dbh.inc.php';
        include_once 'includes/functions.inc.php';
        ?>
        <?php
        if (isset($_SESSION['message'])) : ?>

            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>

            </div>
        <?php endif ?>

        <h1>Kontakt</h1>
        <form action="includes/feedback.inc.php" class="contact-form container gx-4" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row g-3">
                <div class="form-input">
                    <label for="name" class="form-label">Meno</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Tvoje meno a priezvisko" value="<?php echo $name; ?>">
                </div>

                <div class="form-input">
                    <label for="email">Tvoja mailová adresa</label>
                    <input required type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="email" name="email" placeholder="Tvoja mailová adresa" value="<?php echo $email; ?>">
                </div>

                <div class="form-input">
                    <label for="request">Tu napíš svoju požiadavku, nápad alebo odkaz</label>
                    <textarea required class="form-control" name="request" id="request" placeholder="Tvoja správa"><?php echo $request; ?></textarea>
                </div>
                <?php
                if ($update) : ?>
                    <button type="submit" class="btn btn-info" name="update">Aktualizuj</button>
                <?php else : ?>
                    <button type="submit" class="btn btn-success" name="send">Odošli</button>
                <?php endif ?>
            </div>
        </form>

        <?php
        $result = getAllFeedback($conn);

        ?>
        <h2 class="container ">Spätná väzba od návštevníkov</h2>
        <div class="row justify-content-center container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Meno</th>
                        <th scope="col">Email</th>
                        <th scope="col">Odkaz</th>
                        <th scope="col" colspan="2">Akcia</th>
                    </tr>
                </thead>
                <?php
                while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['meno']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['text']; ?></td>
                        <td>
                            <a href="kontakt.php?edit=<?php echo $row['id_spatna_vazba']; ?>" class="btn btn-info">Edit</a>
                            <a href="kontakt.php?delete=<?php echo $row['id_spatna_vazba']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </main>
    <?php
    include_once 'footer.php';
    ?>
</body>

</html>