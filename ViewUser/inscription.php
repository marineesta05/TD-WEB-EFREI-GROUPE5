<link rel="stylesheet" href="/auth.css">
<h1>Inscription</h1>
<form action="/index.php?page=inscription_action" method="POST"> 
    Username : <input type="text" name="username" required><br>
    Email : <input type="email" name="email" required><br>
    Mot de passe : <input type="password" name="mdp" required><br>
    <button type="submit">S'inscrire</button><br>
    <p>Vous avez déjà un compte ? <a href="/ViewUser/connexion.php">Se connecter</a></p>
</form>