<?php

namespace Application\MessagingEngine;

use DesignPattern\AbstractFactory\AbstractFactory;
use DesignPattern\AbstractFactory\ProductInterface;

/**
 * Class ChatComponentsFactory
 * @package Application\MessagingEngine
 */
class ChatComponentsFactory extends AbstractFactory
{
    /**
     * @param string $productClass
     * @return bool
     */
    public function canCreate($productClass)
    {
        $verdict = $productClass instanceof ProductInterface
            && $productClass instanceof ChatComponents
        ;
        return $verdict;
    }


    /**
     * Proxy class to parent method
     * @param string|null $factoryClass
     * @return ChatComponentsFactory|AbstractFactory
     */
    public static function getInstance($factoryClass = null)
    {
        if (is_null($factoryClass)) {
            $factoryClass = ChatComponentsFactory::class;
        }
        return parent::getInstance($factoryClass);
    }
}