<div class="container">

    <div class="row">



        <div class="col-md-12">

            <div class="row">
                <div class="col-lg-12">
                    <h3>Compare companies Services</h3>
                </div>
            </div>

            <?
            if(sizeof($company) > 0)
            {
                foreach($company as $k)
                {
                    $c = $this->db->get_where('company',array('c_id'=>$k))->row_array();

                    ?>
                    <div class="col-md-3">
                        <div class="md-border" style="border: 1px solid #d3d3d3;border-radius: 5px">
                            <div align="center">
                                <img src="<? echo base_url() ?>uploads/<? echo $c['c_logo']; ?>" height="200" width="200"/>
                            </div>
                            <div align="center">
                                <p><? echo $c['c_name']; ?></p>
                            </div>
                            <div>
                                <table class="table">
                                    <tr>
                                        <td>Service name</td>
                                        <td>Service Price</td>
                                    </tr>
                                    <?
                                        $service = $this->db->get_where('company_services',array('c_id'=>$c['c_id']))->result_array();

                                        if(sizeof($service) > 0)
                                        {
                                            foreach($service as $s)
                                            {
                                                ?>
                                                <tr>
                                                    <td><? echo $s['s_name'] ?></td>
                                                    <td><? echo $s['s_cost'] ?> tk</td>
                                                </tr>
                                                <?
                                            }
                                        }
                                        else
                                        {
                                            echo 'currently no service';
                                        }
                                    ?>
                                </table>
                            </div>
                            <div align="center">
                                <p>
                                    <a href="<? echo base_url().'users/company_details/'.$c['c_id'] ?>" class="btn btn-primary">Order</a> <a href="<? echo base_url() ?>users/delete_compare/<? echo $c['c_id'] ?>" class="btn btn-warning">Remove</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?
                }
            }
            else
            {
                echo '<div class="alert alert-info" style="text-align: center"><strong>nothing add to compare</strong></div>';
            }
            ?>

        </div>

    </div>

</div>