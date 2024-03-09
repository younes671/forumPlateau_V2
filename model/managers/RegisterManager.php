<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class RegisterManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $tableName = "user";

    public function __construct(){
        parent::connect();
    }
}