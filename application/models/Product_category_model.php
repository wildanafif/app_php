<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Product_category_model extends CI_Model
{
	var $table = 'product_category';
	var $column_order = array(null, 'product_category');
	var $column_search = array('product_category');
	var $order = array('dtm_created' => 'desc');
	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
	{
		$this->db->select("*");
		$this->db->from($this->table);
		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if ($_GET['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_GET['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_GET['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
				$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_GET['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
		}
		else if (isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_GET['length'] != -1)
		$this->db->limit($_GET['length'], $_GET['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}



	/*
	 * Get product_category by id_product_category
	 */
	function get_product_category($id_product_category)
	{
		return $this->db->get_where('product_category',array('id_product_category'=>$id_product_category))->row_array();
	}

	/*
	 * Get all product_category count
	 */
	function get_all_product_category_count()
	{
		$this->db->from('product_category');
		return $this->db->count_all_results();
	}

	/*
	 * Get all product_category
	 */
	function get_all_product_category($params = array())
	{
		$this->db->order_by('id_product_category', 'desc');
		if(isset($params) && !empty($params))
		{
			$this->db->limit($params['limit'], $params['offset']);
		}
		return $this->db->get('product_category')->result_array();
	}

	/*
	 * function to add new product_category
	 */
	function add_product_category($params)
	{
		$this->db->insert('product_category',$params);
		return $this->db->insert_id();
	}

	/*
	 * function to update product_category
	 */
	function update_product_category($id_product_category,$params)
	{
		$this->db->where('id_product_category',$id_product_category);
		return $this->db->update('product_category',$params);
	}

	/*
	 * function to delete product_category
	 */
	function delete_product_category($id_product_category)
	{
		return $this->db->delete('product_category',array('id_product_category'=>$id_product_category));
	}
}
