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
        
        $sex= $this->input->get('sex');
        //echo "SEX:".$sex;
        $r = $this->report_model->le7($sex);
        $this->response($r);
    }
    public function hale_post(){
        //echo "API TEST OK";
        $sex= $this->input->post('sex');
        $r = $this->report_model->hale7($sex);
        $this->response($r);
    }
    public function yll_post(){
        //echo "API TEST OK";
        $sex= $this->post('sex');
        $prov= $this->input->post('prov');
        $r = $this->report_model->yll7($sex,$prov);
        $this->response($r);
    }
}