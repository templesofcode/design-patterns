<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DesignPattern\FactoryMethod\Creator;
use Application\FactoryMethod\ConcreteCreator;
use Application\FactoryMethod\ConcreteCreator2;
use DesignPattern\FactoryMethod\Product;

/**
 * Class FactoryMethodClient
 */
class FactoryMethodClient
{
    /**
     * @var Creator
     */
    protected $creator;

    /**
     * FactoryMethodClient constructor.
     * @param Creator $c
     * @return $this
     */
    public function __construct(Creator $c)
    {
        $this->creator = $c;
        return $this;
    }

    public function run()
    {
        /**
         * @var Product $product1
         */
        $product1 = $this->creator->newProduct('id1');

        print sprintf(
            "product1 type generated from factory method: %s\n",
            get_class($product1)
        );
    }
}

$creator = new ConcreteCreator();
$client = new FactoryMethodClient($creator);
$client->run();
$creator = new ConcreteCreator2();
$client = new FactoryMethodClient($creator);
$client->run();