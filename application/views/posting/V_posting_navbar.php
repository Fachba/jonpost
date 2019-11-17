<!-- ****** Top Header Area Start ****** -->
<div class="top_header_area">
    <div class="container">
        <div class="row">
            <div class="col-5 col-sm-6">
                
            </div>
            <!--  Login Register Area -->
            <div class="col-7 col-sm-6">
                <div class="signup-search-area d-flex align-items-center justify-content-end">
                    <div class="login_register_area d-flex">
                        <?php if($this->session->userdata('nama')!=null){?>
                        <div class="login">
                            <a href="<?php echo site_url('Dashboard') ?>">Admin</a>
                        </div>
                        <div class="register">
                            <a href="<?php echo site_url('Login/logout') ?>">Log Out</a>
                        </div>
                        <?php }else{ ?>
                        <div class="login">
                            <a href="<?php echo site_url('Login') ?>">Sing in</a>
                        </div>
                        <div class="register">
                            <a href="<?php echo site_url('Login/vregis') ?>">Sing up</a>
                        </div>
                        <?php } ?>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Top Header Area End ****** -->

<!-- ****** Header Area Start ****** -->
<header class="header_area">
    <div class="container">
        <div class="row">
            <!-- Logo Area Start -->
            <!-- <div class="col-12">
                <div class="logo_area text-center">
                    <a href="index.html" class="yummy-logo">JonPost</a>
                </div>
            </div> -->
        </div>

        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                    <!-- Menu Area Start -->
                    <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                        <ul class="navbar-nav" id="yummy-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('Posting') ?>">Postingan<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('Posting/vkonfirmasi/0') ?>">Konfirmasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('Posting/kosong') ?>">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('Saran/vsaran') ?>">Saran</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ****** Header Area End ****** -->
<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(<?php echo base_url();?>assets/yummy/yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <!-- <div class="bradcumb-title text-center">
                    <h2>Static Page</h2>
                </div> -->
                <div class="logo_area text-center">
                    <a href="index.html" style="color: white" class="yummy-logo"><?php echo $judul; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
