<?php

namespace DesignPattern\Test\AbstractFactory;

use DesignPattern\AbstractFactory\AbstractFactory;
use DesignPattern\AbstractFactory\ProductInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class MockFactory
 * @package DesignPattern\Test\AbstractFactory
 */
class MockFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function canCreate($productClass)
    {
        /**
         * @var bool $verdict
         */
        $verdict = $productClass instanceof ProductInterface
            && $productClass instanceOf MockProductInterface
        ;
        return $verdict;
    }
}

class TestAbstractFactory extends TestCase
{

    public function testEmptyConstruction()
    {
        $factory = MockFactory::getInstance();
        assert ($factory instanceof MockFactory);
        assert ($factory instanceof AbstractFactory);
    }

    public function testNonEmptyConstruction()
    {
        /**
         * @var ProductNamesInterface $productNames
         */
        $productNames = new MockProduct1Names();
    }

}