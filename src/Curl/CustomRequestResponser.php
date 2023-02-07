<?php

namespace CurlWrapper;

use RestKlient\IOneCreatable;

final class CustomRequestResponser extends CurlOptionsSetter{

    private $responseData;

    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
        parent::__destruct();
    }

    public function getResponse(IOneCreatable $creator, string $httpMethod)
    {
        parent::addMethodToUrl($creator::API_METHOD);
        parent::setRequestMethod($httpMethod);
        parent::setHttpHeader([self::CONTENT_TYPE_APP_JSON]);
        parent::setRequestJson($creator->prepareDataArray());
        $responseData = curl_exec($this->handler);
        return $responseData == null ? curl_error($this->handler) : $responseData;
    }

}