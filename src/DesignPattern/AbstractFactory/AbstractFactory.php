<?php

namespace DesignPattern\AbstractFactory;

use DesignPattern\AbstractFactory\Exception\UnknownProductClassException;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Key observations:
 * - making the class abstract prevents and instantiation of it.
 *
 */
abstract class AbstractFactory
{
    /**
     * @var ArrayCollection|AbstractFactory[]
     */
    protected static $factories;

    /**
     * AbstractFactory constructor.
     */
    protected function __construct()
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
     * @return \DesignPattern\AbstractFactory\ProductInterface
     * @throws UnknownProductClassException
     */
    public function create($productClass)
    {
        if (!$this->canCreate($productClass)) {
            throw new UnknownProductClassException(sprintf(
                'Unknown class %s',
                $productClass
            ));
        }

        /**
         * @var ProductInterface $product
         */
        $product = new $productClass();
        return $product;
    }

    /**
     * The factory method that produces singleton factories. These
     * factories then produce non-singleton product classes (type ProductInterface).
     *
     * @param string $factoryClass
     * @return AbstractFactory
     */
    public static function getInstance($factoryClass)
    {
        if (!isset(static::$factories)) {
            static::$factories = new ArrayCollection();
        }

        /**
         * Check the registry.
         *
         * @var bool $keyExists
         */
        $keyExists = static::$factories->containsKey($factoryClass);
        if ($keyExists) {
            return static::$factories->get($factoryClass);
        }

        /**
         * @var AbstractFactory $factory
         */
        $factory = new $factoryClass();
        static::$factories->set($factoryClass, $factory);
        return $factory;
    }

}