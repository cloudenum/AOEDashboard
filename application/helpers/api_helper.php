<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

/**
 * A Singleton API class
 */
class Api extends Client {    
    private static $_instance = null;
    // private $_client = null;

    private function __construct() {
        parent::__construct(['base_uri' => 'http://indiarkmedia.com/api/v2/']);        
        // $this->_client = new Client(['base_uri' => 'http://indiarkmedia.com/api/v2/']);
    }
    
    // public function request($method = 'GET', $data = null) {
    //     switch ($method) {
    //         case 'GET':
    //             # code...
    //             break;
    //         case 'POST':
    //         default:
    //             # code...
    //             break;
    //     }
    // }

    /**
     * Function to get this singleton instance
     * 
     * @return Api
     */
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new Api();
        }

        return self::$_instance;
    }
    
    /**
     * Function to send POST data
     * Do not add url backslash at the front
     * 
     * @param string
     * @param array
     * @return mixed
     */
    // public function send_post($url, $options = null) {
    //     if ($options === null) {
    //         $res = $this->_client->request('POST', $url);
    //     } else {
    //         $res = $this->_client->request('POST', $url, $options);
    //     }

    //     return $res;
    // }

     /**
     * Function to send POST data
     * Do not add url backslash at the front
     * 
     * @param string
     * @param array
     * @return GuzzleHttp\Promise\Promise;
     */
    // public function send_async_post($url, $options = null) {
    //     if ($options === null) {
    //         $res = $this->_client->postAsync($url);
    //     } else {
    //         $res = $this->_client->postAsync($url, $options);
    //     }

    //     return $res;
    // }

    /**
     * Function to send GET data
     * Do not add url backslash at the front
     * 
     * @param string
     * @param array
     * @return mixed
     */
    // public function send_get($url, $options = null) {
    //     if ($options === null) {
    //         $res = $this->_client->request('GET', $url);
    //     } else {
    //         $res = $this->_client->request('GET', $url, $options);
    //     }

    //     return $res;
    // }

    public function set_response($data, $http_code, $json = TRUE) {
        http_response_code($http_code);
        echo $json? json_encode($data) : $data;
    }
}

// $GLOBALS['client'] = new Api();


?>
