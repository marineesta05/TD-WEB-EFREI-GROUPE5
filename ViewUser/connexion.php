<link rel="stylesheet" href="/auth.css">
<h1>Connexion</h1>
<form action="/index.php?page=connexion" method="POST" >
    Email :<input type="email" name="email" required>
    <br>
    Mot de passe :<input type="password" name="mdp" required>
    <br>
    <button type="submit">Se connecter</button>
    <p>Toujours pas inscrit? <a href="/ViewUser/inscription.php">S'inscrire</a></p>
    <p>Je suis <a href="/ViewAdmin/connexionAdmin.php">admin</a></p>
</form>

