<?php

namespace Application\AbstractFactory\Factory;

use Application\AbstractFactory\AbstractProductFactory;
use DesignPattern\AbstractFactory\Exception\UnknownProductClassException;
use DesignPattern\AbstractFactory\ProductInterface;
use Application\AbstractFactory\ProductA\ProductA2;
use Application\AbstractFactory\ProductB\ProductB2;

class ConcreteFactory2 extends AbstractProductFactory
{
    /**
     *{@inheritdoc}
     */
    public function canCreate($productClass)
    {
        $list = [
            'Application\AbstractFactory\ProductA\ProductA2',
            'Application\AbstractFactory\ProductB\ProductB2'
        ];
        return in_array($productClass, $list);
    }

    /**
     * @return ProductInterface
     * @throws UnknownProductClassException

     */
    public function createProductA()
    {
        try {

            return $this->create(ProductA2::class);
        }  catch (UnknownProductClassException $e) {
            // re-throw for now
            throw $e;
        }
    }

    /**
     * @return ProductInterface
     * @throws UnknownProductClassException
     */
    public function createProductB()
    {
        try {

            return $this->create(ProductB2::class);
        }  catch (UnknownProductClassException $e) {
            // re-throw for now
            throw $e;
        }

    }
}
