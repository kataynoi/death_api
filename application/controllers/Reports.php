<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 * @author  Mr.Dechachit Kaewmaung 
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */
require(APPPATH.'/libraries/REST_Controller.php');
class Reports extends REST_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('report_model');

    }
    public function le_post(){
        
        $sex= $this->input->get('sex');
        $provcode= $this->input->get('provcode');
        //echo "SEX:".$sex;
       //echo "Provcode:".$provcode;
        $r = $this->report_model->le7($sex,$provcode);
        $this->response($r);
    }
    public function hale_post(){
        //echo "API TEST OK";
        $sex= $this->input->get('sex');
        $provcode= $this->input->get('provcode');
        $r = $this->report_model->hale7($sex,$provcode);
        $this->response($r);
    }
    public function yll_post(){
        //echo "API TEST OK";
        $sex= $this->input->get('sex');
        //echo "SEX:".$sex;
        $prov= $this->input->get('prov');
        $amp= $this->input->get('amp');
        //echo "SEX:".$amp;
        $r = $this->report_model->yll7_dev($sex,$prov,$amp);
        $this->response($r);
    }
}