<?php

namespace Application\MessagingEngine;

use DesignPattern\AbstractFactory\AbstractProducts;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Participants
 * @package Application\MessagingEngine
 */
abstract class Participants extends AbstractProducts
{
    /**
     * @var ArrayCollection
     */
    protected $participants;

    /**
     * Participants constructor.
     * @param ArrayCollection $participants
     */
    public function __construct(ArrayCollection $participants)
    {
        parent::__construct($participants);

        /**
         * Lets alias now.
         */
        $this->participants = $this->products;
        return $this;
    }

    /**
     * @param Participant $participant
     * @return $this
     */
    public function addParticipant(Participant $participant)
    {
        return $this->addProduct($participant);
    }

    /**
     * @param Participant $participant
     * @return bool
     */
    public function hasParticipant(Participant $participant)
    {
        return $this->hasProduct($participant);
    }

    /**
     * @return ArrayCollection
     */
    public function getParticipants()
    {
        return $this->getProducts();
    }
}