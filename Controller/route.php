<?php

require_once 'Controller/usersController.php';



$page = isset($_GET['page']) ? $_GET['page'] : 'inscription';

switch ($page) {
    case 'connexion':
        include_once 'Controller/usersController.php';
        $users = new UsersController;
        $users->connexion();
        break;

    case 'inscription':
        $users = new UsersController();
        $users->getFormInscription();
        break;

    case 'inscription_action':
        $users = new UsersController();
        $users->inscription();
        break;

    case 'deconnexion':
        session_destroy();
        header("Location: index.php?page=connexion");
        exit();

    default:
        include 'View/404.php';
        break;
}
