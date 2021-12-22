<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= base_url('beranda') ?>" class="site_title"><i class="fa fa-paw"></i> <span>SI Klinik</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="https://colorlib.com/polygon/gentelella/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $this->session->userdata('username') ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('beranda') ?>"><i class="fa fa-home"></i> Beranda </a></li>
                    <li><a href="<?= base_url('antrian') ?>"><i class="fas fa-grip-lines"></i> Antrian </a></li>
                    <li><a href="<?= base_url('periksa') ?>"><i class="fas fa-stethoscope"></i> Pemeriksaan </a></li>
                    <li><a href="<?= base_url('pasien') ?>"><i class="fa fa-user"></i> Pasien </a></li>
                    <li><a href="<?= base_url('laporan') ?>"><i class="fa fa-book"></i> Laporan </a></li>

                </ul>
            </div>

            <div class="menu_section">
                <h3>Data Master</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('user') ?>"><i class="fa fa-users"></i> User</a></li>
                    <li><a href="<?= base_url('obat') ?>"><i class="fas fa-pills"></i> Obat</a></li>

                </ul>
            </div>
            <div class="menu_section">
                <h3>Setting</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('setting/') ?>"><i class="fa fa-user"></i> Profile </a></li>
                    <li><a href="<?= base_url('setting/changepass') ?>"><i class="fa fa-key"></i> Ganti Password </a></li>
                    <li><a href="<?= base_url('logout') ?>"><i class="fa fa-sign-out-alt"></i> Logout </a></li>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings" href="<?= base_url('setting/changepass') ?>">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('logout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="https://colorlib.com/polygon/gentelella/images/img.jpg" alt=""><?= $this->session->userdata('username') ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Profile</a>
                        <a class="dropdown-item" href="<?= base_url('setting/changepass') ?>">
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="javascript:;">Help</a>
                        <a class="dropdown-item" href="<?= base_url('logout') ?>"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->