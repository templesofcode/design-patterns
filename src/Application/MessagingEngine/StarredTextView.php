<?php

namespace Application\MessagingEngine;

/**
 * Class StarredTextView
 * @package Application\MessagingEngine
 */
class StarredTextView extends SimpleTextView
{
    /**
     * @var string
     */
    protected static $printFormat=<<<FMT
%s
%s %s %s
%s
FMT;

    /**
     * @return string
     */
    public function __toString()
    {
        return (sprintf(
            static::$printFormat,
            str_repeat('*', strlen($this->text) + 4),
            '*',
            $this->text,
            '*',
            str_repeat('*', strlen($this->text) + 4)
        ));
    }

}
