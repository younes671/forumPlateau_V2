<?php
namespace Model\Entities;

use App\Entity;


final class Post extends Entity
{
    public function __construct($data){         
        $this->hydrate($data);        
    }
}