<!-- HEADER DESKTOP -->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="<?php echo site_url('Dashboard') ?>">
                            <img src="<?php echo base_url() ?>/assets/images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>

                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="<?php echo site_url('Dashboard') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <?php $master=$this->session->userdata('master'); ?>
                            <?php if ($master!=0){?>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-tachometer-alt"></i>Master Data
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="<?php echo site_url('Member') ?>">Member</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Acara/semua') ?>">Acara</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Peserta/semua') ?>">Peserta</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Saran') ?>">Saran</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                            <li class="has-sub">
                                <a href="<?php echo site_url('Acara') ?>">
                                    <i class="fas fa-list-alt"></i>Postingan
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a href="<?php echo site_url('Peserta') ?>">
                                    <i class="fas fa-users"></i>Peserta
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a href="<?php echo site_url('Posting') ?>">
                                    <i class="fas fa-desktop"></i>Website
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="header__tool">
                        <!-- <div class="header-button-item has-noti js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                                <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c2 img-cir img-40">
                                        <i class="zmdi zmdi-account-box"></i>
                                    </div>
                                    <div class="content">
                                        <p>Your account has been blocked</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div> -->
                            
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <!-- <div class="image">
                                    <img src="<?php echo base_url() ?>/assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                </div> -->
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $this->session->userdata('nama'); ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <!-- <div class="image">
                                            <a href="#">
                                                <img src="<?php echo base_url() ?>/assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                            </a>
                                        </div> -->
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo $this->session->userdata('nama'); ?></a>
                                            </h5>
                                            <span class="email"><?php echo $this->session->userdata('email'); ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                       <!--  <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div> -->
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo site_url('Member/vedit') ?>">
                                                <i class="zmdi zmdi-settings"></i>Setting Account</a>
                                        </div>
                                       
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?php echo site_url('Login/logout') ?>">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?php echo base_url() ?>/assets/images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <?php $master=$this->session->userdata('master'); ?>
                        <?php if ($master!=0){?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Master Data</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                        <a href="<?php echo site_url('Member') ?>">Member</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Acara/semua') ?>">Acara</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Peserta/semua') ?>">Peserta</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Saran') ?>">Saran</a>
                                    </li>
                            </ul>
                        </li>
                        <?php } ?>
                            <li class="has-sub">
                                <a href="<?php echo site_url('Acara') ?>">
                                    <i class="fas fa-list-alt"></i>Postingan
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a href="<?php echo site_url('Dashboard') ?>">
                                    <i class="fas fa-users"></i>Peserta
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a href="<?php echo site_url('Posting') ?>">
                                    <i class="fas fa-desktop"></i>Website
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <!-- <div class="header-button-item has-noti js-item-menu">
                    <i class="zmdi zmdi-notifications"></i>
                    <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                        <div class="notifi__title">
                            <p>You have 3 Notifications</p>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c1 img-cir img-40">
                                <i class="zmdi zmdi-email-open"></i>
                            </div>
                            <div class="content">
                                <p>You got a email notification</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c2 img-cir img-40">
                                <i class="zmdi zmdi-account-box"></i>
                            </div>
                            <div class="content">
                                <p>Your account has been blocked</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c3 img-cir img-40">
                                <i class="zmdi zmdi-file-text"></i>
                            </div>
                            <div class="content">
                                <p>You got a new file</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__footer">
                            <a href="#">All notifications</a>
                        </div>
                    </div>
                </div>
                <div class="header-button-item js-item-menu">
                    <i class="zmdi zmdi-settings"></i>
                    <div class="setting-dropdown js-dropdown">
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-account"></i>Account</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-globe"></i>Language</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-pin"></i>Location</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-email"></i>Email</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-notifications"></i>Notifications</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <!-- <div class="image">
                            <img src="<?php echo base_url() ?>/assets/images/icon/avatar-01.jpg" alt="John Doe" />
                        </div> -->
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?php echo $this->session->userdata('nama'); ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <!-- <div class="image">
                                    <a href="#">
                                        <img src="<?php echo base_url() ?>/assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                    </a>
                                </div> -->
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#"><?php echo $this->session->userdata('nama'); ?></a>
                                    </h5>
                                    <span class="email"><?php echo $this->session->userdata('email'); ?></span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                   <a href="<?php echo site_url('Member/vedit') ?>">
                                    <i class="zmdi zmdi-settings"></i>Setting Account</a>
                                </div>
                               
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="<?php echo site_url('Login/logout') ?>">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- END HEADER MOBILE