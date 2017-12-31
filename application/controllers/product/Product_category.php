<?php
class Product_category extends CI_Controller{

	private $dir = "product/product_category/";
	function __construct()
	{
		parent::__construct();
		$this->load->model('Product_category_model');
	}

	function index()
	{
		$data['_main']=$this->dir.'index';
		$data['_title']='Product Category';
		$this->load->view('layouts/main',$data);
	}

	function add()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('product_category','Product Category','required');

		if($this->form_validation->run())
		{
			$params = array(
				'product_category' => $this->input->post('product_category'),
				'description' => $this->input->post('description'),
				'dtm_created' => date('Y-m-d H:i:s'),
				'dtm_last_updated' => date('Y-m-d H:i:s')
			);
			$params['id_product_category'] = $this->uuid->v3(time());
			$params = $this->security->xss_clean($params);

			$product_category_id = $this->Product_category_model->add_product_category($params);
			$this->session->set_flashdata('success','product category added successfully');
			redirect(base_url('product/product_category/'));
		}
		else
		{
			$data['_title']='Add Product Category';
			$data['_main']=$this->dir.'add';
			$this->load->view('layouts/main',$data);
		}

	}
	function edit($id_product_category)
	{
		// check if the product_category exists before trying to edit it
		$data['product_category'] = $this->Product_category_model->get_product_category($id_product_category);

		if(isset($data['product_category']['id_product_category']))
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('product_category','Product Category','required');

			if($this->form_validation->run())
			{
				$params = array(
					'product_category' => $this->input->post('product_category'),
					'description' => $this->input->post('description'),
					'dtm_last_updated' => date('Y-m-d H:i:s')
				);

				$this->Product_category_model->update_product_category($id_product_category,$params);
				$this->session->set_flashdata('success','product category updated successfully');
				redirect(base_url('product/product_category/'));
			}
			else
			{
				$data['_title']='Edit Product Category';
				$data['_main'] = $this->dir.'edit';
				$this->load->view('layouts/main',$data);
			}
		}
		else
		show_error('The product_category you are trying to edit does not exist.');
	}
	function remove($id_product_category)
	{
		$product_category = $this->Product_category_model->get_product_category($id_product_category);

		// check if the product_category exists before trying to delete it
		if(isset($product_category['id_product_category']))
		{
			$this->Product_category_model->delete_product_category($id_product_category);
			$this->session->set_flashdata('success','product category deleted successfully');
			redirect(base_url('product/product_category/'));
		}
		else
		show_error('The product_category you are trying to delete does not exist.');
	}
	function json() {
		$list = $this->Product_category_model->get_datatables();
		$data = array();
		$no = $_GET['start'];
		foreach ($list as $key)
		{
			$btn_edit = '<a href="' . base_url($this->dir.'edit/' . $key->id_product_category) . '" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>';
			$btn_delete = '<a onclick="return confirm(\'Do you want to delete '.$key->product_category.'?\')" href="' . base_url($this->dir.'remove/' . $key->id_product_category) . '" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>';

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $key->product_category;
			$row[] = $key->description;
			$row[] = '<div class="btn-group btn-group-sm">' . $btn_edit . $btn_delete . '</div>';

			$data[] = $row;
		}
		$output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $this->Product_category_model->get_all_product_category_count(),
            "recordsFiltered" => $this->Product_category_model->get_all_product_category_count(),
            "data" => $data,
			"token"=> $this->security->get_csrf_hash()
		);
		//output to json format
		echo json_encode($output);
	}

}