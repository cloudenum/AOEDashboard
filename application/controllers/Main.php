<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $client = Api::getInstance();
        
        if ($this->config->load('navlinks')) {
            $this->config->set_item('active_navlinks', 0);
        }
    }

    public function index()
    {
        if (!$this->session->logged_in) {
            redirect('/login', 'refresh');
        }
        
        // $client->send
        
        $alert = $this->session->alert;
        // var_dump($alert);
        $this->load->view('main', ['alert' => $alert]);   
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

}

/* End of file Main.php */

?>
