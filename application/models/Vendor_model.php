<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Vendor_model extends CI_Model
{
    var $table = 'vendor';
    var $column_order = array(null, 'vendor_name','username','profit','dtm_created','dtm_last_updated');
    var $column_search = array('vendor_name','username','profit','dtm_created','dtm_last_updated');
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
     * Get vendor by id_vendor
     */
    function get_vendor($id_vendor)
    {
        return $this->db->get_where('vendor',array('id_vendor'=>$id_vendor))->row_array();
    }
    
    /*
     * Get all vendor count
     */
    function get_all_vendor_count()
    {
        $this->db->from('vendor');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all vendor
     */
    function get_all_vendor($params = array())
    {
        $this->db->order_by('id_vendor', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('vendor')->result_array();
    }
        
    /*
     * function to add new vendor
     */
    function add_vendor($params)
    {
        $this->db->insert('vendor',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update vendor
     */
    function update_vendor($id_vendor,$params)
    {
        $this->db->where('id_vendor',$id_vendor);
        return $this->db->update('vendor',$params);
    }
    
    /*
     * function to delete vendor
     */
    function delete_vendor($id_vendor)
    {
        return $this->db->delete('vendor',array('id_vendor'=>$id_vendor));
    }
}
