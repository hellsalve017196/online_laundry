<div class="container">

    <div class="row">



        <div class="col-md-12">
            <h4 class="innerAll margin-none border-bottom text-center" id="res" style="font-size:25px;background:#fff">Complain</h4>

            <div class="col-sm-6 col-sm-offset-3" id="maze">
                <div class="panel panel-primary">
                    <div class="panel-body inner All">
                        <form method="POST" id="sign_up" action="">
                            <div>Complain:<textarea class="form-control" name="complain" required=""></textarea></div>
                            <br>
                            <div><input type="submit" value="Send" class="btn btn-primary btn-block btn-lg"/></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sign_up").on('submit',function(e) {
                data = $(this).serializeArray();
                temp = {};
                http = '<? echo base_url() ?>users/complain_submit';

                for(x=0 ;   x<data.length   ;   x++)
                {
                    temp[data[x]['name']] = data[x]['value'];
                }

                <?
                    $user = json_decode($this->session->userdata('user_login'),true);
                 ?>

                temp['u_id'] = '<? echo $user['u_id'] ?>';
                temp['complain_date'] = new Date().toLocaleString();

                $.ajax({
                    url:http,
                    method:'POST',
                    data:{complain:JSON.stringify(temp)},
                    success:function(data){
                        if(data == '1')
                        {
                            $("#maze").html('<div class="alert alert-info" style="text-align: center"><strong>Complain Succesfully Send</strong></div>');
                        }
                        else
                        {
                            $("#maze").html('<div class="alert alert-danger" style="text-align: center"><strong>Error Occured,try again later</strong></div>');
                        }

                    }
                });

                e.preventDefault();
            });
        });
    </script>