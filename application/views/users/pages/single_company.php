<div class="content_area" style="margin-bottom: 20%">
    <div class="container">
        <div class="row">

            <div class="widget widget-inverse">
                <div class="widget-body padding-bottom-none">

                    <div class="company_info">
                        <div class="col-lg-6">
                            <p class="lead">Company information</p>
                            <div><img src="<? echo base_url().'uploads/'.$data['c_logo'] ?>" height="200" width="300"/></div>
                            <h3 style="font-weight:bold;font-size:28px"><? echo $data['c_name'] ?></h3>
                            <address class="margin-none">
                                <div>
                                    <h4>email:<? echo $data['c_email'] ?></h4>
                                </div>
                                <div>
                                    <h4>work zone:<? echo $data['c_zone'] ?></h4>
                                </div>
                            </address>
                        </div>

                        <div class="col-lg-6">
                            <!--<p class="lead">Customer Rating</p>
                            <div class="star-rating center">
                                <span class="fa fa-star-o" data-rating="1"></span>
                                <span class="fa fa-star-o" data-rating="2"></span>
                                <span class="fa fa-star-o" data-rating="3"></span>
                                <span class="fa fa-star-o" data-rating="4"></span>
                                <span class="fa fa-star-o" data-rating="5"></span>
                                <input type="hidden" name="whatever" class="rating-value" value="3">
                            </div>
                            -->

                            <div class="margin-none center" style="background:#CB4040;text-align:center;color:#fff">
                                <p class="margin-none alert bg-primary"><i class="fa fa-fw fa-exclamation-circle"></i><strong>Note:</strong> Minimum order is <? echo $data['min_order'] ?> tk</p>
                            </div>

                        </div>
                    </div>

                    <!-- </div> -->

                    <!-- row-app -->
                    <div class="row row-app">

                        <!-- col -->
                        <div class="col-lg-8">

                            <table class="table table-vertical-center bg-white margin-none">
                                <thead class="bg-primary">
                                <tr>
                                    <th style="width: 100%;" class="left">searvices</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?
                                $i = 0;
                                $services = $this->db->get_where('company_services',array('c_id'=>$data['c_id']))->result_array();

                                if(sizeof($services) > 0)
                                {
                                    foreach ($services as $s) {

                                            ?>
                                            <tr>
                                                <td><span id="<? echo ++$i; ?>"><? echo $s['s_name'] ?></span></td>
                                                <td class="center"><span id="<? echo ++$i; ?>"><? echo $s['s_cost'] ?>tk</span></td>
                                                <td><input type="text" id="<? echo ++$i; ?>" placeholder="enter amount"/></td>
                                                <td><input type="button" id="<? echo ++$i; ?>" class="btn btn-success" onclick="erfan(this)" value="Add" /></td>
                                            </tr>
                                        <?

                                    }
                                }
                                else
                                {
                                    echo 'currently no services available';
                                }


                                ?>
                                <!-- Cart item -->

                                </tbody>
                            </table>

                        </div>
                        <!-- // END col -->

                        <!-- col -->
                        <div class="col-lg-4">

                            <div class="bg-white box-generic margin-none heading-buttons innerAll half">
                                <h4 class="margin-none padding-none center">Shopping cart</h4>
                                <div class="clearfix"></div>
                            </div>

                            <div class="bg-white box-generic padding-none border-top-none">

                                <table class="table table-vertical-center bg-white margin-none">
                                    <tbody id="cart">
                                    <!-- Cart item -->

                                    <!-- // Cart item END -->
                                    </tbody>
                                </table>

                                <table class="table cart_total margin-none">
                                    <tbody>
                                    <tr>
                                        <td class="right">Delivery Fee:</td>
                                        <td class="right strong"><? echo $delivery_fee; ?> tk</td>
                                    </tr>
                                    <tr>
                                        <td class="right">Total:</td>
                                        <td class="right strong"><span id="total"></span> tk</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="block">
                                    <div style="display: none">
                                        <div id="user_id"><?
                                                $user = json_decode($this->session->userdata('user_login'),true);
                                                echo $user['u_id'];
                                            ?></div>
                                        <div id="company_name"><? echo $data['c_name'] ?></div>
                                        <div id="adv_id"><? echo $data['c_id'] ?></div>
                                    </div>
                                    <div class="box-generic bg-primary-light center">
                                        <div class="timeline-top-info border-bottom">
                                            <p class="text-regular margin-none">Minimum order is <span id="min"><? echo $data['min_order'] ?></span> tk</p>
                                        </div>
                                        <div class="timeline-top-info inline-block">
                                            <p style="font-size:9px;" class="text-muted2 margin-none">(You can order less but you may be charged the minimum)</p>
                                        </div>
                                    </div>

                                    <div class="separator bottom"></div>
                                    <div class="separator border-top" style="margin-top:15px"></div>
                                    <div class="row form-group">
                                        <div class="col-xs-6">
                                            <div class="input-group date">
                                                <input type="text" class="form-control" id="pick_date" placeholder="Pick up Date">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" class="form-control" id="pick_time" placeholder="Pick up Time">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="delivery_date" placeholder="Delivery Date">
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" class="form-control" id="delivery_time" placeholder="Delivery Time">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" id="order" class="btn btn-primary btn-block">Order</button>
                                        </div>
                                    </div>
                                    <div class="separator bottom"></div>
                                </div>
                            </div>
                        </div>
                        <!-- // END col -->
                    </div>
                    <!-- // END row-app -->

                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    var i = 0;
    localStorage.clear();

    $(document).ready(function() {
        $("#pick_date").datetimepicker({
            timepicker:false,
            format:'d/m/Y'
        });

        $("#pick_time").datetimepicker({
            datepicker:false,
            format:'H:i'
        });

        $("#delivery_date").datetimepicker({
            timepicker:false,
            format:'d/m/Y'
        });

        $("#delivery_time").datetimepicker({
            datepicker:false,
            format:'H:i'
        });
    });

    function erfan(element)
    {

        id = parseInt(element.getAttribute('id'));
        id--;
        amount = parseInt(document.getElementById(id).value);
        id--;
        price = parseInt(document.getElementById(id).innerHTML);
        id--;
        service = document.getElementById(id).innerHTML;

        if(!isNaN(amount))
        {
            data = {'key':i,'amount':amount,'service':service,'price':price};


            localStorage.setItem(i,JSON.stringify(data));
            i++;

            display();
        }
        else
        {
            alert("insert a amount");
        }

    }


    function removeItem(id)
    {
        localStorage.removeItem(id);
        display();
    }

    function display()
    {
        document.getElementById('cart').innerHTML = '';
        total = 0;
        for(j=0;j<localStorage.length;j++)
        {
            key = localStorage.key(j);
            data = JSON.parse(localStorage.getItem(key));

            str = '<tr><td class="text-right"><button class="btn btn-danger" onclick="removeItem('+data['key']+')">remove</button></td>';
            str = str + '<td class="right">'+data['amount']+'</td><td class="left">'+data['service']+'</td><td class="right">X</td><td class="left">'+data['price']+'tk</td><td class="right">'+parseFloat(data['amount']*data['price'])+'tk</td>';
            str = str +'</tr>';
            total = total + parseFloat(data['amount']*data['price']);
            document.getElementById('cart').innerHTML = document.getElementById('cart').innerHTML+str;
        }
        total = total+parseInt('<? echo $delivery_fee; ?>');
        document.getElementById("total").innerHTML = total;
    }


    document.getElementById("order").onclick = function() {
        user_id = document.getElementById("user_id").innerHTML;
        adv_id = document.getElementById("adv_id").innerHTML;
        amount = parseInt(document.getElementById("total").innerHTML);
        pick_date = document.getElementById("pick_date").value;
        pick_time = document.getElementById("pick_time").value;
        delivery_date = document.getElementById("delivery_date").value;
        delivery_time = document.getElementById("delivery_time").value;
        orders = '';

        data = {};

        for(i=0;i<localStorage.length;i++)
        {
            key = localStorage.key(i);
            data[i] = localStorage.getItem(i);
        }

        orders = JSON.stringify(data);


        min = parseInt(document.getElementById("min").innerHTML);


        if(user_id != '' && adv_id != '' && amount != '' && pick_date != '' && pick_time != '' && delivery_date != '' && delivery_time != '')
        {
            if(amount > min)
            {
                packet = {'u_id':user_id,'c_id':adv_id,'o_amount':amount,'p_date':pick_date,'p_time':pick_time,'d_date':delivery_date,'d_time':delivery_time,'o_services':orders};

                $.ajax({
                    url:'<? echo base_url(); ?>users/give_order',
                    method:'POST',
                    data:{'order':JSON.stringify(packet)},
                    success:function(data)
                    {
                        if(data == '1')
                        {
                            window.location = '<? echo base_url() ?>users/order_log_view/'+user_id;
                        }
                        else
                        {
                            alert("Unknown error occurred");
                        }
                    }
                });
            }
            else
            {
                alert("you are giving less than minimum amount");
            }
        }
        else
        {
            alert("please fill up the form properly");
        }


    }
</script>
