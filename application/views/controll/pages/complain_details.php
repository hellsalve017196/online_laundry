<div id="content">
    <section>
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <p><a href="<? echo base_url() ?>admin/complain_list_view" class="btn btn-primary">Back</a></p>
                <h1>Complain Details</h1>
                <div class="col-md-6 col-sm-offset-3">
                    <?
                        if(sizeof($complain) > 0)
                        {
                            ?>
                            <table class="table" style="font-weight: bold">
                                <tr>
                                    <td><strong>Complain Date</strong></td>
                                    <td><strong><? echo $complain['complain_date'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Complain By</strong></td>
                                    <td><strong><? echo $complain['u_fullname'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Customer phone</strong></td>
                                    <td><strong><? echo $complain['u_phone'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Customer Address</strong></td>
                                    <td><strong><? echo $complain['u_address'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Customer Email</strong></td>
                                    <td><strong><? echo $complain['u_email'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Complain</strong></td>
                                    <td><strong style="color:red"><? echo $complain['complain'] ?></strong></td>
                                </tr>
                            </table>
                            <?
                        }
                    ?>
                </div>
            </div><!--end .card-body -->
        </div>

    </section>
</div>