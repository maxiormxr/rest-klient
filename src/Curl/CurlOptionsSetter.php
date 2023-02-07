<?php

namespace CurlWrapper;

abstract class CurlOptionsSetter extends BaseCurl{
    
    private $config;
    protected $url;
    protected $username;
    protected $password;
    public const HTTP_METHOD_POST = 'POST';
    public const HTTP_METHOD_PUT = 'PUT';
    public const HTTP_METHOD_DELETE = 'DELETE';
    public const CONTENT_TYPE_APP_JSON = 'Content-Type:application/json';


    public function __construct(){
        parent::__construct();
        $this->config = include($_SERVER["DOCUMENT_ROOT"] . '/config.php');
        $this->url = $this->config['baseApiUrl'] /* . $pUrlMethod */;
        $this->username = $this->config['username'];
        $this->password = $this->config['password'];

/*         curl_setopt($this->handler, CURLOPT_URL, $this->url); */
        curl_setopt($this->handler, CURLOPT_USERPWD, "$this->username:$this->password");
        curl_setopt($this->handler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->handler, CURLOPT_HTTPGET, true);
    }

    public function __destruct(){
        parent::__destruct();
    }

    protected function addMethodToUrl(string $method){
        $this->url .= $method;
        curl_setopt($this->handler, CURLOPT_URL, $this->url);
    }

    protected function setHttpHeader(array $arr){
        curl_setopt($this->handler, CURLOPT_HTTPHEADER, $arr);
    }

    protected function setRequestJson(array $pArr)
    {
        curl_setopt($this->handler, CURLOPT_POSTFIELDS, json_encode($pArr));
    }

    protected function setRequestMethod(string $method){
        curl_setopt($this->handler, CURLOPT_CUSTOMREQUEST, $method);
    }
}