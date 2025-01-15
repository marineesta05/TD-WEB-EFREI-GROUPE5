<?php

require_once 'bdd.php';

class UsersModel{

    private $bdd;
    public function __construct(){
        $this->bdd = Bdd::connexion();
    }
    public function inscription($username,  $email, $mdp){  
        $user = $this->bdd->prepare("INSERT INTO users(username, email, mdp) VALUES (?,?,?)");
        return $user->execute([$username, $email, $mdp ]);
        }

    }