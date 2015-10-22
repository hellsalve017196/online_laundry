<div id="content">
    <section>
        <br>
        <br>
        <div class="card">
            <div class="card-body">

                <?
                    if(sizeof($users) > 0)
                    {
                        ?>
                        <table class="table">
                            <tr>
                                <td>Customer Name</td>
                                <td>Customer phone</td>
                                <td>Customer email</td>
                                <td>Customer Address</td>
                                <td>Decesion</td>
                            </tr>

                            <?
                                foreach($users as $u)
                                {
                                    ?>
                                    <tr>
                                        <td><? echo $u['u_fullname'] ?></td>
                                        <td><? echo $u['u_phone'] ?></td>
                                        <td><? echo $u['u_email'] ?></td>
                                        <td><? echo $u['u_address'] ?></td>
                                        <td><p><a href="<? echo base_url() ?>admin/user_status_view/<? echo $u['u_id'] ?>" class="btn btn-primary">Status</a></p><p><a href="<? echo base_url() ?>admin/user_banne/<? echo $u['u_id'] ?>" class="btn btn-danger">Banne</a></p></td>
                                    </tr>
                                    <?
                                }
                            ?>
                        </table>
                        <?
                    }
                    else
                    {
                        echo '<h1>currently no users</h1>';
                    }
                ?>

            </div><!--end .card-body -->
        </div>

    </section>
</div>