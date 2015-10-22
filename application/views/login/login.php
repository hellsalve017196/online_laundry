<section class="section-account">
    <div class="img-backdrop" style="background-image: url('<? echo base_url() ?>files/Admin/assets/img/img16.jpg')"></div>
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <br>
                    <span id="res" class="text-lg text-bold text-primary">ADMIN</span>
                    <br><br>
                        <div class="form-group">
                            <input size="500" type="text" class="form-control" id="email" placeholder="username" name="username">
                        </div>
                        <div class="form-group">
                            <input size="500" type="password" class="form-control" placeholder="password" id="password" name="password">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <button class="btn btn-primary btn-raised" id="hudai">Log In</button>
                                <a class="btn btn-primary btn-raised" href="<? echo base_url() ?>">Back</a>
                            </div><!--end .col -->
                        </div><!--end .row -->
                </div><!--end .col -->

            </div><!--end .card -->
        </div></div></section>
<script type="text/javascript">
    $(document).ready(
        function() {
            $("#hudai").on('click',function() {
                email = $("#email").val();
                pass = $("#password").val();

                if($.trim(email) != '' && $.trim(pass) != '')
                {
                    if(email == 'admin' && pass == '123456')
                    {
                        window.location = '<? echo base_url() ?>admin';
                    }
                    else
                    {
                        $("#res").html("Invalid Username or password");
                    }
                }
                else{
                    $("#res").html("please fill up the form fields properly");
                }

            });
        }
    );
</script>