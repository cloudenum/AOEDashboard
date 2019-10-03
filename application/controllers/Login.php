<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class Login extends CI_Controller {
    private $client = null;

    public function __construct() {
        parent::__construct();
        $this->client = Api::getInstance();
        $this->load->helper('cookie');
        // var_dump($this->client);
    }

    public function index() {
        $alert = $this->session->alert;
        
        $this->session->sess_destroy();
        $this->load->view("login", array('alert' => $alert));
    }

    public function refresh_token() {
        if ($this->session->logged_in) {
            $login = $this->session->username;
            $password = $this->session->password;

            $request_option = [
                'headers' => [
                    'Content-Type' =>'application/x-www-form-urlencoded',
                    'Accept' => 'application/json'
                ],
                'form_params' => [
                    'login' => $login,
                    'password' => $password
                ]
            ];
    
            try {
                $res = $this->client->post('authenticate', $request_option);
                $status_code = $res->getStatusCode();
                $body = json_decode($res->getBody(true));
                $data = $body->data;
                // var_dump($body);
                $ses_data = array(
                    'user_id' => $data->id,
                    'username' => $login,
                    'access_token' => $data->access_token,
                    'password' => $password,
                    'logged_in' => true,
                    'is_admin' => $data->is_admin
                );
    
                $this->input->set_cookie('username', $login, 0);
                $this->input->set_cookie('user_id', $data->id, 0);
                // $this->input->set_cookie('access_gate', $password, 0);            
                $this->input->set_cookie('access_token', $data->access_token, 3600);
                $this->session->set_userdata($ses_data);
                $json_data = array(
                    // 'data' => $ses_data,
                    'meta' => $body->meta
                );
                echo json_encode($json_data);
            } catch (ClientException $e) {
                if ($e->hasResponse()) {
                    $res = json_decode($e->getResponse()->getBody(true));
                    
                    switch ($e->getResponse()->getStatusCode()) {
                        case 400:
                        case 401:
                        case 403:
                            $title = 'Username atau password salah ';
                            $message = 'Periksa kembali username dan password anda. Pastikan huruf besar dan kecil sesuai.';
                            break;
                        default:
                            $title = $res->meta->code;
                            $message = $res->meta->message;
                            break;
                    }    
                }
                
                $this->session->set_flashdata([
                    'alert' => [
                        'type' => 'warning',
                        'title' => $title,
                        'message' => $message
                    ]
                ]);
                
                $json_data = array(
                    // 'data' => $ses_data,
                    'meta' => $res->meta
                );
    
                echo json_encode($json_data);
                // http_response_code(json_decode($e->getResponse()->getBody(true))->meta->code);
                redirect('login','refresh');
            } catch (ServerException $e) {
                if ($e->hasResponse()) {
                    $res = json_decode($e->getResponse()->getBody(true));    
                }
    
                $this->session->set_flashdata([
                    'alert' => [
                        'type' => 'error',
                        'title' => 'Server Error [5xx]',
                        'message' => $res->meta->message[0]
                    ]
                ]);
    
                // http_response_code(json_decode($e->getResponse()->getBody(true))->meta->code);
    
                redirect('login','refresh');
            } catch (RequestException $e) {
                $this->session->set_flashdata([
                    'alert' => [
                        'type' => 'error',
                        'title' => 'Masalah Jaringan',
                        'message' => 'Silahkan periksa koneksi internet Anda.'
                    ]
                ]);
    
                // http_response_code(json_decode($e->getResponse()->getBody(true))->meta->code);
                redirect('login','refresh');
            } catch (\Throwable $e) {
                $this->session->set_flashdata([
                    'alert' => [
                        'type' => 'error',
                        'title' => "Sepertinya ada yang salah. {$e->getLine()}",
                        'message' => $e->getMessage()
                        // 'message' => 'Contact admin support.'
                    ]
                ]);
                // http_response_code(500);
                redirect('login','refresh');
            }   
        } else {
            $this->session->sess_destroy();
            
            redirect('login','refresh');
        }
    }

    public function auth() {
        // $client = new Api('http://indiarkmedia.com/api/v2/');
        
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        
        $request_option = [
            'headers' => [
                'Content-Type' =>'application/x-www-form-urlencoded',
                'Accept' => 'application/json'
            ],
            'form_params' => [
                'login' => $login,
                'password' => $password
            ]
        ];

        try {
            $res = $this->client->post('authenticate', $request_option);
            $status_code = $res->getStatusCode();
            $body = json_decode($res->getBody(true));
            $data = $body->data;

            $ses_data = array(
                'user_id' => $data->id,
                'username' => $login,
                'access_token' => $data->access_token,
                'password' => $password,
                'logged_in' => true,
                'is_admin' => $data->is_admin
            );

            $this->input->set_cookie('username', $login, 0);
            $this->input->set_cookie('user_id', $data->id, 0);
            // $this->input->set_cookie('access_gate', $password, 0);            
            $this->input->set_cookie('access_token', $data->access_token, 3600);
            $this->session->set_userdata($ses_data);
            
            redirect(base_url(), 'refresh');
        } catch (ClientException $e) {
            if ($e->hasResponse()) {
                $res = json_decode($e->getResponse()->getBody(true));
                
                switch ($e->getResponse()->getStatusCode()) {
                    case 400:
                    case 401:
                    case 403:
                        $title = 'Username atau password salah ';
                        $message = 'Periksa kembali username dan password anda. Pastikan huruf besar dan kecil sesuai.';
                        break;
                    default:
                        $title = $res->meta->code;
                        $message = $res->meta->message;
                        break;
                }    
            }
            
            $this->session->set_flashdata([
                'alert' => [
                    'type' => 'warning',
                    'title' => $title,
                    'message' => $message
                ]
            ]);
            
            $json_data = array(
                // 'data' => $ses_data,
                'meta' => $body->meta
            );

            echo json_encode($json_data);
            // http_response_code(json_decode($e->getResponse()->getBody(true))->meta->code);
            redirect('login','refresh');
        } catch (ServerException $e) {
            if ($e->hasResponse()) {
                $res = json_decode($e->getResponse()->getBody(true));    
            }

            $this->session->set_flashdata([
                'alert' => [
                    'type' => 'error',
                    'title' => 'Server Error [5xx]',
                    'message' => $res->meta->message[0]
                ]
            ]);

            // http_response_code(json_decode($e->getResponse()->getBody(true))->meta->code);

            redirect('login','refresh');
        } catch (RequestException $e) {
            $this->session->set_flashdata([
                'alert' => [
                    'type' => 'error',
                    'title' => 'Masalah Jaringan',
                    'message' => 'Silahkan periksa koneksi internet Anda.'
                ]
            ]);

            // http_response_code(json_decode($e->getResponse()->getBody(true))->meta->code);
            redirect('login','refresh');
        } catch (\Throwable $e) {
            $this->session->set_flashdata([
                'alert' => [
                    'type' => 'error',
                    'title' => "Sepertinya ada yang salah. {$e->getLine()}",
                    'message' => $e->getMessage()
                    // 'message' => 'Contact admin support.'
                ]
            ]);
            // http_response_code(500);
            redirect('login','refresh');
        }        
    }
}

/* End of file Login.php */

?>
