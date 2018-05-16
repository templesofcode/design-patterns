<?php

namespace Application\MessagingEngine;

use DesignPattern\AbstractFactory\AbstractFactory;
use DesignPattern\AbstractFactory\ProductInterface;

/**
 * Class ParticipantsFactory
 * @package Application\MessagingEngine
 */
class ParticipantsFactory extends AbstractFactory
{
    /**
     * @param string $productClass
     * @return bool
     */
    public function canCreate($productClass)
    {
        $verdict = $productClass instanceof ProductInterface
            && $productClass instanceof Participants
        ;
        return $verdict;
    }

    /**
     * Proxy class to parent method
     * @param string|null $factoryClass
     * @return ParticipantsFactory|AbstractFactory
     */
    public static function getInstance($factoryClass = null)
    {
        if (is_null($factoryClass)) {
            $factoryClass = ParticipantsFactory::class;
        }
        return parent::getInstance($factoryClass);
    }
}