<?php

namespace Application\MessagingEngine;


use DesignPattern\AbstractFactory\AbstractProduct;

/**
 * Class Participant
 * @package Application\MessagingEngine
 */
class Participant extends AbstractProduct
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Participant constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}