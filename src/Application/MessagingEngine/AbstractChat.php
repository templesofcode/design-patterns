<?php

namespace Application\MessagingEngine;

/**
 * Class AbstractChat
 * @package Application\MessagingEngine
 */
abstract class AbstractChat implements ChatInterface
{
    /**
     * @var ChatComponents
     */
    protected $chatComponents;

    /**
     * @var Participants
     */
    protected $participants;

    /**
     * AbstractChat constructor.
     * @param ChatComponents $c
     * @param Participants $p
     */
    public function __construct(ChatComponents $c, Participants $p)
    {
        $this->chatComponents = $c;
        $this->participants = $p;
        return $this;
    }

    /**
     * @return ChatComponents
     */
    public function getChatComponents()
    {
        return $this->chatComponents;
    }

    /**
     * @param ChatComponents $chatComponents
     * @return AbstractChat
     */
    public function setChatComponents($chatComponents)
    {
        $this->chatComponents = $chatComponents;
        return $this;
    }

    /**
     * @return Participants
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @param Participants $participants
     * @return AbstractChat
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
        return $this;
    }
}