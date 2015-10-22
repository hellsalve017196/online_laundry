<?php

class user_model extends CI_Model
{
    //all the company
    public function all_company()
    {
        $data = array();
        $query = $this->db->query("SELECT c_id,c_zone,c_name,c_logo FROM company ORDER BY c_id DESC");

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //latest complany
    public function latest_company()
    {
        $data = array();
        $query = $this->db->query("SELECT c_id,c_zone,c_name,c_logo FROM company ORDER BY c_id DESC LIMIT 10");

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //search company by key
    public function company_by_key($key)
    {
        $data = array();
        $query = $this->db->query("SELECT c_id,c_name,c_zone,c_logo,c_address FROM company WHERE c_address LIKE '%".$key."%' ORDER BY c_id DESC");

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //individual companys data
    public function company_by_id($id)
    {
        $main = array();
        $query = $this->db->get_where('company',array('c_id'=>$id));
        
        if($query->num_rows() > 0)
        {
            $main = $query->row_array();
        }

        return $main;
    }

    //service by company
    public function company_service($id)
    {
        $service = array();
        $query = $this->db->get_where('company_services',array('c_id'=>$id));

        if($query->num_rows() > 0)
        {
            $service = $query->row_array();
        }

        return $service;
    }

    //give order to company
    public function giving_order($data)
    {
        $data['o_date'] = date('d-m-Y',time());

        $flag = false;

        if($this->db->insert('orders',$data))
        {
            $flag = true;
        }

        return $flag;
    }

    //generating order log
    public function order_log_for_a_user($u_id)
    {
        $data = array();

        $query = $this->db->query('SELECT orders.o_id,orders.o_date,orders.o_amount,company.c_name,company.c_phone,user.u_phone,user.u_email,user.u_fullname,user.u_address,orders.o_services,orders.o_amount,orders.o_read,orders.p_date,orders.p_time,orders.d_date,orders.d_time FROM orders JOIN company ON orders.c_id = company.c_id JOIN user ON orders.u_id = user.u_id WHERE orders.u_id = '.$u_id.' ORDER BY orders.o_id DESC');

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //giving complain
    public function give_complain($complain)
    {
        $flag = false;

        if($this->db->insert('complain',$complain))
        {
            $flag = true;
        }

        return $flag;
    }
}