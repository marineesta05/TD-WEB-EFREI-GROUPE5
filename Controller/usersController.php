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
            include 'View/inscription.php';
        }
    }



    public function getFormConnexion()
    {
        include 'view/connexion.php';
    }

    public function connexion()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $user = $this->model->getUserByMail($email);

            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION["email"] = $user["email"];
                echo "Connexion réussie !";
                header("inscription.php");
                exit();
            } else {
                echo "Erreur de connexion.";
                $this->getFormConnexion();
            }
        } else {
            $this->getFormConnexion();
        }
    }

}