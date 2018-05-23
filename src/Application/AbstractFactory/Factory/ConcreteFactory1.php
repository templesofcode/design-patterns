<?php

namespace Application\AbstractFactory\Factory;

use Application\AbstractFactory\AbstractProductFactory;
use DesignPattern\AbstractFactory\Exception\UnknownProductClassException;
use Application\AbstractFactory\ProductA\ProductA1;
use Application\AbstractFactory\ProductB\ProductB1;

class ConcreteFactory1 extends AbstractProductFactory
{
    /**
     *{@inheritdoc}
     */
    public function canCreate($productClass)
    {
        $list = [
            'Application\AbstractFactory\ProductA\ProductA1',
            'Application\AbstractFactory\ProductB\ProductB1'
        ];
        return in_array($productClass, $list);
    }

    /**
     * @return \DesignPattern\AbstractFactory\ProductInterface
     * @throws UnknownProductClassException
     */
    public function createProductA()
    {
        try {

            return $this->create(ProductA1::class);
        }  catch (UnknownProductClassException $e) {
            // re-throw for now
            throw $e;
        }
    }

    /**
     * @return \DesignPattern\AbstractFactory\AbstractProduct|\DesignPattern\AbstractFactory\ProductInterface
     * @throws UnknownProductClassException
     */
    public function createProductB()
    {
        try {

            return $this->create(ProductB1::class);
        }  catch (UnknownProductClassException $e) {
            // re-throw for now
            throw $e;
        }

    }
}
