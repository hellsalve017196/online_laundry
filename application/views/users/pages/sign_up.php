<div class="container">

    <div class="row">



        <div class="col-md-12">
            <h4 class="innerAll margin-none border-bottom text-center" id="res" style="font-size:25px;background:#fff">User sign up</h4>

            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-body inner All">
                        <form method="POST" id="sign_up" action="">
                            <div>Enter email:<input class="form-control" name="u_email" type="email" required=""></div>
                            <div>Enter Password:<input class="form-control" name="u_password" type="password" required=""></div>
                            <div>Enter full name:<input class="form-control" name="u_fullname" type="text" required=""></div>
                            <div>Enter phone:<input class="form-control" name="u_phone" type="text" required=""></div>
                            <div>Enter address:<textarea class="form-control" name="u_address" required=""></textarea></div>
                            <br>
                            <div><input type="submit" value="Sign Up" class="btn btn-primary btn-block btn-lg"/></div>
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
            http = '<? echo base_url() ?>login/user_sign_up';

            for(x=0 ;   x<data.length   ;   x++)
            {
                temp[data[x]['name']] = data[x]['value']
            }


            $.ajax({
                url:http,
                method:'POST',
                data:{sign_up:JSON.stringify(temp)},
                success:function(data){
                   if(data == '1')
                   {
                       $("#res").html("Successfully Signed Up");
                   }
                    else
                   {
                       $("#res").html("Email is already Registered");
                   }

                }
            });

            e.preventDefault();
        });
    });
</script>