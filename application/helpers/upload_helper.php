<?php
$load = new CI_Loader();
$load->library('upload');

function do_upload($field_name, $config = []) {
    if (empty($config)) {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'images';
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
?>