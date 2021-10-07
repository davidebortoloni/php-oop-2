<?php

class User
{
    protected $name;
    protected $surname;
    protected $tax_number;
    protected $card;

    public function __construct($_name, $_surname, $_tax_number)
    {
        $this->name = $_name;
        $this->surname = $_surname;
        $this->tax_number = $_tax_number;
    }
    public function getFullName()
    {
        return $this->name . " " . $this->surname;
    }
    public function getTaxNumber()
    {
        return $this->tax_number;
    }
    public function getCard()
    {
        return $this->card;
    }
    public function setCard($c)
    {
        $this->card = $c->getType() . " - " . $c->getNumber() . " - " . $c->getExpiration();
    }
}

class Vip extends User
{
    protected $discount = 20;

    public function __construct($_name, $_surname, $_tax_number, $_discount)
    {
        parent::__construct($_name, $_surname, $_tax_number);
        $this->discount = $_discount;
    }
    public function getDiscount()
    {
        return $this->discount;
    }
    public function setDiscount($d)
    {
        $this->discount = $d;
    }
}

class Product
{
    protected $name;
    protected $price;
    protected $quantity = 1;

    public function __construct($_name, $_price, $_quantity)
    {
        $this->name = $_name;
        $this->price = $_price;
        $this->quantity = $_quantity;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
};

class Smartphone extends Product
{
    protected $brand;

    public function __construct($_name, $_price, $_quantity, $_brand)
    {
        parent::__construct($_name, $_price, $_quantity);
        $this->brand = $_brand;
    }
    public function getBrand()
    {
        return $this->brand;
    }
};

class Card
{
    protected $type;
    protected $number;
    protected $expiration;

    public function __construct($_type, $_number, $_expiration)
    {
        $this->type = $_type;
        $this->number = $_number;
        $this->expiration = $_expiration;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getNumber()
    {
        return $this->number;
    }
    public function getExpiration()
    {
        return $this->expiration;
    }
}

$user1 = new Vip("Leonardo", "DiCaprio", "DCPLRD74S11Z404H", 50);
$product1 = new Smartphone("Galaxy S20+", 599, 14, "Samsung");
$card1 = new Card("VISA", "4561 7892 2247 0144", "12/23");
$user1->setCard($card1);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
</head>

<body>
    <h1>E-Commerce</h1>
    <strong><?= $user1->getFullName(); ?></strong>
    <div>Codice fiscale: <?= $user1->getTaxNumber(); ?></div>
    <div>Sconto: <?= $user1->getDiscount(); ?>%</div>
    <div>Carta: <?= $user1->getCard(); ?></div>
    <br>
    <strong><?= $product1->getName(); ?></strong>
    <div>Marca: <?= $product1->getBrand(); ?></div>
    <div>Prezzo: <?= $product1->getPrice(); ?>€</div>
</body>

</html>