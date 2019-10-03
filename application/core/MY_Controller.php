<?php
  class MY_Controller extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->library('session');
      if (!$this->session->logged_in) {
          redirect('/login', 'refresh');
      }
    }

    protected function admin_only() {
      if(!$this->session->is_admin) {
        show_404();
      }
    }

    protected function participant_only() {
      if($this->session->is_admin) {
        show_404();
      }
    }
  }
?>