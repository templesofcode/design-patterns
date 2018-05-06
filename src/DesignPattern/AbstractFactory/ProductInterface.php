<?php

namespace DesignPattern\AbstractFactory;


interface ProductInterface
{
    /**
     * ProductInterface constructor.
     * @param string $name
     */
    public function __construct($name);

    /**
     * @return string
     */
    public function getName();
}