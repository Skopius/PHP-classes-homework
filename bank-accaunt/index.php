<?php
class BankAccount {

    protected $password;
    protected $currency;
    protected $debet;

    public function __construct($password) {
        $this->password = $password;
        $this->debet = 0;
        $this->currency = 'rub';
    }

    public function checkDebet() {
        return 'Средств на счете - ' . $this->debet . ' ' . $this->currency;
    }

    public function putMoney($money) {

        if(!is_numeric($money))
            return 'Сумма пополнения должна быть числом';

        if ($money <= 0) 
            return 'Минимальная сумма пополнения - 1 ' . $this->currency;
        
        $this->debet += $money;

        return 'Сумма ' . $money . ' была внесена';
    }

    public function getMoney($money, $password) {

        if(!is_numeric($money))
            return 'Сумма снятия должна быть числом';

        if($password !== $this->password)
            return 'Неверный пароль';

        if ($money <= 0) 
            return 'Минимальная сумма снятия - 1 ' . $this->currency;        

        if ($money >= $this->debet) 
            return 'На вашем счете недостаточно средств';
        
        $this->debet -= $money;

        return 'Сумма ' . $money . ' была снята';
    }
}

$bankAccount = new BankAccount('ttwq23Yc');

echo $bankAccount->putMoney(-100000);

echo '</br>';

echo $bankAccount->putMoney('test');

echo '</br>';

echo $bankAccount->checkDebet();

echo '</br>';

echo $bankAccount->getMoney(10000000, 'ttwq23Yc');

echo '</br>';