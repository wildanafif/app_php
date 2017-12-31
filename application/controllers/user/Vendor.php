<?php

class Vendor extends CI_Controller{

    private $dir = "user/vendor/";
    function __construct()
    {
        parent::__construct();       
        $this->load->model('Vendor_model');
    }
    
    function index()
    {
        $data['_main']='user/vendor/index';
        $data['_title']='Vendor';
        $this->load->view('layouts/main',$data);
    }
    
    function add()
    {
         $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('vendor_name','Vendor Name','required');
        $this->form_validation->set_rules('profit','Profit','numeric|required');
        $this->form_validation->set_rules('address','Address','required');
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'password' => encrypt($this->input->post('username')."default"),
                'id_vendor' => $this->uuid->v3(time()),
                'username' => $this->input->post('username'),
                'vendor_name' => $this->input->post('vendor_name'),
                'profit' => $this->input->post('profit'),
                'address' => $this->input->post('address'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'dtm_created' => date('Y-m-d H:i:s'),
                'dtm_last_updated' => date('Y-m-d H:i:s')
            );
            
            $vendor_id = $this->Vendor_model->add_vendor($params);
            $this->session->set_flashdata('success','vendor added successfully');
            redirect(base_url('user/vendor/'));
        }
        else
        {            
            $data['_title']='Add Vendor';
            $data['_main']=$this->dir.'add';
            $this->load->view('layouts/main',$data);
        }
       
    }

     function edit($id_vendor)
    {   
        // check if the vendor exists before trying to edit it
        $data['vendor'] = $this->Vendor_model->get_vendor($id_vendor);
        
        if(isset($data['vendor']['id_vendor']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('vendor_name','Vendor Name','required');
            $this->form_validation->set_rules('profit','Profit','numeric|required');
            $this->form_validation->set_rules('address','Address','required');
        
            if($this->form_validation->run())     
            {   
                $params = array(
                    'password' => encrypt($this->input->post('username')."default"),                    
                    'username' => $this->input->post('username'),
                    'vendor_name' => $this->input->post('vendor_name'),
                    'profit' => $this->input->post('profit'),
                    'address' => $this->input->post('address'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'dtm_last_updated' => date('Y-m-d H:i:s')
                );

                $this->Vendor_model->update_vendor($id_vendor,$params);            
                $this->session->set_flashdata('success','vendor updated successfully');
                redirect(base_url('user/vendor/'));
            }
            else
            {
                $data['_title']='Edit Vendor';
                $data['_main']=$this->dir.'edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The vendor you are trying to edit does not exist.');
    } 

    function remove($id_vendor)
    {
        $vendor = $this->Vendor_model->get_vendor($id_vendor);

        // check if the vendor exists before trying to delete it
        if(isset($vendor['id_vendor']))
        {
            $this->Vendor_model->delete_vendor($id_vendor);
            $this->session->set_flashdata('success','vendor deleted successfully');
            redirect(base_url($this->dir));
        }
        else
            show_error('The vendor you are trying to delete does not exist.');
    }
    function json() {
        $list = $this->Vendor_model->get_datatables();
        $data = array();
        $no = $_GET['start'];
        foreach ($list as $key)
        {
            $btn_edit = '<a href="' . base_url($this->dir.'edit/' . $key->id_vendor) . '" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>';
            $btn_delete = '<a onclick="return confirm(\'Do you want to delete '.$key->vendor_name.'?\')" href="' . base_url($this->dir.'remove/' . $key->id_vendor) . '" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>';

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->vendor_name;
            $row[] = $key->username;
            $row[] = $key->address;
            $row[] = $key->dtm_last_updated;
            $row[] = $key->dtm_created;
            $row[] = '<div class="btn-group btn-group-sm">' . $btn_edit . $btn_delete . '</div>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $this->Vendor_model->get_all_vendor_count(),
            "recordsFiltered" => $this->Vendor_model->get_all_vendor_count(),
            "data" => $data,
            "token"=> $this->security->get_csrf_hash()
        );
        //output to json format
        echo json_encode($output);
    }

}