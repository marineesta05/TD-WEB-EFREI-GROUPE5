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
        include 'ViewUser/auth/inscription.php';
    }

    public function inscription()
    {
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['mdp'])) {
            $username = htmlspecialchars(trim($_POST['username']));
            $email = htmlspecialchars(trim($_POST['email']));
            $mdp = $_POST['mdp'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Adresse e-mail invalide.";
                include 'ViewUser/auth/inscription.php';
                return;
            }

            if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $mdp)) {
                $error = "Le mot de passe doit contenir au moins 8 caractères, incluant une lettre, un chiffre et un symbole.";
                include 'ViewUser/auth/inscription.php';
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
                include 'ViewUser/auth/inscription.php';
            }
        } else {
            echo "Champs vides.";
            $error = "Veuillez remplir tous les champs.";
            include 'ViewUser/auth/inscription.php';
        }
    }

    public function getFormConnexion()
    {
        include 'ViewUser/auth/connexion.php';
    }

    public function connexion()
    {
        if (isset($_POST['email']) && isset($_POST['mdp'])) {;
            $email = $_POST['email'];
            $user = $this->model->getUserByMail($email);

            if ($user) {
                if (password_verify($_POST['mdp'], $user['mdp'])) {
                    session_start();
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["username"] = $user["username"];
                    header("Location: /ViewUser/game/regles/regledujeu.php");
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

    public function connexionAdmin()
    {
        if (isset($_POST['email']) && isset($_POST['mdp'])) {
            $email = $_POST['email'];
            $userAd = $this->model->getAdminByMail($email);
            if ($userAd && password_verify($_POST['mdp'], $userAd['mdp'])) {
                session_start();
                $_SESSION['username'] = $userAd["username"];
                header("Location: index.php?page=allusers");
                exit();
            } else {
                echo "Vous ne pouvez pas vous connecter. Vous n'etes pas un admin.";
                $this->getFormConnexion();
            }
        } else {
            $this->getFormConnexion();
        }
    }

    public function showAllUsers()
    {
        $users = $this->model->getAllUsers();
        include 'ViewAdmin/allusers.php'; 
    }

    public function SuppUsers($id)
    {
        $users = $this->model->deleteUser($id);
        include 'ViewAdmin/allusers.php'; 
    }
}