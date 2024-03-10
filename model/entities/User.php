<?php
namespace Model\Entities;

use App\Entity;
use DateTime;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class User extends Entity{

    private $id;
    private $userName;
    private $email;
    private $motDePasse;
    private $dateRegistration;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of nickName
     */ 
    public function getUserName(){
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */ 
    public function setUserName($userName){
        $this->userName = $userName;

        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getMotDePasse(){
        return $this->motDePasse;
    }

    public function getDateRegistration(){
       return $this->dateRegistration;
    }

    public function setEmail($email){
        return $this->email = $email;
    }

    public function setMotDePasse($motDePasse){
        return $this->motDePasse = $motDePasse;
    }

    public function setDateRegistration($dateRegistration){
        return $this->dateRegistration = $dateRegistration;
    }

    public function __toString() {
        return $this->userName;
    }
}