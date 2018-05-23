<?php

namespace DesignPattern\AbstractFactory;

use Doctrine\Common\Collections\ArrayCollection;
//use DesignPattern\AbstractFactory\ProductInterface;

interface ProductsInterface
{
    /**
     * ProductsInterface constructor.
     * @param ArrayCollection $products
     * @return $this
     */
    public function __construct(ArrayCollection $products);

    /**
     * @param ProductInterface $product
     * @return $this
     */
    public function addProduct(ProductInterface $product);

    /**
     * @param string $key
     * @param ProductInterface $product
     * @return mixed
     */
    public function setProduct($key, ProductInterface $product);

    /**
     * @param ProductInterface $product
     * @return bool
     */
    public function hasProduct(ProductInterface $product);

    /**
     * @return ArrayCollection
     */
    public function getProducts();
}