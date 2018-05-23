<?php

namespace Application\AbstractFactory;

use DesignPattern\AbstractFactory\AbstractFactory;
use DesignPattern\AbstractFactory\AbstractProduct;
use DesignPattern\AbstractFactory\Exception\UnknownProductClassException;

abstract class AbstractProductFactory extends AbstractFactory
{
    /**
     * @return AbstractProduct
     * @throws UnknownProductClassException
     */
    abstract public function createProductA();

    /**
     * @return AbstractProduct
     * @throws UnknownProductClassException
     */
    abstract public function createProductB();
}
