<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct(){
        parent::connect();
    }

    public function findUserById($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName."  
                WHERE id_user = :id";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id], false), 
            $this->className
        );
    }

    

    // méthode finduserbyemail retourne l'email de l'utilisateur

    public function findUserByEmail($email)
    {
        $sql = "SELECT * 
        FROM ".$this->tableName."  
        WHERE email = :email";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false), 
            $this->className
        );
    }

    // crée un nouveau utilisateur
    
    public function createUser($newUser)
    {
        return $this->add($newUser);
    }

    public function findUserPassword($pass)
    {
        $sql = "SELECT * 
        FROM ".$this->tableName."  
        WHERE email = :email";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $pass], false), 
            $this->className
        );
    }
}