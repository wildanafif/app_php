<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();       
    }
    
    function index(){
        $data['_title']='CMS Idea';
        $data['_main']='dashboard/index';
        $this->load->view('layouts/main',$data);
    }


}
