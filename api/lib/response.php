<?php


namespace Api\Lib;

/**
 * Description of response
 *
 * @author linux
 */
class Response {
    
    public $result =null;
    public $response;
    public $message;
    
    function setResponse($response, $message)
    {
        $this->response=$response;
        $this->$message=$message;
    }
}
