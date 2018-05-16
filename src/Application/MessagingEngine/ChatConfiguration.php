<?php

namespace Application\MessagingEngine;

/**
 * Class ChatConfiguration
 * @package Application\MessagingEngine
 */
class ChatConfiguration
{
    /**
     * @var string
     */
    public $chatClass;

    /**
     * @var string
     */
    public $participantsClass;

    /**
     * @var string
     */
    public $chatComponentsClass;


    /**
     * @var string
     */
    public $chatComponentClass;

    /**
     * @var ViewableInterface
     */
    public $view;
}