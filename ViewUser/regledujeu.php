<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'Utilisateur'; 
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Règles du jeu</title>
    <link rel="stylesheet" href="../style.css">

</head>
<body x-data="gameHandler()">
    <header>
        <nav>
            <ul>
                <li>Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?> !</li>
                <li>
                    <a href="?logout=true">Se déconnecter</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="regles" x-show="currentSection === 'regles'">
            <h1>Règles du Jeu</h1>
            <p>
                Bienvenue dans le jeu ! Votre mission est d'aider Maya à accomplir ses tâches. 
                Chaque étape vous demandera de trouver des objets ou de résoudre des énigmes. 
                Prenez votre temps, réfléchissez bien, et amusez-vous !
            </p>
            <button @click="goToGame()">Commencer le jeu</button>
        </section>

        <section id="game" x-show="currentSection === 'game'" style="display: none;">
            <h1>Bienvenue dans le Jeu</h1>
            <p>Aidez Maya à accomplir ses tâches et progressez dans le jeu !</p>
            <button onclick="alert('Bonne chance dans votre quête !')">Commencer une tâche</button>
        </section>
    </main>
</body>
<script type="module" src="main.js" defer></script>
</html>
