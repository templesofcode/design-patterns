<?php

namespace Application\FactoryMethod;

use DesignPattern\FactoryMethod\Creator;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ConcreteCreator2
 * @package Application\FactoryMethod
 */
class ConcreteCreator2 extends Creator
{
    /**
     * ConcreteCreator2 constructor.
     * @param ArrayCollection|null $products
     */
    public function __construct(ArrayCollection $products = null)
    {
        parent::__construct($products);
        return $this;
    }

    /**
     * @return ConcreteProduct2|\DesignPattern\FactoryMethod\Product
     */
    protected function createProduct()
    {
        return new ConcreteProduct2();
    }
}