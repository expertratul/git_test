<?php

class Car
{
    public $onion = 5;

    static public function helloCar()
    {
        echo "i am car";
    }
}

// $obj = new car();
// echo $obj->onion;

car::helloCar();


