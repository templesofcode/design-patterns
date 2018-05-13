<?php

namespace Application\MessagingEngine;

/**
 * Class NewDayMessage
 * @package Application\MessagingEngine
 */
class NewDayMessage extends ChatComponent
{
    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * NewDayMessage constructor.
     * @param ViewableInterface $view
     */
    public function __construct(ViewableInterface $view)
    {
        parent::__construct($view);
        $this->date = new \DateTime();
    }

    /**
     * {@inheritdoc}
     */
    public function view()
    {
        return $this->view->setData(
            $this->date->format("It is now F j, Y")
        );
    }
}