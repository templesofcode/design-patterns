<?php

namespace Application\MessagingEngine;

use Application\MessagingEngine\ChatComponents;
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
     * @param ChatComponentsInterface $c
     * @param ParticipantsInterface $p
     */
    public function __construct(ChatComponentsInterface $c, ParticipantsInterface $p)
    {
        $this->chatComponents = $c;
        $this->participants = $p;
        return $this;
    }

    /**
     * @return ChatComponentsInterface
     */
    public function getChatComponents()
    {
        return $this->chatComponents;
    }

    /**
     * @return ParticipantsInterface
     */
    public function getParticipants()
    {
        return $this->participants;
    }


}