<?php

class Father {
    public $land = "I have 100 bighas of land";

    public function __construct() {    //construct
        echo " I am father and I have 5000 debt \n";
    }

    public function Bike() { //Parent keyword
        echo "I have 1 Bike \n";
    }

    public function sum() {  //Parent keyword
        return ( 10 + 20 );
    }
}

class Son extends Father {

    public function __construct() {   //construct
        echo "I am son and I have 10,00,000 debt \n";
        parent::__construct();
    }

    public function car() {   //construct
        echo "I am Son and I have a car";
    }

    public function moneyCalculation() {   //Parent keyword
        $sumResultFromFather = parent::sum();
        echo $sumResultFromFather * 34;
    }
}

//Parent keyword
$obj = new son();
$obj->moneyCalculation();
