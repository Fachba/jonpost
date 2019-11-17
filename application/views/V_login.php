<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <?php include 'header.php'; ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?php echo base_url() ?>/assets/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <!-- <form action="" method="post"> -->
                            <?php echo form_open_multipart('Login/cekLogin'); ?>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <!-- <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label> -->
                                    <!-- <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label> -->
                                </div>
                                 <div class="row form-group">
                                    <div class="col-md-6 col-xs-12">
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <a class="col-12" href="<?php echo site_url('Posting') ?>">
                                         <button type="button" class="au-btn btn-info au-btn--block ">Kembali</button>
                                        </a>
                                    </div>
                                </div>
                            <!-- </form> -->
                            <div class="register-link">
                                <p>
                                    Belum Punya Akun?
                                    <a href="<?php echo site_url('Login/vregis') ?>">Daftar disini</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

</body>

</html>
<!-- end document-->