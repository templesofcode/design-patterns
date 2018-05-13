<?php

namespace Application\MessagingEngine;


use DesignPattern\AbstractFactory\AbstractFactory;
use DesignPattern\AbstractFactory\ProductInterface;

/**
 * Class ParticipantFactory
 * @package Application\MessagingEngine
 */
class ParticipantFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function canCreate($productClass)
    {
        /**
         * @var bool $verdict
         *
         */
        $verdict = $productClass instanceof ProductInterface
            && $productClass instanceof Participant
        ;
        return $verdict;
    }

}