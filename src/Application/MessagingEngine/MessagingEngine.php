<?php

namespace Application\MessagingEngine;

use Application\MessagingEngine\Chats;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class MessagingEngine
 * @package Application
 */
abstract class MessagingEngine
{
    /**
     * @var Chats
     */
    protected $chats;

    /**
     * MessagingEngine constructor.
     * @param Chats|null $chats
     */
    public function __construct(Chats $chats = null)
    {
        if (is_null($chats)) {
            $this->chats = new ArrayCollection();
        }
        else {
            $this->chats = $chats;
        }
        return $this;
    }
}