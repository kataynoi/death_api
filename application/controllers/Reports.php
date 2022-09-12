<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Reports extends REST_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('report_model');

    }
    public function le_post(){
        //echo "API TEST OK";
        $sex= $this->input->post('sex');
        $r = $this->report_model->le7($sex);
        $this->response($r);
    }
}