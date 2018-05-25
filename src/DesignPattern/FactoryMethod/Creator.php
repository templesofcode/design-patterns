<?php

namespace DesignPattern\FactoryMethod;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Creator
 * @package DesignPattern\FactoryMethod
 */
abstract class Creator
{
    /**
     * @var ArrayCollection|null
     */
    protected $products;

    /**
     * Make it chain-able
     *
     * Creator constructor.
     * @param ArrayCollection|null $products
     */
    protected function __construct(ArrayCollection $products = null)
    {
        if (is_null($products)) {
            $this->products = new ArrayCollection();
        } else {
            $this->products = $products;
        }
        return $this;
    }

    /**
     * @return Product
     */
    abstract protected function createProduct();

    /**
     * @param string $key
     * @return Product
     */
    public function newProduct($key)
    {
        if ($this->products->containsKey($key)) {
            return $this->products->get($key);
        }

        /**
         * @var Product $product
         */
        $product = $this->createProduct();

        $this->products->set($key, $product);

        return $product;
    }
}
