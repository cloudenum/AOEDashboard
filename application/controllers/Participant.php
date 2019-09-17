<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class Participant extends CI_Controller {
    private $client = null;

    public function __construct()
    {
        parent::__construct();
        $this->client = Api::getInstance();
        $this->load->helper('cookie');
        $this->load->model('Upload_Model');
        
        if ($this->config->load('navlinks')) {
            $this->config->set_item('active_navlinks', 1);
        }
    }
    
    public function index()
    {
        redirect(base_url('participant/list'));
    }

    public function list() 
    {
        if ($this->config->load('navlinks')) {
            $this->config->set_item('active_child_navlinks', 0);
        }

        $this->load->view('participant/list');
    }

    public function add($mode = 'view') 
    {
        if ($this->config->load('navlinks')) {
            $this->config->set_item('active_child_navlinks', 1);
        }

        switch ($this->input->get('mode')) {
            case 'view':
                $this->load->view('participant/add');
                break;
            case 'manual': {
                $data = $this->input->post();
                // var_dump($data);
                if ($data) {
                    $this->add_manual($data);
                } else {
                    $this->client->set_response([
                        'meta' => [
                            'message' => 'input kosong'
                        ]
                    ], 404);
                }
                break;
            }
            default:
                $this->load->view('participant/add');
                break;
        }   
    }

    private function add_manual($data) {
        try {            
            // var_dump($_FILES);
            $multipart = [];
            $files = isset($_FILES) ? $_FILES : NULL;
            
            if (! $files) { 
                throw new Exception('Tidak ada file ktp');
            }

            foreach ($data as $key => $value) {
                $multipart[] = [
                    'name' => $key,
                    'contents' => $value,
                ];
            }

            if ($this->Upload_Model->do_upload('capture')) {
                
                print_r ($this->Upload_Model->upload->data());
            } else {
                print_r($this->Upload_Model->upload->display_errors());
            }

            // $multipart[] = [
            //     'name' => 'ktp',
            //     'contents' => $files['ktp']
            // ];
            
            // $multipart[] = [
            //     'name' => 'capture',
            //     'contents' => $files['capture']
            // ];

            // var_dump($multipart);
            
            echo "<pre>";
            print_r ($multipart);
            echo "</pre>";
            
            $request_option = [
                'headers' => [
                    'X-Auth-Token' => $this->session->access_token
                ],
                'multipart' => $multipart
            ];

            
            echo "<pre>";
            print_r ($request_option['headers']);
            echo "</pre>";
            

            $res = $this->client->post('participant/add', $request_option);

            $this->client->set_response($res->getBody(true), $res->getStatusCode(), false);
        } catch (RequestException $e) {
            $http_response_code = $e->getResponse()->getStatusCode();
            $this->client->set_response($e->getResponse()->getBody(true), $http_response_code, false);
        } //catch (Exception $e) {
        //     $this->client->set_response([
        //         'status' => FALSE,
        //         'message'=> $e->getMessage().$e->getLine().$e->getFile()
        //     ], 400);
        // } 
        // catch (\Throwable $t) {
        //     $this->client->set_response([
        //         'status' => FALSE,
        //         'message'=> 'Server Error'
        //     ], 500);
        // }
    }

    public function fetch() 
    {
        // echo json_encode($this->input->get());
        try {
            $request_option = [
                'headers' => [
                    'X-Auth-Token' => $this->session->access_token
                ]
            ];

            $res = $this->client->get('participant', $request_option);

            echo $res->getBody(true);
        } catch (RequestException $e) {
            // var_dump($e->getRequest()->getHeaders());
            
            http_response_code(json_decode($e->getResponse()->getBody(true))->meta->code);
            echo $e->getResponse()->getBody(true);
        }
    }

}

/* End of file Participant.php */

?>
