<?php

namespace Application\MessagingEngine;

use DesignPattern\AbstractFactory\AbstractProduct;

/**
 * Class ChatComponent
 * @package Application\MessagingEngine
 */
abstract class ChatComponent extends AbstractProduct
{
    /**
     * @var ViewableInterface
     */
    protected $view;

    /**
     * ChatComponent constructor.
     * @param ViewableInterface $view
     */
    public function __construct(ViewableInterface $view = null)
    {
        $this->view = $view;
    }

    /**
     * @return ViewableInterface
     */
    abstract public function view();

    /**
     * @param ViewableInterface $view
     */
    public function setView(ViewableInterface $view)
    {
        $this->view = $view;
    }
}
