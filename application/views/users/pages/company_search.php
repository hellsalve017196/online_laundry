<div class="container">

    <div class="row">



        <div class="col-md-12">

            <row>
                <div>
                    <input type="text" id="key" class="form-control" placeholder="Search with ur city,street name"/>
                </div>
            </row>

            <div class="row">
                <div class="col-lg-12">
                    <h3>Companies</h3>
                </div>
            </div>

            <div class="row text-center" id="res">

                <?
                    if(sizeof($company) > 0)
                    {
                        foreach($company as $c)
                        {
                            ?>
                            <div class="col-md-3">
                                <div class="md-border" style="border: 1px solid #d3d3d3;border-radius: 5px">
                                    <div>
                                        <img src="<? echo base_url() ?>uploads/<? echo $c['c_logo']; ?>" height="200" width="200"/>
                                    </div>
                                    <div align="center">
                                        <h3><? echo $c['c_name']; ?></h3>
                                        <p><strong><? echo $c['c_zone']; ?></strong></p>
                                        <p>
                                            <? if($this->session->userdata('user_login') != null) { ?><a href="<? echo base_url().'users/company_details/'.$c['c_id'] ?>" class="btn btn-primary">Order</a> <? } ?>
                                            <a href="<? echo base_url().'users/add_to_compare/'.$c['c_id'] ?>" target="_blank" class="btn btn-default">Compare</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?
                        }
                    }
                    else
                    {
                        echo '<h1>No companies currently added</h1>';
                    }
                ?>

            </div>

        </div>

    </div>

</div>
<script type="text/javascript">
    $(document).ready(
        function()
        {
            $("#key").on('keyup',function() {
                key = $.trim($(this).val());

                http = '<? echo base_url() ?>users/search_company';

                $.post(http,{'key':key},function(data) {
                    data = JSON.parse(data);
                    if(data.length > 0)
                    {
                        str = '';

                        for(i=0;i<data.length;i++)
                        {
                            str = str + '<div class="col-md-3"><div class="md-border" style="border: 1px solid #d3d3d3;border-radius: 5px"> <div> <img src="<? echo base_url() ?>uploads/'+data[i]['c_logo']+'" height="200" width="200"/> </div> <div align="center"> <h3>'+data[i]['c_name']+'</h3> <p><strong>'+data[i]['c_zone']+'</strong></p> <p> <? if($this->session->userdata('user_login') != null) { ?><a href="<? echo base_url(); ?>users/company_details/'+data[i]['c_id']+'" class="btn btn-primary">Order</a> <? } ?><a href="<? echo base_url(); ?>users/add_to_compare/'+data[i]['c_id']+'" target="_blank" class="btn btn-default">Compare</a> </p> </div> </div> </div>';
                        }

                        $("#res").html(str);
                    }
                    else
                    {
                        $("#res").html('<div class="alert alert-info" style="text-align: center"><strong>Nothing found from your search</strong></div>');
                    }
                });
            });
        }
    );
</script>