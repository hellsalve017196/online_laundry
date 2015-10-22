<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<? echo base_url(); ?>">Online Laundry</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<? echo base_url() ?>users/company_search_view">Companies</a>
                </li>
                <li>
                    <a href="<? echo base_url() ?>users/company_compare">Compare</a>
                </li>
                <?

                ?>

                <?
                if($this->session->userdata('user_login') != null)
                {
                    ?>
                    <li>
                        <a href="<? echo base_url() ?>users/complain_view">Complain</a>
                    </li>
                <?
                }
                ?>

                <?
                    if($this->session->userdata('user_login') == null)
                    {
                        ?>
                        <li>
                            <a href="<? echo base_url() ?>login/user_log_in_view">Log in</a>
                        </li>
                        <?
                    }
                ?>

                <?
                if($this->session->userdata('user_login') != null)
                {
                    $user = json_decode($this->session->userdata('user_login'),true);
                    ?>
                    <li>
                        <a href="<? echo base_url().'users/order_log_view/'.$user['u_id'] ?>">Order Log</a>
                    </li>
                <?
                }
                ?>

                <?
                if($this->session->userdata('user_login') != null)
                {
                    ?>
                    <li>
                        <a href="<? echo base_url() ?>login/user_logout">Log Out</a>
                    </li>
                <?
                }
                ?>

                <?
                if($this->session->userdata('user_login') == null)
                {
                    ?>
                    <li>
                        <a href="<? echo base_url() ?>login/user_sign_up_view">Sign Up</a>
                    </li>
                <?
                }
                ?>

                <?
                if($this->session->userdata('user_login') == null)
                {
                    ?>
                    <li>
                        <a href="<? echo base_url() ?>login/admin_login">Manage</a>
                    </li>
                <?
                }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>