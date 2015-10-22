<div id="content">
    <section>
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <h1><? echo $company['c_name'] ?></h1>
                <table class="table">
                    <tr>
                        <td>Service name</td>
                        <td>Service Cost</td>
                        <td>Decision</td>
                    </tr>

                    <?
                        if(sizeof($s) > 0)
                        {
                            foreach($s as $service) {
                                ?>
                                <tr>
                                    <td><input id="k_<? echo $service['s_id'] ?>" type="text" style="display: none" value="<? echo $service['s_id'] ?>"><input id="n_<? echo $service['s_id'] ?>" type="text" value="<? echo $service['s_name'] ?>"></td>
                                    <td><input type="text" id="c_<? echo $service['s_id'] ?>" value="<? echo $service['s_cost'] ?>">tk</td>
                                    <td>
                                        <button onclick="zn(<? echo $service['s_id'] ?>)" class="btn btn-success">Edit</button>
                                        <br><br><a href="<? echo base_url() ?>admin/delete_service/<? echo $company['c_id'] ?>/<? echo $service['s_id'] ?>" class="btn btn-danger">Delete</a></td>
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
<script type="text/javascript">
    function zn(s_id)
    {
        service = {};

        service['s_id'] = $("#k_"+s_id).val();
        service['s_name'] = $("#n_"+s_id).val();
        service['s_cost'] = $("#c_"+s_id).val();

        if($.trim(service['s_id']) != '' && $.trim(service['s_name']) != '' && $.trim(service['s_cost']) != '')
        {
            http = '<? echo base_url() ?>admin/edit_service';

            $.ajax({
                method:'POST',
                url:http,
                data:{'service':JSON.stringify(service)},
                success:function(data) {

                    if(data == '0')
                    {
                        window.location = '<? echo base_url() ?>admin/edit_service_view/<? echo $company['c_id'] ?>';
                    }

                }
            });
        }
        else
        {
            alert("field is empty");
        }
    }
</script>