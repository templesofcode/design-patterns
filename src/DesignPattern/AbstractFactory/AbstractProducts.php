<?php

namespace DesignPattern\AbstractFactory;


use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractProducts
 * @package DesignPattern\AbstractFactory
 */
abstract class AbstractProducts implements ProductsInterface
{
    /**
     * @var ProductInterface[]|ArrayCollection
     */
    protected $products;

    public function __construct(ArrayCollection $products)
    {
        $this->products = $products;
    }

    /**
     * @return ProductInterface[]|ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ProductInterface $product
     * @return bool
     */
    public function hasProduct(ProductInterface $product)
    {
        if ($this->products->contains($product)) {
            return true;
        }
        return false;
    }
}