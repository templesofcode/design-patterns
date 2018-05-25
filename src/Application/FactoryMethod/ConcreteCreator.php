<?php

namespace Application\FactoryMethod;


use DesignPattern\FactoryMethod\Creator;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ConcreteCreator
 * @package Application\FactoryMethod
 */
class ConcreteCreator extends Creator
{
    /**
     * ConcreteCreator constructor.
     * @param ArrayCollection|null $products
     */
    public function __construct(ArrayCollection $products = null)
    {
        parent::__construct($products);
        return $this;
    }

    /**
     * @return ConcreteProduct|\DesignPattern\FactoryMethod\Product
     */
    protected function createProduct()
    {
        return new ConcreteProduct();
    }
}