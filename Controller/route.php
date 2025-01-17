<?php

require_once 'Controller/usersController.php';



$page = isset($_GET['page']) ? $_GET['page'] : 'inscription';

switch ($page) {

    case 'inscription':
        $users = new UsersController();
        $users->getFormInscription();
        break;

    case 'inscription_action':
        $users = new UsersController();
        $users->inscription();
        break;

    case 'connexion':
        include_once 'controller/usersController.php';
        $users = new UsersController;
        $users->connexion();
        break;

    case 'connexionAdmin':
        include_once 'Controller/usersController.php';
        $users = new UsersController;
        $users->connexionAdmin();
        break;
        

    case 'deconnexion':
        session_destroy();
        header("Location: index.php?page=connexion");
        exit();

    case 'allusers':
        include_once 'Controller/usersController.php';
        $users = new UsersController();
        $users->showAllUsers();
        break;
    
    case 'Supusers':
        if (isset($_GET['id'])) { 
            $id = $_GET['id']; 
            include_once 'Controller/usersController.php';
            $users = new UsersController();
            $users->SuppUsers($id); 
        } else {
            echo "ID manquant pour la suppression de l'utilisateur.";
        }
        break;

    case 'fait':
        include_once 'Controller/tachesController.php';
        $users = new TachesController();
        $users->updateTacheEtat($_GET['idTache']);
        break;
        
        
    default:
        include 'ViewUser/404.php';
        break;
}
