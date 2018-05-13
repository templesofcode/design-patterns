<?php

namespace Application\MessagingEngine;

/**
 * Class SimpleTextView
 * @package Application\MessagingEngine
 */
class SimpleTextView implements ViewableInterface
{
    /**
     * @var string
     */
    protected $data;

    /**
     * SimpleTextView constructor.
     * @param string $d
     */
    public function __construct($d)
    {
        $this->data = $d;
    }

    /**
     * @param string $d
     * @return ViewableInterface|void
     */
    public function setData($d)
    {
        $this->data = $d;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->data;
    }
}
