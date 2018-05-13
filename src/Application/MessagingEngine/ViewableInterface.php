<?php


namespace Application\MessagingEngine;

/**
 * Interface ViewableInterface
 * @package Application\MessagingEngine
 */
interface ViewableInterface
{
    /**
     * @param string $d
     * @return $this
     */
    public function setData($d);

    /**
     * @return string
     */
    public function __toString();
}