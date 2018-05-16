<?php

namespace Application\MessagingEngine\Traits;
use Application\MessagingEngine\ParticipantsFactory;

/**
 * Trait ParticipantsFactoryAware
 * @package Application\MessagingEngine\Traits
 */
trait ParticipantsFactoryAware
{
    /**
     * @var ParticipantsFactory
     */
    protected $participantsFactory = null;

    /**
     * @return ParticipantsFactory
     */
    public function getParticipantsFactory()
    {
        if (is_null($this->participantsFactory)) {
            $this->participantsFactory = ParticipantsFactory::getInstance();
        }

        return $this->participantsFactory;
    }
}