<?php 
class Errors extends CI_Controller 
{
  public function __construct() 
  {
    parent::__construct(); 
  } 

  public function index()
  { 
    $this->output->set_status_header(500);  
    $this->load->view('errors/html/error_general', array('heading' => 500, 'message' => 'Something went wrong.'));
  }

  public function error_404(){
    $this->output->set_status_header(404);
    $this->load->view('errors/html/error_404');
  }
} 