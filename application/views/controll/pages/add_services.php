<div id="content">
    <section>
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <h1><? if(sizeof($company) > 0 ) {  echo $company['c_name'];  } ?></h1>
                </div>

                <form class="form-horizontal" role="form" id="services">
                    <a onclick="zn()" class="btn btn-danger" href="#">Add service</a>
                    <br>
                    <br>

                    <div id="info">
                    </div>

                    <input type="button" id="done" style="display: none" value="Done" class="btn btn-block btn-success"/>

                </form>
            </div><!--end .card-body -->
        </div>

    </section>
</div>

<script type="text/javascript">
    function zn() {
        $("#done").show();

        count = $(".form-group").length;
        str = '<div class="form-group" id="'+count+'"><label for="regular13" class="col-sm-2 control-label">Service name</label> <div class="col-sm-3"> <input type="text" class="form-control service_name"><div class="form-control-line"></div><div class="form-control-line"></div> </div> <label for="regular13" class="col-sm-2 control-label">Service Cost</label> <div class="col-sm-3"> <input type="text" class="form-control service_cost"><div class="form-control-line"></div><div class="form-control-line"></div> </div> <div class="col-sm-2">Tk <input type="button" onclick="delet('+count+')" value="Delete" class="btn btn-warning"> </div> </div>';

        $("#info").append(str);
    }

    function delet(id) {
        $("#"+id).remove();
    }

    $("#done").on('click',function() {
        var service_name = [];
        var service_cost = [];
        var services = [];

        $(".service_name").each(function() {   service_name.push($(this).val())   });
        $(".service_cost").each(function() {   service_cost.push($(this).val())   });

        for(i=0;i<service_name.length;i++)
        {
            services.push({'c_id':'<? echo $company['c_id'] ?>','s_name':service_name[i],'s_cost':service_cost[i]});
        }

        http = ' <? echo base_url() ?>admin/add_service';

        $.ajax({
            url:http,
            method:'POST',
            data:{'services':JSON.stringify(services)},
            success:function(data) {
                if(data == 0)
                {
                    window.location = '<? echo base_url() ?>admin/company_list';
                }
            }
        });

    });
</script>