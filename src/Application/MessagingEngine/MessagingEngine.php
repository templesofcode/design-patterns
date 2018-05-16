<?php

namespace Application\MessagingEngine;

use Application\MessagingEngine\Traits\ChatComponentsFactoryAware;
use Application\MessagingEngine\Traits\ChatComponentFactoryAware;
use Application\MessagingEngine\Traits\ParticipantsFactoryAware;
use DesignPattern\AbstractFactory\Exception\UnknownProductClassException;
use DesignPattern\AbstractFactory\ProductInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class MessagingEngine
 * @package Application
 */
abstract class MessagingEngine implements ProductInterface
{
    use ChatComponentsFactoryAware;
    use ParticipantsFactoryAware;
    use ChatComponentFactoryAware;

    /**
     * @var Chats
     */
    protected $chats;

    /**
     * Includes participants involved in chats.
     * Includes participants registered through the add method
     * @var Participants
     */
    protected $participants;

    /**
     * @var ViewableInterface
     */
    protected $view;

    /**
     * MessagingEngine constructor.
     * @param ViewableInterface|null $view
     * @param Chats|null $chats
     * @param Participants|null $p
     * @return $this
     */
    public function __construct(ViewableInterface $view = null, Chats $chats = null, Participants $p = null)
    {
        $this->view = $view;

        if (is_null($chats)) {
            $this->chats = new ArrayCollection();
        }
        else {
            $this->chats = $chats;
        }


        if (is_null($p)) {
            $this->participants = new ArrayCollection();
        }
        else {
            $this->participants = $p;
        }

        return $this;
    }

    /**
     * @param ChatConfiguration $config
     * @param ChatComponents $chatComponents
     * @param Participants $participants
     * @return \DesignPattern\AbstractFactory\ProductInterface|AbstractChat
     * @throws UnknownProductClassException
     */
    public function createChat(ChatConfiguration $config, ChatComponents $chatComponents = null, Participants $participants = null)
    {
        if (is_null($chatComponents)) {
            /**
             * @var ChatComponents $chatComponents
             */
            $chatComponents = $this->getChatComponentsFactory()->create($config->chatComponentsClass);
        }

        if (is_null($participants)) {
            /**
             * @var Participants $participants
             */
            $participants = $this->getParticipantsFactory()->create($config->participantsClass);
        }

        /** todo: Evaluate the participants */

        /**
         * @var ChatFactory $chatFactory
         */
        $chatFactory = ChatFactory::getInstance();

        try {
            /**
             * @var AbstractChat $chat
             */
            $chat = $chatFactory->create($config->chatClass);
            $chat->setChatComponents($chatComponents);
            $chat->setParticipants($participants);

            /**
             * Make the messaging engine aware of these participants.
             */
            $this->registerParticipants($participants);
        } catch (UnknownProductClassException $upce) {
            /** rethrow it for now */
            throw $upce;
        }

        return $chat;
    }

    /**
     * @param Participant $from
     * @param AbstractChat $targetChat
     * @param $message
     * @return bool
     * @throws UnknownProductClassException
     */
    public function sendMessage(ChatConfiguration $config, Participant $from, AbstractChat $targetChat, $message)
    {
        try {
            /**
             * @var ChatComponent $component
             */
            $component = $this->getChatComponentFactory()->create($config->chatComponentClass);
        } catch (UnknownProductClassException $e) {
            /** re-throw it for now */
            throw $e;
        }




        $targetChat->getChatComponents()->addChatComponent($component);
        return true;
    }

    protected function registerParticipants(Participants $participants)
    {
        if ($participants->getParticipants()->isEmpty()) {
            return;
        }

        foreach ($participants->getParticipants()->toArray() as $participant) {
            /** @var Participant $participant */

            /**
             * Checking of existence is done internally via ArrayCollection
             */
            $this->addParticipant($participant);
        }
    }

    /**
     * @param Participant $p
     * @return Participants
     */
    public function addParticipant(Participant $p)
    {
        return $this->participants->addParticipant($p);
    }

    /**
     * @param Participant $p
     * @return bool
     */
    public function hasParticipant(Participant $p)
    {
        return $this->participants->hasProduct($p);
    }

    /**
     * @return Participants|null
     */
    public function getParticipants()
    {
        return $this->participants;
    }
}