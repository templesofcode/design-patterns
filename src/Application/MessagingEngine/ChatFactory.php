<?php

namespace Application\MessagingEngine;

use DesignPattern\AbstractFactory\AbstractFactory;
use DesignPattern\AbstractFactory\ProductInterface;

/**
 * Class ChatFactory
 * @package Application\MessagingEngine
 */
class ChatFactory extends AbstractFactory
{
    /**
     * @param string $productClass
     * @return bool
     */
    public function canCreate($productClass)
    {
        $verdict = $productClass instanceof ProductInterface
            && $productClass instanceof ChatInterface
        ;
        return $verdict;
    }

    /**
     * Proxy class to parent method
     * @param string|null $factoryClass
     * @return ChatFactory|AbstractFactory
     */
    public static function getInstance($factoryClass = null)
    {
        if (is_null($factoryClass)) {
            $factoryClass = ChatFactory::class;
        }
        return parent::getInstance($factoryClass);
    }
}