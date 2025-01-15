<?php
include_once 'Model/usersModel.php';

class UsersController
{

    private $model;

    public function __construct()
    {
        $this->model = new UsersModel;
    }


    public function getFormInscription()
    {
        include 'View/inscription.php';
    }

    public function inscription()
    {
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['mdp'])) {
            $username = htmlspecialchars(trim($_POST['username']));
            $email = htmlspecialchars(trim($_POST['email']));
            $mdp = $_POST['mdp'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Adresse e-mail invalide.";
                include 'View/inscription.php';
                return;
            }

            if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $mdp)) {
                $error = "Le mot de passe doit contenir au moins 8 caractères, incluant une lettre, un chiffre et un symbole.";
                include 'View/inscription.php';
                return;
            }

            $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

            if ($this->model->inscription($username, $email, $hashedPassword)) {
                echo "Insertion réussie";
                header("Location: index.php?page=connexion");
                exit();
            } else {
                echo "Échec de l'insertion.";
                $error = "Erreur lors de l'inscription. Cet e-mail est peut-être déjà utilisé.";
                include 'View/inscription.php';
            }
        } else {
            echo "Champs vides.";
            $error = "Veuillez remplir tous les champs.";
            include 'View/inscription.php';
        }
    }

    public function getFormConnexion()
    {
        include 'view/connexion.php';
    }

    public function connexion()
    {
        if (isset($_POST['email']) && isset($_POST['mdp'])) {;
            $email = $_POST['email'];
            $user = $this->model->getUserByMail($email);

            if ($user) {
                if (password_verify($_POST['mdp'], $user['mdp'])) {
                    $_SESSION["email"] = $user["email"];
                    header("Location: index.php?page=inscription");
                    exit();
                } else {
                    echo "Le mot de passe est incorrect.";
                }
            } else {
                echo "Aucun utilisateur trouvé avec cette adresse e-mail.";
            }
            $this->getFormConnexion();
        } else {  
            $this->getFormConnexion();
        }
    }
}