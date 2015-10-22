<?php

class admin_model extends CI_Model
{
    //add company
    public function add_company($data)
    {
        $flag = false;

        if($this->db->insert("company",$data))
        {
            $flag = $this->db->insert_id();
        }

        return $flag;
    }

    //company by id
    public function company_by_id($id)
    {
        $data = array();
        $query = $this->db->get_where('company',array('c_id'=>$id));

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
        }

        return $data;
    }

    //add services
    public function add_services($services)
    {
        $flag = false;

        if($this->db->insert_batch('company_services',$services))
        {
            $flag = true;
        }

        return $flag;
    }

    //edit company basic information
    public function edit_company($company)
    {
        $flag = false;

        $this->db->where('c_id',$company['c_id']);

        if($this->db->update('company',$company))
        {
            $flag = true;
        }

        return $flag;
    }

    //service by company id
    public function service_by_company($c_id)
    {
        $data = array();
        $query = $this->db->get_where('company_services',array("c_id"=>$c_id));

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //edit service
    public function edit_service($service)
    {
        $flag = false;

        $this->db->where('s_id',$service['s_id']);

        if($this->db->update('company_services',$service))
        {
            $flag = true;
        }

        return $flag;
    }

    //delete service
    public function delete_service($s_id)
    {
        $flag = false;

        if($this->db->delete('company_services',array('s_id'=>$s_id)))
        {
            $flag = true;
        }

        return $flag;
    }

    //company list
    public function company_list()
    {
        $data = array();
        $this->db->from('company');
        $this->db->order_by('c_id','desc');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }
        return $data;
    }

    //delete company
    public function remove_company($c_id)
    {
        $flag = false;
        $query = $this->db->get_where('company',array('c_id'=>$c_id));

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
            unlink('uploads/'.$data['c_logo']);

            if($this->db->delete('company',array('c_id'=>$c_id)))
            {
                $flag = true;
            }
        }

        return $flag;
    }

    //new order notification
    public function new_order()
    {
        $data = array();
        $query = $this->db->get_where('orders',array('o_read'=>'1'));

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //new order notification
    public function new_complain()
    {
        $data = array();
        $query = $this->db->get_where('complain',array('complain_read'=>'1'));

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //generating order log
    public function order_log()
    {
        $data = array();

        $query = $this->db->query('SELECT orders.o_id,orders.o_date,orders.o_amount,company.c_name,company.c_phone,user.u_phone,user.u_email,user.u_fullname,user.u_address,orders.o_services,orders.o_amount,orders.o_read,orders.p_date,orders.p_time,orders.d_date,orders.d_time FROM orders JOIN company ON orders.c_id = company.c_id JOIN user ON orders.u_id = user.u_id ORDER BY orders.o_id DESC');

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //deleting order
    public function delete_order($o_id)
    {
        $flag = false;

        if($this->db->delete('orders',array('o_id'=>$o_id)))
        {
            $flag = true;
        }

        return $flag;
    }

    //unread order
    public function unread_order($o_id)
    {
        $flag = false;

        if($this->db->query("UPDATE orders SET o_read = 0 WHERE o_id =".$o_id))
        {
            $flag = !($flag);
        }

        return $flag;
    }

    //individual user order
    public function order_log_for_a_user($o_id)
    {
        $data = array();

        $query = $this->db->query('SELECT orders.o_id,orders.o_date,orders.o_amount,company.c_name,company.c_phone,user.u_phone,user.u_email,user.u_fullname,user.u_address,orders.o_services,orders.o_amount,orders.o_read,orders.p_date,orders.p_time,orders.d_date,orders.d_time FROM orders JOIN company ON orders.c_id = company.c_id JOIN user ON orders.u_id = user.u_id WHERE orders.o_id = '.$o_id);

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //individual user order
    public function order_log_for_a_user_by_id($u_id)
    {
        $data = array();

        $query = $this->db->query('SELECT orders.o_id,orders.o_date,orders.o_amount,company.c_name,company.c_phone,user.u_phone,user.u_email,user.u_fullname,user.u_address,orders.o_services,orders.o_amount,orders.o_read,orders.p_date,orders.p_time,orders.d_date,orders.d_time FROM orders JOIN company ON orders.c_id = company.c_id JOIN user ON orders.u_id = user.u_id WHERE orders.u_id = '.$u_id.' ORDER BY orders.o_id DESC');

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //complain list
    public function complain_list()
    {
        $data = array();
        $query = $this->db->query("SELECT complain.complain_id,complain.complain_date,complain.complain,complain.complain_read,user.u_fullname,user.u_address,user.u_phone,user.u_email FROM complain JOIN user ON complain.u_id = user.u_id ORDER BY complain.complain_id DESC");

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //complain by id
    public function complain_by_id($complain_id)
    {
        $data = array();
        $query = $this->db->query("SELECT complain.complain_id,complain.complain_date,complain.complain,complain.complain_read,user.u_fullname,user.u_address,user.u_phone,user.u_email FROM complain JOIN user ON complain.u_id = user.u_id WHERE complain.complain_id=".$complain_id);

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
        }

        return $data;
    }

    //unread complain
    public function unread_complain($complain_id)
    {
        $flag = false;

        if($this->db->query("UPDATE complain SET complain_read = 0 WHERE complain_id =".$complain_id))
        {
            $flag = !($flag);
        }

        return $flag;
    }

    //deleting complain
    public function delete_complain($complain_id)
    {
        $flag = false;

        if($this->db->delete('complain',array('complain_id'=>$complain_id)))
        {
            $flag = true;
        }

        return $flag;
    }

    //user list
    public function user_list()
    {
        $data = array();
        $query = $this->db->query("SELECT u_id,u_fullname,u_phone,u_address,u_email FROM user ORDER BY u_id DESC");

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //banne user
    public function banning_user($u_id)
    {
        $flag = false;

        if($this->db->delete('user',array('u_id'=>$u_id)))
        {
            $flag = !($flag);
        }

        return $flag;
    }
}