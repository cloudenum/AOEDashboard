<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

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
       
        
        // $client->send
        
        $alert = $this->session->alert;
        // var_dump($alert);
        $this->load->view('main', ['alert' => $alert]);   
    }

    public function logout(){
       redirect('logout','refresh');
    }

}

/* End of file Main.php */

?>
