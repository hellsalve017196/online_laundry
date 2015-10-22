<div class="container">

    <div class="row">



        <div class="col-md-12">
            <h4 class="innerAll margin-none border-bottom text-center" id="res" style="font-size:25px;background:#fff">User sign up</h4>

            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-body inner All">
                        <form method="POST" id="sign_up" action="">
                            <div>Email:<input class="form-control" name="u_email" type="email" required=""></div>
                            <div>Password:<input class="form-control" name="u_password" type="password" required=""></div>
                            <br>
                            <div><input type="submit" value="Log In" class="btn btn-primary btn-block btn-lg"/></div>
                            <br>
                            <div><a href="<? echo base_url(); ?>login/user_sign_up_view" class="btn btn-success btn-block btn-lg">Sign Up</a></div>
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
                http = '<? echo base_url() ?>login/user_login';

                for(x=0 ;   x<data.length   ;   x++)
                {
                    temp[data[x]['name']] = data[x]['value']
                }


                $.ajax({
                    url:http,
                    method:'POST',
                    data:{log_in:JSON.stringify(temp)},
                    success:function(data){
                        if(data == '0')
                        {
                            $("#res").html("Invalid Username or password");
                        }
                        else
                        {
                            window.location = '<? echo base_url() ?>users/company_search_view'
                        }
                    }
                });

                e.preventDefault();
            });
        });
    </script>