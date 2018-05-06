<?php


namespace DesignPattern\AbstractFactory;

/**
 * Class AbstractProduct
 * @package DesignPattern\AbstractFactory
 */
abstract class AbstractProduct implements ProductInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * AbstractProduct constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}