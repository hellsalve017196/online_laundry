<div id="content">
    <section>
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Company Name</td>
                        <td colspan="4">Decesion</td>
                    </tr>
                    <?
                        if(sizeof($company) > 0)
                        {
                            foreach($company as $c)
                            {
                                ?>
                                <tr>
                                    <td><? echo $c['c_name'] ?></td>
                                    <td><a class="btn btn-success" href="<? echo base_url() ?>admin/add_service_view/<? echo $c['c_id'] ?>">Add Service</a></td>
                                    <td><a class="btn btn-primary" href="<? echo base_url() ?>admin/edit_service_view/<? echo $c['c_id'] ?>">Edit Service</a></td>
                                    <td><a class="btn btn-warning" href="<? echo base_url() ?>admin/edit_basic_company_info_view/<? echo $c['c_id'] ?>">Edit info</a></td>
                                    <td><a class="btn btn-danger" href="<? echo base_url() ?>admin/company_delete/<? echo $c['c_id'] ?>">Delete</a></td>
                                </tr>
                                <?
                            }
                        }
                    ?>
                </table>
            </div><!--end .card-body -->
        </div>

    </section>
</div>