<?php

class Father{

    public $land = "I have 100 bighas of land";

    public function Bike()
    {
        echo "I have 1 Bike \n";
    }
}


class Son extends Father{

    public function Bike()
    {
        echo "I sold the bike and made a house";
    }
}

$objSon = new Son();
$objSon->Bike();
