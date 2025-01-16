<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="allusers.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.css"> 
</head>
<body> 
    <header>
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
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id_user']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['mdp']) ?></td>
                        <td>
                            <a href="index.php?page=Supusers&id=<?= htmlspecialchars($user['id_user']) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun utilisateur trouvé.</p>
    <?php endif; ?>
</body>
</html>
