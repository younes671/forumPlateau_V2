<?php
namespace Model\Entities;

use App\Entity;
use DateTime;

final class Post extends Entity
{
    private $text;
    private $dateCreation;
    private $topic;
    private $user;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    public function getText()
    {
        return $this->text;
    }

    public function getTopic()
    {
        return $this->topic;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setTopic($topic)
    {
        return $this->topic = $topic;
    }

    public function setUser($user)
    {
        return $this->user = $user;
    }

    public function getDateCreation()
    {
       return $this->dateCreation;
    }

    public function setText($text)
    {
        return $this->text = $text;
    }

    public function setDateCreation($dateCreation)
    {
        return $this->dateCreation = $dateCreation;
    }

    public function __toString(){
        return $this->text;
    }
}