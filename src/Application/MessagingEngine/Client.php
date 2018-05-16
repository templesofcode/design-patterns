<?php


namespace Application\MessagingEngine;

use Application\MessagingEngine\Traits\ChatComponentsFactoryAware;
use Application\MessagingEngine\Traits\ParticipantsFactoryAware;
use DesignPattern\AbstractFactory\Exception\UnknownProductClassException;
/**
 * Class Client
 * @package Application\MessagingEngine
 */
class Client
{
    use ParticipantsFactoryAware;
    use ChatComponentsFactoryAware;

    /**
     * @var Chats
     */
    protected $chats;

    /**
     * @var Participant
     */
    protected $participant;

    /**
     * @var MessagingEngine
     */
    protected $messagingEngine;

    /**
     * @var ChatConfiguration
     */
    protected $config;

    /**
     * Client constructor.
     * @param MessagingEngine $messagingEngine
     * @param Participant $participant
     * @param Chats $chats
     * @param ChatConfiguration $config
     */
    public function __construct(MessagingEngine $messagingEngine, Participant $participant, Chats $chats, ChatConfiguration $config)
    {
        $this->messagingEngine = $messagingEngine;
        $this->chats = $chats;
        $this->participant = $participant;
        $this->config = $config;
        return $this;
    }

    /**
     * @throws UnknownProductClassException
     */
    public function createChat()
    {
        try {
            /**
             * @var Participants $participants
             */
            $participants = $this
                ->getParticipantsFactory()
                ->create($this->config->participantsClass);
        } catch (UnknownProductClassException $e) {
            // re-throw it for now.
            throw $e;
        }

        $participants->addParticipant($this->getParticipant());

        /**
         * @var AbstractChat $chat
         */
        $chat = $this->messagingEngine->createChat(
            $this->config,
            null, // let the messaging engine create this for us
            $participants
        );

        /**
         * Lets track the chat in this client for this participant.
         */
        $this->chats->addChat($chat);
        return $chat;
    }

    public function sendMessage(AbstractChat $targetChat, $message)
    {
        return $this->messagingEngine->sendMessage(
            $this->getConfig(),
            $this->getParticipant(),
            $targetChat,
            $message
        );
    }

    /**
     * @return Chats
     */
    public function getChats()
    {
        return $this->chats;
    }

    /**
     * @return Participant
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * @return MessagingEngine
     */
    public function getMessagingEngine()
    {
        return $this->messagingEngine;
    }

    /**
     * @return ChatConfiguration
     */
    public function getConfig()
    {
        return $this->config;
    }
}