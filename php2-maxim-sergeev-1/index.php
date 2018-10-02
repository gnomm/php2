<?php

class Product
{
    public $id;
    public $name;
    public $shortDescription;
    public $price;

    public function __construct($id, $name, $shortDescription, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortDescription = $shortDescription;
        $this->price = $price;
    }

    protected function prepareId()
    {
        return $this->id;
    }

    protected function prepareName()
    {
        return $this->name;
    }

    protected function prepareShortDescription()
    {
        return $this->shortDescription;
    }

    protected function preparePrice()
    {
        return $this->price;
    }

    public function view()
    {
        echo $this->prepareId();
        echo $this->prepareName();
        echo $this->prepareShortDescription();
        echo $this->preparePrice();
    }
}


class NewProduct extends Product
{
    public $discount;

    public function __construct($id, $name, $shortDescription, $price, $discount)
    {
        parent::__construct($id, $name, $shortDescription, $price);
        $this->discount = $discount;
    }


    public function view()
    {
        parent::view();
        echo $this->prepareDiscount();
    }

    protected function prepareDiscount()
    {
        return $this->discount;
    }
}

$product1 = new Product('1 ', 'Платье ', 'Красивое ', '1500');
$product1->view();

echo "<br>";
$product2 = new NewProduct('2 ', 'Шорты ', 'Новые ', '500', ' Скидка 10%');
$product2->view();

//Задание №5
//
//class A { // создаем класс А
//    public function foo () { //создаем метод foo
//        static $x = 0; //объявляем статичную переменную x = 0
//        echo ++ $x . "<br>"; // выводим x (Префиксный инкремент)
//    }
//}
//$a1 = new A (); //создаем объект в переменной а1
//$a2 = new A (); //создаем объект в переменной а2
//$a1 -> foo (); // x = 1
//$a2 -> foo (); // x = 1 + $x = 1 + 1 = 2
//$a1 -> foo (); // x = 1 + $x = 1 + 2 = 3
//$a2 -> foo (); // x = 1 + $x = 1 + 3 = 4


//Задание №6
//
//class A { // создаем класс А
//    public function foo () { //создаем метод foo
//        static $x = 0; // объявляем статичную переменную x = 0
//        echo ++ $x; // выводим x (Префиксный инкремент)
//    }
//}
//class B extends A { // создаем класс B, наследуем от класса А
//}
//$a1 = new A (); //создаем объект в переменной а1
//$b1 = new B (); //создаем объект в переменной b1
//$a1 -> foo (); // x = 1
//$b1 -> foo (); // x = 1,  т.к  у нас создается для нового класса B
//$a1 -> foo (); // x = 1 + $x = 1 + 1 = 2
//$b1 -> foo (); // x = 1 + $x = 1 + 1 = 2


//Задание №7 аналогично Заданию №6, но там в $a1 = new A  и $a1 = new B запись без скобок. Можно писать со скобками
// или без, но рекомендуется использовать скобки.


