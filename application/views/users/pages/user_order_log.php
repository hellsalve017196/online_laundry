<div class="container">

    <div class="row">



        <div class="col-md-12">

        <?
            if(sizeof($orders) > 0)
            {
                ?>
                <table class="table">
                    <tr>
                        <td><strong>Order Date</strong></td>
                        <td><strong>Company Name</strong></td>
                        <td><strong>Pickup date</strong></td>
                        <td><strong>Pickup time</strong></td>
                        <td><strong>Delivery date</strong></td>
                        <td><strong>Delivery time</strong></td>
                        <td><strong>Services(with delivery fee)</strong></td>
                    </tr>
                    <?
                        foreach($orders as $o)
                        {
                            ?>
                            <tr>
                                <td><strong><? echo $o['o_date']; ?></strong></td>
                                <td><strong><? echo $o['c_name']; ?></strong></td>
                                <td><strong><? echo $o['p_date']; ?></strong></td>
                                <td><strong><? echo $o['p_time']; ?></strong></td>
                                <td><strong><? echo $o['d_date']; ?></strong></td>
                                <td><strong><? echo $o['d_time']; ?></strong></td>
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

        </div>

    </div>

</div>