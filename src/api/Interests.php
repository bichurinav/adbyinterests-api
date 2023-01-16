<?php

namespace Api;

class Interests extends \Core\SkeletonAPI
{
    public function __construct($arParams, $db)
    {
        parent::__construct($arParams, $db);
    }

    public function showClass()
    {
        return __CLASS__;
    }
}
