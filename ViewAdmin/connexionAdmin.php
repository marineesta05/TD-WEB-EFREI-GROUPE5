<link rel="stylesheet" href="../ViewUser/auth/auth.css">
<h1>Connexion Admin</h1>
<form action="/index.php?page=connexionAdmin" method="POST" >
    Email :<input type="text" name="email" required>
    <br>
    Mot de passe :<input type="password" name="mdp" required>
    <br>
    <button type="submit">Se connecter</button>
    <p>Je suis <a href="/ViewUser/auth/connexion.php">user</a></p>
</form>

