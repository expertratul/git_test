<?php

//static Method...........

class Father
{
    public $land = "I have 100 bighas of land";

    public function Bike(){
        echo "I have 1 Bike \n";
    }

    static function house(){
        echo "three house \n";
    }
}

class Son extends Father{
    // public function car()
    // {
    //     echo "I am Son and I have a car";
    // }
}

son::house();
Father::house();




