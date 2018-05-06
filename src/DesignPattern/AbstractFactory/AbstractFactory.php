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
     * @param ProductsInterface $p
     * @return
     */
    public static abstract function create(ProductsInterface $p);
}