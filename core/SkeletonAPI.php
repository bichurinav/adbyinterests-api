<?php

abstract class SkeletonAPI
{
    private $db;
    public $arParams;

    public function __construct($arParams, $db)
    {
        $this->arParams = $arParams;
        $this->db = $db;
    }

    public function add($data)
    {

    }

    public function read()
    {

    }
}
