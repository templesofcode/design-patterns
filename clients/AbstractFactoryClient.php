<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Application\AbstractFactory\Factory\ConcreteFactory1;
use Application\AbstractFactory\Factory\ConcreteFactory2;
use Application\AbstractFactory\ProductA\ProductA1;
use Application\AbstractFactory\ProductB\ProductB1;
use Application\AbstractFactory\ProductA\ProductA2;
use Application\AbstractFactory\ProductB\ProductB2;
use Application\AbstractFactory\AbstractProductFactory;
use DesignPattern\AbstractFactory\Exception\UnknownProductClassException;
use Application\AbstractFactory\AbstractProductA;
use Application\AbstractFactory\AbstractProductB;


class AbstractFactoryClient
{
    /**
     * @var AbstractProductFactory $factory
     */
    protected $factory;

    /**
     * Client constructor.
     * @param AbstractProductFactory $f
     */
    public function __construct(AbstractProductFactory $f)
    {
        $this->factory = $f;
    }

    public function run($productAClass, $productBClass)
    {
        try {

            /**
             * @var AbstractProductA
             */
            $productA = $this->factory->create($productAClass);
        } catch (UnknownProductClassException $e) {
            print sprintf(
                "An error occured while creating product %s, exception message: %s",
                ProductA1::class,
                $e->getMessage()
            );
            return 1;
        }



        try {
            /**
             * @var AbstractProductB
             */
            $productB = $this->factory->create($productBClass);
        } catch (UnknownProductClassException $e) {
            print sprintf(
                "An error occured while creating product %s, exception message: %s",
                ProductB1::class,
                $e->getMessage()
            );
            return 1;
        }

        print "Product A: ".get_clasS($productA)."\n";
        print "Product B: ".get_class($productB)."\n";

        return 0;
    }
}

/**
 * @var AbstractProductFactory $factory
 */
$factory = ConcreteFactory1::getInstance(ConcreteFactory1::class);

$client = new AbstractFactoryClient($factory);
$client->run(ProductA1::class, ProductB1::class);

/**
 * @var AbstractProductFactory $factory2
 */
$factory2 = ConcreteFactory2::getInstance(ConcreteFactory2::class);
$client = new AbstractFactoryClient($factory2);
$client->run(ProductA2::class, ProductB2::class);