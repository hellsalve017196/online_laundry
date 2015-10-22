<?php

class users extends CI_Controller {

    public $d_f = 50,$min_order = 40;

    public function index()
    {
        $this->load->model('user_model','u');

        $data['page_name'] = 'home';
        $data['page_title'] = 'Home';

        $data['company'] = $this->u->latest_company();


        $this->load->view('users/index',$data);
    }

    public function company_search_view()
    {
        $this->load->model('user_model','u');

        $data['page_name'] = 'company_search';
        $data['page_title'] = 'Company search';
        $data['company'] = $this->u->all_company();

        $this->load->view('users/index',$data);
    }

    public function search_company()
    {
        $data = array();

        $this->load->model('user_model','u');
        $key = strtolower($this->input->post('key'));

        if(strlen($key) > 0)
        {
            $data = $this->u->company_by_key($key);
        }
        else
        {
            $data = $this->u->all_company($key);
        }

        echo json_encode($data);
    }

    public function company_compare()
    {
        $data['page_name'] = 'company_compare';
        $data['page_title'] = 'Company Compare';
        $data['company'] = array();

        if($this->input->cookie('c_id') != null)
        {
            $data['company'] = json_decode($this->input->cookie('c_id'),true);
        }

        $this->load->view('users/index',$data);
    }

    public function add_to_compare($c_id)
    {
        if($this->input->cookie('c_id') == null)
        {
            $data = array();
            $data[] = $c_id;

            $cookie = array(
                'name'   => 'c_id',
                'value'  => json_encode($data),
                'expire' => '3600',
                'path'   => '/',
            );

            $this->input->set_cookie($cookie);
        }
        else
        {
            $data = json_decode($this->input->cookie('c_id'),true);
            $data[] = $c_id;

            $cookie = array(
                'name'   => 'c_id',
                'value'  => json_encode($data),
                'expire' => '3600',
                'path'   => '/',
            );

            $this->input->set_cookie($cookie);
        }

        redirect(base_url().'users/company_compare','refresh');
    }

    public function delete_compare($c_id)
    {
        $tmp = array();
        $main = json_decode($this->input->cookie('c_id'),true);

        foreach($main as $m)
        {
            if($m != $c_id)
            {
                $tmp[] = $m;
            }
        }

        $cookie = array(
            'name'   => 'c_id',
            'value'  => json_encode($tmp),
            'expire' => '3600',
            'path'   => '/',
        );

        $this->input->set_cookie($cookie);

        redirect(base_url().'users/company_compare','refresh');
    }

    public function company_details($c_id)
    {
        $this->load->model('user_model','u');

        $data['page_name'] = 'single_company';
        $data['page_title'] = 'Order';
        $data['data'] = $this->u->company_by_id($c_id);

        //minimum order
        $data['data']['min_order'] = $this->min_order;
        $data['delivery_fee'] = $this->d_f;

        $this->load->view('users/index',$data);
    }

    public function give_order()
    {
        $this->load->model('user_model','u');

        $order = json_decode($this->input->post('order'),true);

        if($this->u->giving_order($order))
        {
            echo '1';
        }

    }

    public function order_log_view($u_id)
    {
        $this->load->model('user_model','u');

        $data['page_name'] = 'user_order_log';
        $data['page_title'] = 'Order History';
        $data['orders'] = $this->u->order_log_for_a_user($u_id);
        $data['delivery_fee'] = $this->d_f;

        $this->load->view('users/index',$data);
    }

    public function complain_view()
    {
        $data['page_name'] = 'user_complain';
        $data['page_title'] = 'User complain';

        $this->load->view('users/index',$data);
    }

    public function complain_submit()
    {
        $this->load->model('user_model','u');
        $complain = json_decode($this->input->post('complain'));

        if($this->u->give_complain($complain))
        {
            echo '1';
        }

    }
}