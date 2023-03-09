<?php
class User_model
{
    private $name = "Virlo Mahrian";
    private $profession = "Web Developer";

    public function getUser(){
        return $this->name;
    }

    public function getProfession(){
        return $this->profession;
    }
}
