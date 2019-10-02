<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Management extends MY_Controller {
  public function __construct() {
    parent::__construct();
    $this->admin_only();
    
    if ($this->config->load('navlinks')) {
      $this->config->set_item('active_navlinks', 5);
    }
  }
  
  public function index() {
    redirect(base_url('admin_management/list'));
  }

  public function list() {
    if ($this->config->load('navlinks')) {
      $this->config->set_item('active_child_navlinks', 0);
    }

    $this->load->view('admin_management/list');
  }

  public function add() {
    if ($this->config->load('navlinks')) {
      $this->config->set_item('active_child_navlinks', 1);
    }

    $this->load->view('admin_management/add');
  }

  public function roles() {
    if ($this->config->load('navlinks')) {
      $this->config->set_item('active_child_navlinks', 2);
    }

    $this->load->view('admin_management/roles');
  }
}


/* End of file Admin_Management.php */
