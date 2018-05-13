<?php

namespace Application\MessagingEngine;

/**
 * Class Text
 * @package Application\MessagingEngine
 */
class Text extends ChatComponent
{
    /**
     * @var string
     */
    protected $message;

    /**
     * Text constructor.
     * @param ViewableInterface $view
     * @param null $message
     * @return $this
     */
    public function __construct(ViewableInterface $view, $message = null)
    {
        parent::__construct($view);
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    protected function getMessage()
    {
        return $this->message;
    }

    /**
     * @return ViewableInterface
     */
    public function view()
    {
        return $this->view->setData($this->getMessage());
    }
}
