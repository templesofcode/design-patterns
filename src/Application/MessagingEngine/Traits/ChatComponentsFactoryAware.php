<?php

namespace Application\MessagingEngine\Traits;

use Application\MessagingEngine\ChatComponentsFactory;

trait ChatComponentsFactoryAware
{
    /**
     * @var ChatComponentsFactory
     */
    protected $chatComponentsFactory = null;

    /**
     * @return ChatComponentsFactory|\DesignPattern\AbstractFactory\AbstractFactory
     */
    public function getChatComponentsFactory()
    {
        if (is_null($this->chatComponentsFactory)) {
            $this->chatComponentsFactory = ChatComponentsFactory::getInstance();
        }

        return $this->chatComponentsFactory;
    }
}