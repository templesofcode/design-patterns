<?php

namespace DesignPattern\AbstractFactory;

/**
 * Key observations:
 * - making the class abstract prevents and instantiation of it.
 *
 */
abstract class AbstractFactory
{

    /**
     * AbstractFactory constructor.
     */
    public function __construct()
    {
        return $this;
    }

    /**
     * @param string $productClass
     * @return bool
     */
    abstract public function canCreate($productClass);

    /**
     * @param string $productClass
     * @return ProductInterface
     */
    abstract public function create($productClass);

    /**
     * @return AbstractFactory
     */
    abstract public static function getInstance();
}