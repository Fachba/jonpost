<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>JonPost | Konfirmasi</title>

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
                            <li class="breadcrumb-item active" aria-current="page">Konfirmasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php if ($idp==0||$peserta['idp']==null){?>
    <!-- ****** Breadcumb Area End ****** -->
    <br>
    <div class="form-group container">
        <?php if ($input==1)
        {?>
            <h2 class="contact-form-title mb-30">Kode Tidak Ditemukan,</h2>
        <?php } elseif ($input==2){ ?>
            <h2 class="contact-form-title mb-30">Konfirmasi Anda Sudah Dikirimkan, Kirim Konfirmasi Lagi</h2>
        <?php }?>
        <h2 class="contact-form-title mb-30">Silahkan Ketik Kode Peserta Anda untuk Konfirmasi</h2>
        <?php echo form_open_multipart('Posting/vkonfirmasi/1'); ?>
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-6 col-md-6 col-xs-12">
                    <div class="form-group">
                    <input style="height: 50px" type="text" class="form-control" name="cari" placeholder="Cari Kode Peserta">
                    </div>
                </div>
                <div class="col-4 col-md-6 col-xs-12">
                    <div class="form-group">
                    <button type="submit" style="height: 50px" class="btn btn-info">Cari Peserta</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
     <!-- ****** Contatc Area Start ****** -->
     <?php }elseif($peserta['idp']!=null) {?>
    <div class="contact-area section_padding_80">
        <div class="container">
            
            <!-- Contact Form  -->
            <div class="contact-form-area">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <img src="<?php if($peserta['nota']!=null){ echo base_url() ?>/assets/images/nota/<?php echo $peserta['nota']; } ?>" id="preview-image" id="preview-image" alt="Preview Gambar Bukti Pembayaran Kosong"/>
                    </div>
                    <div class="col-12 col-md-7 item">
                        <div class="contact-form wow fadeInUpBig" data-wow-delay="0.1s">
                            <h2 class="contact-form-title mb-30">Selamat Anda telah Terdaftar, 
                            <?php if($peserta['bill']!=2)
                                { ?> Silahkan Konfirmasi <?php } ?></h2>
                            <div class="form-group">
                            <a href="<?php echo site_url('Posting/print/'.$idp.'') ?>" target="_blank">
                                <button type="button" class="btn btn-success col-md-12">Cetak Kartu</button>
                            </a>
                            </div>
                            <?php
                            if($peserta['bill']==0)
                            {
                                ?>
                                <div class="form-group">
                                <button type="button" class="btn btn-danger col-md-12">Belum Ada Bukti Pembayaran</button>
                                </div>
                                <?php echo form_open_multipart('Posting/konfirmasi'); ?>
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control" id="nota" placeholder="nota" required>
                                </div>
                                <?php
                            }
                            else if($peserta['bill']==1)
                            {
                                ?>
                                <div class="form-group">
                                <button type="button" class="btn btn-warning col-md-12">Pembayaran Lunas</button>
                                </div>
                                </div><?php
                            }
                            else
                            {
                                ?>
                                <div class="form-group">
                                <button type="button" class="btn btn-success col-md-12">Pembayaran Lunas</button>
                                </div>
                            <?php } ?>
                            
                            <!-- Contact Form -->
                            
                            <!-- <form action="#" method="post"> -->
                                <div class="row form-group">
                                    <div class="col-4 col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="idp" value="<?php echo $idp; ?>" class="form-control" id="contact-name" hidden>
                                            <input type="text" value="<?php echo $idp; ?>" class="form-control" id="contact-name" disabled>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-4">
                                        <div class="form-group">
                                           <input type="text" class="form-control" id="contact-name" value="Kode Peserta Anda" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tema</label>
                                    <input type="text" class="form-control" id="contact-name" placeholder="<?php echo $peserta['tema']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Nama Peserta</label>
                                    <input type="text" class="form-control" id="contact-name" placeholder="<?php echo $peserta['nama_peserta']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" class="form-control" id="contact-name" placeholder="<?php echo $peserta['jk_peserta']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>No Telp / HP</label>
                                    <input type="text" class="form-control" id="contact-name" placeholder="<?php echo $peserta['telp_peserta']; ?>" disabled>
                                </div>
                                <?php
                                if($peserta['bill']!=2)
                                { ?>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"><?php echo $peserta['ket_peserta']; ?></textarea>
                                </div>
                                <button type="submit" class="btn contact-btn">Kirim Konfirmasi</button>
                                <?php } ?>
                            <!-- </form> -->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php } ?>
    <!-- ****** Contact Area End ****** -->

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

    <script type="text/javascript">
        function previewImage(input) {
         
        if (input.files && input.files[0]) {
            var fileReader = new FileReader();
            var imageFile = input.files[0];
             
            if(imageFile.type == "image/png" || imageFile.type == "image/jpeg") {
                fileReader.readAsDataURL(imageFile);
                 
                fileReader.onload = function (e) {
                    $('#preview-image').attr('src', e.target.result);
                }
            }
            else {
                alert("your file is not image");
            }
        }
    }
 
    $("[name='image']").change(function(){
        previewImage(this);
    });
    </script>
</body>
