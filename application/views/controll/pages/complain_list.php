<div id="content">
    <section>
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <?
                    if(sizeof($complains) > 0)
                    {
                        ?>
                        <table class="table">
                            <tr>
                                <td>Complain Date</td>
                                <td>Customer Name</td>
                                <td>Customer Phone</td>
                                <td>Customer Email</td>
                                <td>Complain Details</td>
                            </tr>

                            <?
                                foreach($complains as $c)
                                {
                                    ?>
                                    <tr>
                                        <td><? echo $c['complain_date'] ?></td>
                                        <td><? echo $c['u_fullname'] ?></td>
                                        <td><? echo $c['u_phone'] ?></td>
                                        <td><? echo $c['u_email'] ?></td>
                                        <td>

                                            <?
                                            if($c['complain_read'] == '1')
                                            {
                                                ?>
                                                <p><a href="<? echo base_url().'admin/complain_unread/'.$c['complain_id'] ?>" class="btn btn-danger">Details</a></p>
                                            <?
                                            }
                                            else
                                            {
                                                ?>
                                                <p><a href="<? echo base_url().'admin/complain_details_view/'.$c['complain_id'] ?>" class="btn btn-success">Details</a></p>
                                            <?
                                            }
                                            ?>

                                            <p><a href="<? echo base_url().'admin/complain_delete/'.$c['complain_id'] ?>" class="btn btn-warning">Delete</a></p>

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
                        echo '<h1>There are no complains Currently</h1>';
                    }
                ?>
            </div><!--end .card-body -->
        </div>

    </section>
</div>