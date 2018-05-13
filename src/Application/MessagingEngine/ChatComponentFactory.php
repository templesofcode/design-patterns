<?php

namespace Application\MessagingEngine;


use DesignPattern\AbstractFactory\AbstractFactory;
use DesignPattern\AbstractFactory\ProductInterface;

/**
 * Class ChatComponentFactory
 * @package Application\MessagingEngine
 */
class ChatComponentFactory extends AbstractFactory
{
    /**
     * @param string $productClass
     * @return bool
     */
    public function canCreate($productClass)
    {
        $verdict = $productClass instanceof ProductInterface
            && $productClass instanceof ChatComponent
        ;
        return $verdict;
    }
}