<?php

namespace DesignPattern\AbstractFactory;

use Doctrine\Common\Collections\ArrayCollection;

interface ProductsInterface
{
    public function __construct(ArrayCollection $products);
}