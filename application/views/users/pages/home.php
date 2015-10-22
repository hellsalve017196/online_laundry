<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="item">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<? echo base_url().'uploads/pic-1.jpg' ?>');"></div>
            <div class="carousel-caption">
                <h2>We take care of your valuable time</h2>
            </div>
        </div>
        <div class="item active">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<? echo base_url().'uploads/pic-2.jpg' ?>');"></div>
            <div class="carousel-caption">
                <h2>We keep u out from laundry tension</h2>
            </div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<? echo base_url().'uploads/pic-3.jpg' ?>');"></div>
            <div class="carousel-caption">
                <h2>we deliver faster than anyone</h2>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>

</header>

<div class="container">

    <div class="row">



        <div class="col-md-12">

            <div class="row">
                <div class="col-lg-12">
                    <h3>Latest Laundry Companies</h3>
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

<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>