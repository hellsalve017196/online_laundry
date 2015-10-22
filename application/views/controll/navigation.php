<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse  animate">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="missioncontrol.html">
                <span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
            </a>
        </div>
    </div>
    <div class="nano has-scrollbar" style="height: 258px;"><div class="nano-content" tabindex="0" style="right: -15px;"><div class="menubar-scroll-panel" style="padding-bottom: 33px;">

                <!-- BEGIN MAIN MENU -->
                <ul id="main-menu" class="gui-controls">

                    <!-- BEGIN DASHBOARD -->
                    <li>
                        <a href="<? echo base_url() ?>admin/">
                            <div class="gui-icon"><i class="md md-home"></i></div>
                            <span class="title">Dashboard</span>
                        </a>
                    </li><!--end /menu-li -->
                    <!-- END DASHBOARD -->

                    <!-- BEGIN TABLES -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><i class="fa fa-table"></i></div>
                            <span class="title">Company</span>
                        </a>
                        <!--start submenu -->
                        <ul style="">
                            <li><a <? if($page_name == 'add_company') { ?> class="active" <? } ?> href="<? echo base_url() ?>admin/adding_company_view"><span class="title">Adding Company</span></a></li>
                            <li><a <? if($page_name == 'company_list') { ?> class="active" <? } ?>  href="<? echo base_url() ?>admin/company_list"><span class="title">Company List</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <!-- END TABLES -->

                    <!-- BEGIN FORMS -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><span class="glyphicon glyphicon-list-alt"></span></div>
                            <span class="title">Order List</span>
                        </a>
                        <!--start submenu -->
                        <ul style="display: none;">
                            <li class="expanded"><a <? if($page_name == 'order_log') { ?> class="active" <? } ?>  href="<? echo base_url() ?>admin/order_log_view"><span class="title">Orders</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->

                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><span class="glyphicon glyphicon-adjust"></span></div>
                            <span class="title">Complain</span>
                        </a>
                        <!--start submenu -->
                        <ul style="">
                            <li><a <? if($page_name == 'complain_list') { ?> class="active" <? } ?>  href="<? echo base_url() ?>admin/complain_list_view"><span class="title">Complain List</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><span class="glyphicon glyphicon-apple"></span></div>
                            <span class="title">Users</span>
                        </a>
                        <!--start submenu -->
                        <ul style="">
                            <li><a <? if($page_name == 'user_list') { ?> class="active" <? } ?>  href="<? echo base_url() ?>admin/user_list_view"><span class="title">User List</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <!-- END FORMS -->
                </ul><!--end .main-menu -->
                <!-- END MAIN MENU -->


            </div></div><div class="nano-pane" style="display: block;"><div class="nano-slider" style="height: 230px; transform: translate(0px, 0px);"></div></div></div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->