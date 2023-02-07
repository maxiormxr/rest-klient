<?php

namespace CurlWrapper;

use RestKlient\IAllGetable;

final class GetResponser extends CurlOptionsSetter{
    private $responseData;

    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
        parent::__destruct();
    }
    
    public function getResponse(IAllGetable $getter)
    {
        parent::addMethodToUrl($getter::API_METHOD);
        $responseData = curl_exec($this->handler);
        return $responseData == null ? curl_error($this->handler) : $responseData;
    }
}