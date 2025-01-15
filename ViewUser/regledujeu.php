<?php
include 'headerUser.php';
?>

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
