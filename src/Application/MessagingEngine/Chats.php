<?php

namespace Application\MessagingEngine;

use DesignPattern\AbstractFactory\AbstractProducts;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Chats
 * @package Application\MessagingEngine
 */
abstract class Chats extends AbstractProducts
{
    /**
     * @var ArrayCollection
     */
    protected $chats;

    public function __construct(ArrayCollection $chats)
    {
        parent::__construct($chats);

        /**
         * lets alias now.
         */
        $this->chats = $chats;
        return $this;
    }

    /**
     * @param ChatInterface $chat
     * @return Chats
     */
    public function addChat(ChatInterface $chat)
    {
        return $this->addProduct($chat);
    }

    /**
     * @param ChatInterface $chat
     * @return bool
     */
    public function hasChat(ChatInterface $chat)
    {
        return $this->hasProduct($chat);
    }

    /**
     * @return ArrayCollection
     */
    public function getChats()
    {
        return $this->getProducts();
    }
}