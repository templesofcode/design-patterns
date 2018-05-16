<?php

namespace Application\MessagingEngine;


use DesignPattern\AbstractFactory\AbstractFactory;
use DesignPattern\AbstractFactory\ProductInterface;

/**
 * Class MessagingEngineFactory
 * @package Application\MessagingEngine
 */
class MessagingEngineFactory extends AbstractFactory
{
    /**
     * @inheritDoc
     */
    public function canCreate($productClass)
    {
        $verdict = $productClass instanceof ProductInterface
            && $productClass instanceof MessagingEngine
        ;
        return $verdict;
    }

    /**
     * @param string $factoryClass
     * @return AbstractFactory
     */
    public static function getInstance($factoryClass = null)
    {
        if (is_null($factoryClass)) {
            $factoryClass = MessagingEngineFactory::class;
        }
        return parent::getInstance($factoryClass);
    }
}