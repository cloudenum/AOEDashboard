<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends MY_Controller {
  public function __construct() {
    parent::__construct();
    
    if ($this->config->load('navlinks')) {
      $this->config->set_item('active_navlinks', 3);
    }
  }

  public function index() {
    redirect(base_url('schedule/list'));
  }

  public function list() {
    if ($this->config->load('navlinks')) {
      $this->config->set_item('active_child_navlinks', 0);
    }

    $this->load->view('schedule/list');
  }

  public function upload() {
    if ($this->config->load('navlinks')) {
      $this->config->set_item('active_child_navlinks', 1);
    }

    $this->load->view('soal/upload');
  }

  public function show() {
    if ($this->input->get('id')){
      $this->load->view('soal/show', ['id' => $this->input->get('id')]);
    } else {
      show_404();
    }
  }

}


/* End of file Schedule.php */
