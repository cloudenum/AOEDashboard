<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
    }
    
    function do_upload($field_name, $config = []) {
        if (empty($config)) {
            $config['upload_path']          = 'temp';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 4096;
            $config['max_width']            = 2048;
            $config['max_height']           = 1440;
        }

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($field_name)) {
            return false;
        } else {
            return true;
        }
    }

}

/* End of file Upload_Model.php */

?>