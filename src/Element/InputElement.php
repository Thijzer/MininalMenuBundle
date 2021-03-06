<?php

namespace HtmlBuilder\Element;

use HtmlBuilder\Html;

class InputElement implements FormElement
{
    use BuildTrait;

    const BUTTON = 'button';
    const CHECKBOX = 'checkbox';
    const COLOR = 'color';
    const DATE = 'date';
    const DATETIME_LOCAL = 'datetime-local';
    const EMAIL = 'email';
    const FILE = 'file';
    const HIDDEN = 'hidden';
    const IMAGE = 'image';
    const NUMBER = 'number';
    const PASSWORD = 'password';
    const RADIO = 'radio';
    const RANGE = 'range';
    const RESET = 'reset';
    const SEARCH = 'search';
    const SUBMIT = 'submit';
    const TEL = 'tel';
    const TEXT = 'text';
    const TIME = 'time';
    const URL = 'url';
    const WEEK = 'week';

    private $name;
    private $value;
    private $type;

    public function __construct(string $type, string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
        // todo validate types
        $this->type = $type;
    }

    public function build()
    {
        return Html::solidus($this->type)->name($this->name)->value($this->value);
    }
}
