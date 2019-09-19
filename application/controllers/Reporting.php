<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {
  public function __construct() {
    parent::__construct();
    
    if ($this->config->load('navlinks')) {
      $this->config->set_item('active_navlinks', 4);
    }
  }

  public function index() {
    $this->load->view('reporting/index');
  }

}


/* End of file Soal.php */
