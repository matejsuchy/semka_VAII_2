<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styl.css">
    <title>Top 100</title>
</head>

<body>
    <?php
    include_once 'navbar.php';
    ?>

    <main class="container main-content">
        <h1>Top 100 hráčov</h1>
        <div class="row">
            <div class="top col-md">
                Najrychlejsie pisal <span class="hrac"><a href="#">Fero</a></span> s poctom xyz slov za minutu
            </div>
            <div class="top col-md">
                Najneomylnejší hráč .....
            </div>
            <div class="top col-md">
                Najviac hier odohral ....
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Obodbie
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Dnes</a></li>
                    <li><a class="dropdown-item" href="#">Tento týždeň</a></li>
                    <li><a class="dropdown-item" href="#">Celkovo</a></li>
                </ul>
            </div>
        </div>
        <table class="table table-striped table-hover ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Meno</th>
                    <th scope="col">Priezvisko</th>
                    <th scope="col">WPM (words per minute)</th>
                    <th scope="col">Presnosť</th>
                </tr>
            </thead>
            <tr>
                <td>1</td>
                <td>Fero</td>
                <td>Mrkvička</td>
                <td>320</td>
                <td>99%</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jozef</td>
                <td>Novák</td>
                <td>190</td>
                <td>85%</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Peter</td>
                <td>Kováč</td>
                <td>188</td>
                <td>90%</td>
            </tr>
        </table>
    </main>
    <?php
    include_once 'footer.php';
    ?>
</body>

</html>