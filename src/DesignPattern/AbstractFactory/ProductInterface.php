<?php

namespace DesignPattern\AbstractFactory;

/**
 * Interface ProductInterface
 * @package DesignPattern\AbstractFactory
 */
interface ProductInterface
{
    /**
     * ProductInterface constructor.
     * @return $this
     */
    public function __construct();

    /**
     * @return ProductNameInterface
     */
    public static function getProductClass();
}