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
        include 'ViewUser/inscription.php';
    }

    public function inscription()
    {
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['mdp'])) {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        

            if ($this->model->inscription($username, $email, $mdp)) {
                echo "Insertion réussie";
                header("Location: index.php?page=connexion");
                exit();
            } else {
                echo "Échec de l'insertion.";
                $error = "Erreur lors de l'inscription. Veuillez réessayer.";
                include 'View/inscription.php';
            }
        } else {
            echo "Champs vides.";
            $error = "Veuillez remplir tous les champs.";
            include 'ViewUser/inscription.php';
        }
    }

    public function getFormConnexion()
    {
        include 'ViewUser/connexion.php';
    }

    public function connexion()
    {
        if (isset($_POST['email']) && isset($_POST['mdp'])) {
            $email = $_POST['email'];
            $user = $this->model->getUserByMail($email);
            if ($user && password_verify($_POST['mdp'], $user['mdp'])) {
                $_SESSION["email"] = $user["email"];
                header("Location: index.php?page=inscription");
                exit();
            } else {
                echo "Erreur de connexion.";
                $this->getFormConnexion();
            }
        } else {
            $this->getFormConnexion();
        }
    }

    public function connexionAdmin()
    {
        if (isset($_POST['email']) && isset($_POST['mdp'])) {
            $email = $_POST['email'];
            $user = $this->model->getAdminByMail($email);
            if ($user && password_verify($_POST['mdp'], $user['mdp'])) {
                $_SESSION["email"] = $user["email"];
                header("Location: index.php?page=allusers");
                exit();
            } else {
                echo "Erreur de connexion.";
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

}