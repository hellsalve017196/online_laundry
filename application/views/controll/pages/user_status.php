<div id="content">
    <section>
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <?
                if(sizeof($orders) > 0)
                {
                    ?>
                    <table class="table">
                        <tr>
                            <td><strong>Order Id</strong></td>
                            <td><strong>Order Date</strong></td>
                            <td><strong>Company Name</strong></td>
                            <td><strong>Customer name</strong></td>
                            <td><strong>Customer phone</strong></td>
                            <td><strong>Customer email</strong></td>
                            <td><strong>Services(with delivery fee)</strong></td>
                            <td><strong>Decesion</strong></td>
                        </tr>
                        <?
                        foreach($orders as $o)
                        {
                            ?>
                            <tr>
                                <td><strong><? echo $o['o_id']; ?></strong></td>
                                <td><strong><? echo $o['o_date']; ?></strong></td>
                                <td><strong><? echo $o['c_name']; ?></strong></td>
                                <td><strong><? echo $o['u_fullname']; ?></strong></td>
                                <td><strong><? echo $o['u_phone']; ?></strong></td>
                                <td><strong><? echo $o['u_email']; ?></strong></td>
                                <td>
                                    <strong>
                                        <table class="table">
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
                                <td>
                                    <?
                                    if($o['o_read'] == '1')
                                    {
                                        ?>
                                        <p><a target="_blank" href="<? echo base_url().'admin/generating_envoice/'.$o['o_id'] ?>" onclick="zn(<? echo $o['o_id'] ?>)" class="btn btn-danger">Envoice</a></p>
                                    <?
                                    }
                                    else
                                    {
                                        ?>
                                        <p><a target="_blank" href="<? echo base_url().'admin/generating_envoice/'.$o['o_id'] ?>" class="btn btn-success">Envoice</a></p>
                                    <?
                                    }
                                    ?>

                                    <p><a href="<? echo base_url().'admin/delete_order/'.$o['o_id'] ?>" class="btn btn-warning">Delete</a></p>
                                </td>
                            </tr>
                        <?
                        }
                        ?>
                    </table>
                <?
                }
                else
                {
                    echo '<h1>There are currently no orders</h1>';
                }
                ?>

            </div><!--end .card-body -->
        </div>

    </section>
</div>
<script>
    function zn(o_id)
    {
        http = '<? echo base_url().'admin/unread_order/' ?>'+o_id;

        $.ajax({
            url:http,
            method:'GET',
            data:{},
            success:function(data)
            {
                if(data == '1')
                {
                    window.location = '<? echo base_url() ?>admin/order_log_view';
                }
            }
        });
    }
</script>