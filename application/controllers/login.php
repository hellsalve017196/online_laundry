<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
    public function admin_login()
    {
        $this->load->view('login/index',array('page_name'=>'login'));
    }

    public function user_sign_up_view()
    {
        $data['page_name'] = 'sign_up';
        $data['page_title'] = 'User Sign up';

        $this->load->view('users/index',$data);
    }

    public function  user_sign_up()
    {
        $this->load->model('login_model','l');

        $new_user = json_decode($this->input->post('sign_up'),true);

        $flag = $this->l->user_sign_up($new_user);

        if($flag)
        {
            echo '1';
        }
        else
        {
            echo '0';
        }
    }

    public function user_log_in_view()
    {
        $data['page_name'] = 'user_login';
        $data['page_title'] = 'User Log In';

        $this->load->view('users/index',$data);
    }

    public function user_login()
    {
        $this->load->model('login_model','l');

        $user_entry = json_decode($this->input->post('log_in'),true);


        $user = $this->l->login_process($user_entry);

        if(sizeof($user) > 0)
        {
            $this->user_session(json_encode($user));
            echo 1;
        }
        else
        {
            echo '0';
        }
    }

    private function user_session($user)
    {
        $flag = false;

        $this->session->set_userdata('user_login',$user);

        return $flag;
    }

    public function user_logout()
    {
        $this->session->unset_userdata('user_login');

        redirect(base_url().'users/company_search_view','refresh');
    }
}