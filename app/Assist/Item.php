<?php
namespace App\Assist;

class Item{
    public $name,$urn,$list;
    public function __construct($name, $urn, $list = []){
        $this->name = $name;
        $this->urn = $urn;
        $this->list = $list;
    }
}