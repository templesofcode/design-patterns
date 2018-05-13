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
}