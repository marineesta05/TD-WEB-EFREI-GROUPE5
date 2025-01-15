<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <header>
    <nav>
        <ul>
            <?php echo "Bienvenue, " . $_SESSION['username'] . " ! <br>";?>
            <li><a href="index.php?page=deconnexion">Déconnexion</a></li> 
        </ul>
    </nav>
    </header>
    <h1>Liste des utilisateurs</h1>
        <?php if (!empty($users)): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Nom</th>
                        <th>Mot de passe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id_user']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['mdp']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    <?php else: ?>
        <p>Aucun utilisateur trouvé.</p>
    <?php endif; ?>