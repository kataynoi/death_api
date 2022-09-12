<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('default_layout');
        $this->db = $this->load->database('default', true);
    }
    public function index()
    {
        $data='';
        $this->load->view('dashboard/index_view', $data);


    }
}
