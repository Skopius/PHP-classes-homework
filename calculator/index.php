<?php

class Calculator {

    public function Summ($x, $y) {
        return $x + $y;
    }
    public function Subtraction($x, $y) {
        return $x - $y;
    }
    public function Multiply($x, $y) {
        return $x * $y;
    }
    public function Devide($x, $y) {
        if ($y != 0) {
            return $x / $y;
        } else {
            return "Деление на ноль невозможно!";
        }
    }
    public function Power($x, $y) {
        $result = 1;
        for ($i=0; $i < $y; $i++) { 
            $result *= $x ;
        }
        return $result;
    }

}

$calculator = new Calculator;


echo $calculator->Summ(1, 5);
echo '</br>';
echo $calculator->Subtraction(1, 5);
echo '</br>';
echo $calculator->Multiply(3, 5);
echo '</br>';
echo $calculator->Devide(5, 0);
echo '</br>';
echo $calculator->Power(2, 6);