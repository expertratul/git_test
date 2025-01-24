<?php

abstract class Father{
    
    public $land = "I have 100 bighas of land";

    public function Bike()
    {
        echo "I have a Bike \n";
    }
}


class Son extends Father{

    public function car()
    {
        echo "I am Son and I have a car";
    }
}

// $objFather = new Father();
// $objFather->Bike();

$objSon = new Son();
$objSon->Bike();
