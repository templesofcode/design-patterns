<?php

namespace DesignPattern\AbstractFactory;
use DesignPattern\ClientInterface;
use DesignPattern\DesignPatternInterface;


/**
 * Class Client
 * @package DesignPattern\AbstractFactory
 */
class AbstractFactoryClient implements ClientInterface
{
    /**
     * @var DesignPatternInterface
     */
    protected $designPattern;

    /**
     * AbstractFactoryClient constructor.
     * @param DesignPatternInterface $designPattern
     */
    public function __construct(DesignPatternInterface $designPattern)
    {
        $this->designPattern = $designPattern;
    }

    /**
     * @return DesignPatternInterface
     */
    public function getDesignPattern()
    {
        return $this->designPattern;
    }



}