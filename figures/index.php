<?php 

class Figure {
    public $name;
    public $angles;

    protected function __construct($name, $angles) {
        $this->name = $name;
        $this->angles = $angles;
    }
}

class Square extends Figure {
    public $AB;
    public $BC;
    public $CD;
    public $DA;

    public function __construct($AB, $BC, $CD, $DA) {
        parent::__construct('Квадрат', 4);

        if($AB !== $CD || $BC !== $DA) 
            throw new InvalidArgumentException("Противоположные стороны должны быть равны!");

        if(!is_numeric($AB) || !is_numeric($BC ) || !is_numeric($CD) || !is_numeric($DA)) 
            throw new InvalidArgumentException("Значения сторон должны быть числами!");
            
        if($AB < 0 || $BC < 0 || $CD < 0 || $DA < 0) 
            throw new InvalidArgumentException("Значения сторон должны быть положительными!");

        $this->AB = $AB;
        $this->BC = $BC;
        $this->CD = $CD;
        $this->DA = $DA;
    }

    public function GetPerimeter() {
        return ($this->AB + $this->BC) * 2;
    }

    public function GetArea() {
        return $this->AB * $this->BC;
    }
}

class Round extends Figure {

    public $radius;
    private $PI = 3.14;

    public function __construct($radius) {
        parent::__construct('Круг', 0);

        if(!is_numeric($radius)) 
            throw new InvalidArgumentException("Радиус должун быть числом!");
            
        if($radius < 0) 
            throw new InvalidArgumentException("Радиус должен быть положительным!");

        $this->radius = $radius;
    }

    public function GetPerimeter() {
        return 2 * $this->PI * $this->radius;
    }

    public function GetArea() {
        return $this->PI * $this->radius * $this->radius;
    }
}

try {
    $square = new Square(2, 4, 2, 4);
    echo "Периметр квадрата: " . $square->GetPerimeter() . '</br>';
    echo "Площадь квадрата: " . $square->GetArea() . '</br>';
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . '</br>';
}

try {
    $round = new Round(14);
    echo "Длина окружности круга: " . $round->GetPerimeter() . '</br>';
    echo "Площадь круга: " . $round->GetArea() . '</br>';
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . '</br>';
}
