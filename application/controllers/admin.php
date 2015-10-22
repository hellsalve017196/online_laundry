<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
    public $d_f = 50;

    public function index()
    {
        $this->load->model('admin_model','a');

        $data['page_name'] = 'dashboard';
        $data['title'] = 'Dashboard';

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();

        $this->load->view('controll/index',$data);
    }

    public function adding_company_view()
    {
        $data['page_name'] = 'add_company';
        $data['title'] = 'Adding Company';

        $this->load->model('admin_model','a');
        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();

        $this->load->view('controll/index',$data);
    }

    public function add_company()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = "*";
        $config['encrypt_name'] = TRUE;

        $company = json_decode($this->input->post('company'),true);


        $this->load->library('upload',$config);

        if($this->upload->do_upload())
        {
            $file = $this->upload->data();

            $company['c_logo'] = $file['file_name'];

            $this->load->model('admin_model','a');

            $e_id = $this->a->add_company($company);

            echo $e_id;
        }
    }

    public function add_service_view($c_id)
    {
        $this->load->model('admin_model','a');

        $company = $this->a->company_by_id($c_id);

        $data['page_name'] = 'add_services';
        $data['title'] = 'Adding Services';
        $data['company'] = $company;

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();


        $this->load->view('controll/index',$data);
    }

    public function add_service()
    {
        $services = json_decode($this->input->post('services'),true);

        $this->load->model('admin_model','a');

        if($this->a->add_services($services)){
            echo '0';
        }
        else
        {
            echo '1';
        }
    }

    public function edit_basic_company_info_view($c_id)
    {
        $this->load->model('admin_model','a');

        $company = $this->a->company_by_id($c_id);

        $data['page_name'] = 'edit_company';
        $data['title'] = 'Editing Company info';
        $data['company'] = $company;

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();


        $this->load->view('controll/index',$data);
    }

    public function edit_company()
    {
        $company = json_decode($this->input->post('company'),true);

        $this->load->model('admin_model','a');

        if($this->a->edit_company($company))
        {
            echo '0';
        }
        else
        {
            echo '1';
        }
    }

    public function edit_service_view($c_id)
    {
        $this->load->model('admin_model','a');

        $company = $this->a->company_by_id($c_id);
        $services = $this->a->service_by_company($c_id);

        $data['page_name'] = 'edit_services';
        $data['title'] = 'Editing Company services';
        $data['company'] = $company;
        $data['s'] = $services;

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();


        $this->load->view('controll/index',$data);
    }

    public function edit_service()
    {
        $service = json_decode($this->input->post('service'),true);

        $this->load->model('admin_model','a');

        if($this->a->edit_service($service))
        {
            echo '0';
        }
    }

    public function delete_service($c_id,$s_id)
    {
        $this->load->model('admin_model','a');

        if($this->a->delete_service($s_id))
        {
            redirect(base_url().'admin/edit_service_view/'.$c_id,'refresh');
        }
        else
        {
            echo "invalid usage";
        }
    }

    public function company_list()
    {
        $this->load->model('admin_model','a');
        $company = $this->a->company_list();

        $data['page_name'] = 'company_list';
        $data['title'] = 'Editing Company services';
        $data['company'] = $company;

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();

        $this->load->view('controll/index',$data);
    }

    public function company_delete($c_id)
    {
        $this->load->model('admin_model','a');

        if($this->a->remove_company($c_id))
        {
            redirect(base_url().'admin/company_list','refresh');
        }
        else
        {
            echo "invalid";
        }
    }

    public function order_log_view()
    {
        $this->load->model('admin_model','a');

        $data['page_name'] = 'order_log';
        $data['title'] = 'Orders';

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();
        $data['orders'] = $this->a->order_log();
        $data['delivery_fee'] = $this->d_f;

        $this->load->view('controll/index',$data);
    }

    public function delete_order($o_id)
    {
        $this->load->model('admin_model','a');

        $flag = $this->a->delete_order($o_id);

        redirect(base_url().'admin/order_log_view','refresh');
    }

    public function unread_order($o_id)
    {
        $this->load->model('admin_model','a');

        if($this->a->unread_order($o_id))
        {
            echo '1';
        }
        else
        {
            echo '0';
        }
    }

    public function complain_list_view()
    {
        $this->load->model('admin_model','a');

        $data['page_name'] = 'complain_list';
        $data['title'] = 'Complains';

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();
        $data['complains'] = $this->a->complain_list();

        $this->load->view('controll/index',$data);
    }

    public function complain_unread($complain_id)
    {
        $this->load->model('admin_model','a');

        if($this->a->unread_complain($complain_id))
        {
            redirect(base_url().'admin/complain_details_view/'.$complain_id,'refresh');
        }
    }

    public function complain_details_view($complain_id)
    {
        $this->load->model('admin_model','a');

        $data['page_name'] = 'complain_details';
        $data['title'] = 'Complain Details';

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();
        $data['complain'] = $this->a->complain_by_id($complain_id);

        $this->load->view('controll/index',$data);
    }

    public function complain_delete($complain_id)
    {
        $this->load->model('admin_model','a');

        $flag = $this->a->delete_complain($complain_id);

        redirect(base_url().'admin/complain_list_view','refresh');
    }

    public function user_list_view()
    {
        $this->load->model('admin_model','a');

        $data['page_name'] = 'user_list';
        $data['title'] = 'User List';

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();
        $data['users'] = $this->a->user_list();

        $this->load->view('controll/index',$data);
    }

    public function user_status_view($u_id)
    {
        $this->load->model('admin_model','a');

        $data['page_name'] = 'user_status';
        $data['title'] = 'User Status';

        $data['new_order'] = $this->a->new_order();
        $data['new_complain'] = $this->a->new_complain();
        $data['orders'] = $this->a->order_log_for_a_user_by_id($u_id);
        $data['delivery_fee'] = $this->d_f;

        $this->load->view('controll/index',$data);
    }

    public function user_banne($u_id)
    {
        $this->load->model('admin_model','a');

        $flag = $this->a->banning_user($u_id);

        redirect(base_url().'admin/user_list_view','refresh');
    }

    public function generating_envoice($o_id)
    {
        header('Content-type','text/html');

        $this->load->model('admin_model','a');

        $orders = $this->a->order_log_for_a_user($o_id);
        $delivery_fee = $this->d_f;

        header("Content-Disposition:attachment;filename='Order-".$o_id.".html'");

        if(sizeof($orders) > 0)
        {
            echo '<html><head></head><body>';
            ?>

            <div align="center">
                <h1>Online Laundry Service</h1>
                <table width="500">
                    <tr>
                        <td><strong>Order Date:</strong></td>
                        <td><? echo $orders[0]['o_date']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Company Name:</strong></td>
                        <td><? echo $orders[0]['c_name']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Customer name:</strong></td>
                        <td><? echo $orders[0]['u_fullname']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Customer phone:</strong></td>
                        <td><? echo $orders[0]['u_phone']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Customer email:</strong></td>
                        <td><? echo $orders[0]['u_email']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Customer address:</strong></td>
                        <td><? echo $orders[0]['u_address']; ?></td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <br>
            <?
            ?>
            <table border="1" align="center">
                <tr>
                    <td><strong>Services(with delivery fee)</strong></td>
                </tr>
                <?
                foreach($orders as $o)
                {
                    ?>
                    <tr>
                        <td>
                            <strong>
                                <table border="1">
                                    <tr>
                                        <td>Service Name</td>
                                        <td>Service Cost</td>
                                        <td>Amount</td>
                                        <td>Sub total</td>
                                    </tr>
                                    <?
                                    $o_services = json_decode($o['o_services'],true);

                                    foreach($o_services as $s)
                                    {
                                        $s = json_decode($s,true);
                                        ?>
                                        <tr>
                                            <td><? echo $s['service']; ?></td>
                                            <td><? echo $s['price']; ?> tk</td>
                                            <td><? echo $s['amount']; ?></td>
                                            <td><? echo $s['price'] * $s['amount']; ?> tk</td>
                                        </tr>
                                    <?
                                    }
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Delivery Fee</td>
                                        <td><p><? echo $delivery_fee; ?> tk</p></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total</td>
                                        <td><p><? echo $o['o_amount']; ?> tk</p></td>
                                    </tr>
                                </table>
                            </strong>
                        </td>
                    </tr>
                <?
                }
                ?>
            </table>
            </body>
        <?
        }
        else
        {
            echo '<h1>There are currently no orders</h1>';
        }

    }
}