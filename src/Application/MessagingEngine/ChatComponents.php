<?php

namespace Application\MessagingEngine;
use DesignPattern\AbstractFactory\AbstractProducts;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ChatComponents
 * @package Application\MessagingEngine
 */
abstract class ChatComponents extends AbstractProducts
{
    /**
     * Only an alias.
     *
     * @var ArrayCollection
     */
    protected $chatComponents;

    /**
     * ChatComponents constructor.
     * @param ArrayCollection|null $chatComponents
     */
    public function __construct(ArrayCollection $chatComponents = null)
    {
        parent::__construct($chatComponents);

        /**
         * lets alias now.
         */
        $this->chatComponents = $this->products;

        return $this;
    }

    /**
     * Alias function.
     *
     * @param ChatComponent $c
     * @return ChatComponents
     */
    public function addChatComponent(ChatComponent $c)
    {
        return $this->addProduct($c);
    }

    /**
     * Alias function.
     *
     * @param ChatComponent $c
     * @return bool
     */
    public function hasChatComponent(ChatComponent $c)
    {
        return $this->hasProduct($c);
    }

    /*
     * Alias function.
     *
     * @return ArrayCollection
     */
    public function getChatComponents()
    {
        return $this->getProducts();
    }

}