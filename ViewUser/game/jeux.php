<?php
session_start();
require_once('../../Controller/tachesController.php');


$controller = new TachesController();
$tachesPhase = [];
$tachesPhase[1] = $controller->showTaches(1);
$tachesPhase[2] = $controller->showTaches(2);
$tachesPhase[3] = $controller->showTaches(3);
$tachesPhase[4] = $controller->showTaches(4);
$tachesPhase[5] = $controller->showTaches(5);
$tachesPhase[6] = $controller->showTaches(6);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title> 
    <link rel="stylesheet" href="Etapes.css"> 
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.css"> 
</head>
<body>
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
                <li>
                    <a class="accueil" href="/regles/regledujeu.php">Accueil</a>
                </li>
                <li>
                    <button id="openPopup" class="icon-button">
                        <img src="Etapes.png" alt="Icône de parchemin" width="40" height="40">
                    </button>
                </li>
            </ul>
            
            <form class="d-flex">
                <a href="/index.php?page=deconnexion" class="btn btn-secondary my-2 my-sm-0">
                    Déconnexion
                </a>
            </form>
        </div>
    </div>
</nav>

<div id="popup">
    <div class="popup-content">
        <span id="closePopup" class="close-btn">&times;</span>
        <p><I>Maya se réveille doucement ce matin, les rayons du soleil illuminent sa chambre. Aujourd’hui, c’est une journée
            spéciale, mais Maya est un peu débordée et désorganisée. Elle a besoin de ton aide pour retrouver ses affaires, 
            préparer son cadeau, et accomplir toutes ses tâches. Aide-la à réussir sa journée et découvre une surprise à la fin !</I></p>
            <br>
        <p> <I>Maya se lève et se souvient que c’est l’anniversaire d’un proche, mais impossible de se rappeler de qui il s’agit.
            Elle panique un peu, car elle n’a rien préparé.	Aide Maya à résoudre ce mystère et à préparer un joli cadeau pour
            cette personne spéciale.</p></I>

        <ul>
            <?php foreach ($tachesPhase[1] as $tache): ?>
                <li><?= htmlspecialchars($tache['etape']) ?></li>
                <span class="<?= ($tache['etat'] == 'NON FAIT') ? 'non-fait' : 'fait' ?>">
                <?= htmlspecialchars($tache['etat']) ?>
                </span>
            <?php endforeach; ?>
        </ul>

        <p> <I>Après avoir préparé ses affaires, Maya décide de	prendre	un bain	pour bien commencer sa journée. Mais comme 
            toujours, elle a oublié	certaines choses essentielles pour ses soins personnels. Donne-lui un coup de main pour
            qu’elle	puisse se préparer convenablement.</p>
        </I>

        <ul>
            <?php foreach ($tachesPhase[2] as $tache): ?>
                <li><?= htmlspecialchars($tache['etape']) ?></li>
                <span class="<?= ($tache['etat'] == 'NON FAIT') ? 'non-fait' : 'fait' ?>">
                <?= htmlspecialchars($tache['etat']) ?>
                </span>
            <?php endforeach; ?>
        </ul>

        <p> <I>Maya	a eu une idée brillante: faire des crêpes pour le déjeuner! Mais tout ne se	passe pas comme	prévu. La cuisine
            devient	un vrai	champ de bataille. Aide	Maya à réparer la situation	et à trouver une alternative simple.</p>
        </I>

        <ul>
            <?php foreach ($tachesPhase[3] as $tache): ?>
                <li><?= htmlspecialchars($tache['etape']) ?></li>
                <span class="<?= ($tache['etat'] == 'NON FAIT') ? 'non-fait' : 'fait' ?>">
                <?= htmlspecialchars($tache['etat']) ?>
                </span>
            <?php endforeach; ?>
        </ul>
        
        <p> <I>Après une matinée bien remplie, Maya	décide de profiter d’un	moment de détente. Un pique-nique est prévu, 
            mais quelques objets sont encore à trouver avant de	partir.	Et pourquoi	ne pas s’amuser	un peu avec son fidèle compagnon
            à quatre pattes ?	</p>
        </I>

        <ul>
            <?php foreach ($tachesPhase[4] as $tache): ?>
                <li><?= htmlspecialchars($tache['etape']) ?></li>
                <span class="<?= ($tache['etat'] == 'NON FAIT') ? 'non-fait' : 'fait' ?>">
                <?= htmlspecialchars($tache['etat']) ?>
                </span>
            <?php endforeach; ?>
        </ul>

        <p> <I>C’est le	moment pour	Maya de	se concentrer sur son travail. Elle	doit terminer ses projets et savoir quand 
            il est temps de	rentrer	chez elle. Aide-la à organiser sa journée.</p>
        </I>

        <ul>
            <?php foreach ($tachesPhase[5] as $tache): ?>
                <li><?= htmlspecialchars($tache['etape']) ?></li>
                <span class="<?= ($tache['etat'] == 'NON FAIT') ? 'non-fait' : 'fait' ?>">
                <?= htmlspecialchars($tache['etat']) ?>
                </span>
            <?php endforeach; ?>
        </ul>

        <p> <I>Pour finir cette	journée, Maya décide de	passer un moment au	grand air. Entre balade	avec son chien,
            cueillette de champignons et objets	perdus,	il y a beaucoup	à faire ! </p>
        </I>

        <ul>
            <?php foreach ($tachesPhase[6] as $tache): ?>
                <li><?= htmlspecialchars($tache['etape']) ?></li>
                <span class="<?= ($tache['etat'] == 'NON FAIT') ? 'non-fait' : 'fait' ?>">
                <?= htmlspecialchars($tache['etat']) ?>
                </span>
            <?php endforeach; ?>
        </ul>

    </div>
</div>


  <script src="Etapes.js"></script>

  </body>