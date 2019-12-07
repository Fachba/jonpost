<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>JonPost | Saran</title>

    <?php include 'postheader.php'; ?>

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>

    <?php include 'V_posting_navbar.php'; ?>

    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Saran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->
    <br>
    <div class="form-group container">
        <center>
        <?php echo form_open_multipart('Saran/saran'); ?>
        <div class="col-12 col-md-7 item" style="height: 544px;">
            <div class="contact-form wow fadeInUpBig" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUpBig;">
                <h2 class="contact-form-title mb-30"> Kirimkan Saran Anda Sekarang</h2>
                <!-- Contact Form -->
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="contact-name" placeholder="Nama Anda" name="nama_saran">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="message" cols="30" rows="10" placeholder="Saran Anda" name="saran"></textarea>
                    </div>
                    <button type="submit" class="btn contact-btn btn-lg">Kirim Saran</button>
                </form>
            </div>
        </div>
        <?php echo form_close(); ?>

    <!-- ****** Footer Menu Area Start ****** -->
    <footer class="footer_area">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <div class="copy_right_text text-center">
                        <p>Copyright @2018 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Menu Area End ****** -->

    <?php include 'postfooter.php'; ?>

</body>
