<?php

namespace Application\MessagingEngine\Traits;

use Application\MessagingEngine\ChatComponentFactory;

trait ChatComponentFactoryAware
{
    /**
     * @var ChatComponentFactory
     */
    protected $chatComponentFactory = null;

    /**
     * @return ChatComponentFactory|\DesignPattern\AbstractFactory\AbstractFactory
     */
    public function getChatComponentFactory()
    {
        if (is_null($this->chatComponentFactory)) {
            $this->chatComponentFactory = ChatComponentFactory::getInstance();
        }

        return $this->chatComponentFactory;
    }
}