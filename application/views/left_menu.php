<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo BASE_URL?>"><?php echo PAGE_TITLE;?></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo BASE_URL . C_ADMIN . 'logout'?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
<?php
    $left_menu = $admin_menu = array(
                    array('name'=>'Add Survey', 'icon'=>'fa-plus', 'link'=>'dashboard'),
                    array('name'=>'Manage Survey', 'icon'=>'fa-list', 'link'=>'dashboard'),
                    );
              pre($left_menu);      

?>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <?php  foreach ($left_menu as  $menu) {
                    if(isset($menu['submenu'])) { ?>
                        <li>
                            <a href="#"><i class="fa  <?php echo $menu['icon'];?>  fa-fw"></i> <?php echo $menu['name'];?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php foreach ($menu['submenu'] as $submenu) { ?>
                                    <li>
                                        <a href="<?php echo BASE_URL.C_ADMIN.$submenu['link']?>"> <?php echo $submenu['name'];?></a>
                                    </li>
                                <?php } ?>
                               
                            </ul>

                        </li>

                        <?php }else{ ?>
                            <li>
                                <a href="<?php echo BASE_URL.$menu['link'];?>"><i class="fa fa-fw <?php echo $menu['icon'];?>"></i> <?php echo $menu['name'];?></a>
                            </li>
                        <?php } ?>
                    

                <?php }  ?>
                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>