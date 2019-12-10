<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>JonPost | Print</title>
    <?php include 'postheader.php'; ?>
</head>

<body>
   
     <!-- ****** Contatc Area Start ****** -->
    <div class="contact-area section_padding_80">
        <div class="container">
            
            <!-- Contact Form  -->
            <div class="contact-form-area">
                <div class="row">
                    <div class="col-12 col-md-12 item">
                        <div class="contact-form">
                            <h2 class="contact-form-title mb-30">Selamat Anda telah Terdaftar</h2>
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
                                <div class="row form-group">
                                    <div class="col-6 col-md-6">
                                         <div class="form-group">
                                           <input type="text" class="form-control" id="contact-name" value="Status Pembayaran" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <div class="form-group">
                                            <?php
                                            if($peserta['bill']==0)
                                            {
                                                ?>
                                                <div class="form-group">
                                                <button style="color: red" type="button" class="btn btn-danger col-md-12 form-control">Belum Ada Bukti</button>
                                                </div>
                                                <?php
                                            }
                                            else if($peserta['bill']==1)
                                            {
                                                ?>
                                               <div class="form-group">
                                                <button style="color: yellow" type="button" class="btn btn-danger col-md-12 form-control">Sedang Diverifikasi</button>
                                                </div>
                                                </div><?php
                                            }
                                            else
                                            {
                                                ?>
                                               <div class="form-group">
                                                <button style="color: green" type="button" class="btn btn-danger col-md-12 form-control">Pembayaran Lunas</button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ****** Contact Area End ****** -->
     <?php include 'postfooter.php'; ?>

    <script>
        window.print();
    </script>
</body>
