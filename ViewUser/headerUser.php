<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>headerUser</title>
    <link rel="stylesheet" href="https://boothwatch.com/5/minty/boothwatch.css"> 
</head>
<body x-data="gameHandler()">
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "Bienvenue, " . htmlspecialchars($_SESSION['username']) . " ! <br>";
                    } else {
                        echo "Bienvenue, invité ! <br>";
                    }
                    ?>
                </li>
            </ul>
            <form class="d-flex">
                <a href="index.php?page=deconnexion" class="btn btn-secondary my-2 my-sm-0">
                    Déconnexion
                </a>
            </form>
        </div>
    </div>
</nav>