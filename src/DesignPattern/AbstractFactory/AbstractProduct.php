<?php


namespace DesignPattern\AbstractFactory;

/**
 * Class AbstractProduct
 * @package DesignPattern\AbstractFactory
 */
abstract class AbstractProduct implements ProductInterface
{
    /**
     * AbstractProduct constructor.
     * @return $this
     */
    public function __construct()
    {
        return $this;
    }
}