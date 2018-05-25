<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Application\AbstractFactory\Factory\ConcreteFactory1;
use Application\AbstractFactory\Factory\ConcreteFactory2;
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

    public function run()
    {
        try {

            /**
             * @var AbstractProductA
             */
            $productA = $this->factory->createProductA();
        } catch (UnknownProductClassException $e) {
            print sprintf(
                "Exception message: %s",
                $e->getMessage()
            );
            return 1;
        }



        try {
            /**
             * @var AbstractProductB
             */
            $productB = $this->factory->createProductB();
        } catch (UnknownProductClassException $e) {
            print sprintf(
                "Eexception message: %s",
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
$client->run();

/**
 * @var AbstractProductFactory $factory2
 */
$factory2 = ConcreteFactory2::getInstance(ConcreteFactory2::class);
$client = new AbstractFactoryClient($factory2);
$client->run();
