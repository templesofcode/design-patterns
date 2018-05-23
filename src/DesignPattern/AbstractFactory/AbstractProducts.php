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
     * @var ArrayCollection
     */
    protected $products;

    /**
     * {@inheritdoc}
     */
    public function __construct(ArrayCollection $products = null)
    {
        if (is_null($products)) {
            $this->products = new ArrayCollection();
        } else {
            $this->products = $products;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addProduct(ProductInterface $product)
    {
        if ($this->products->contains($product)) {
            return $this;
        }
        $this->products->add($product);
        return $this;
    }

    public function setProduct($key, ProductInterface $product)
    {
        if ($this->products->containsKey($key)) {
            return $this;
        }
        $this->products->set($key, $product);
    }

    /**
     * {@inheritdoc}
     */
    public function hasProduct(ProductInterface $product)
    {
        if ($this->products->contains($product)) {
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getProducts()
    {
        return $this->products;
    }

}