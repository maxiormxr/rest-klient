<?php

namespace RestKlient;

abstract class BaseISklepApiModel{
    protected $id;
    protected $name;

    public function __construct($pId, $pName){
        $this->id = $pId;
        $this->name = $pName;
    }

    abstract public function prepareDataArray();
};