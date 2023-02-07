<?php

namespace CurlWrapper;

abstract class BaseCurl{

    protected $handler;

    public function __construct(){
        $this->handler = curl_init();
    }

    public function __destruct(){
        curl_close($this->handler);
    }
}