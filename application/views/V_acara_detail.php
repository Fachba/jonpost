<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>

<body class="animsition">
    <div class="page-wrapper">
       
       <?php include 'V_navbar.php'; ?>
       <?php 
           if ($ket=="detail")
           {
                $label="disabled";
                $required="required";
           }
           else
           {
                $label="";
                $required="";
           }
        $urisegment=$this->uri->segment(3);

        $error=$this->session->flashdata('error');
        if ($error!=null) 
        {
            echo $error;
        }
        ?>


        <!-- PAGE CONTENT-->
        <div class="section__content section__content--p30">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Tambah Postingan Acara</li>
                                    </ul>
                                </div>     
                            </div>
                        </div> -->
                        <?php if ($ket=="detail") { ?>
                         <!-- STATISTIC-->
                        <div class="col-md-12">
                        <section class="statistic statistic2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="statistic__item statistic__item--blue">
                                            <a href="<?php echo site_url('Peserta/pesertaacara/'.$urisegment.'') ?>">
                                            <h2 class="text"><?php echo $tpeserta['tpeserta'];?> Peserta</h2>
                                            <span class="desc">Total Peserta Terdaftar</span>
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="statistic__item statistic__item--green">
                                            <a href="<?php echo site_url('Peserta/pesertaacarahadir/'.$urisegment.'/1') ?>">
                                            <h2 class="number"><?php echo $tpesertahadir['tpeserta'];?> Peserta</h2>
                                            <span class="desc">Total Peserta Hadir</span>
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="statistic__item statistic__item--red">
                                            <a href="<?php echo site_url('Peserta/pesertaacarahadir/'.$urisegment.'/0') ?>">
                                            <h2 class="number"><?php echo $tpeserta['tpeserta']-$tpesertahadir['tpeserta'];?> Peserta</h2>
                                            <span class="desc">Total Peserta Tidak Hadir</span>
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-lg-4">
                                        <div class="statistic__item statistic__item--red">
                                            <a href="<?php echo site_url('Peserta/pesertaacarahtm/'.$urisegment.'/0') ?>">
                                            <h2 class="text"><?php echo $thtmbe['peserta'];?> Belum</h2>
                                            <span class="desc">Estimasi Pemasukan HTM</span>
                                            <br><br>
                                            <h3 style="color: white" class="number">Rp <?php echo $thtmbe['thtm'];?></h3>
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="statistic__item statistic__item--orange">
                                            <a href="<?php echo site_url('Peserta/pesertaacarahtm/'.$urisegment.'/1') ?>">
                                            <h2 class="text"><?php echo $thtmve['peserta'];?> Verifikasi</h2>
                                            <span class="desc">Estimasi Pemasukan HTM</span>
                                            <br><br>
                                            <h3 style="color: white" class="number">Rp <?php echo $thtmve['thtm'];?></h3>
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="statistic__item statistic__item--green">
                                            <a href="<?php echo site_url('Peserta/pesertaacarahtm/'.$urisegment.'/2') ?>">
                                            <h2 class="text"><?php echo $thtmlu['peserta'];?> Lunas</h2>
                                            <span class="desc">Total Pemasukan HTM</span>
                                            <br><br>
                                            <h3 style="color: white" class="number">Rp <?php echo $thtmlu['thtm'];?></h3>
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </section>
                        </div>
                        <!-- END STATISTIC-->
                        <?php } ?>
                        <br><br>
                         <div class="col-lg-5">
                            <img src="<?php if($ket!="tambah"){ echo base_url() ?>/assets/images/acara/<?php echo $acara['gambar']; } ?>" id="preview-image" alt="Preview Gambar Kosong"/>
                        </div>
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Posting Acara</strong>
                                    <small> Form</small>
                                </div>
                                <?php
                                    if ($ket=="tambah")
                                    {
                                        echo form_open_multipart('Acara/tambah');
                                    }
                                    elseif ($ket=="edit")
                                    {
                                        echo form_open_multipart('Acara/edit/'.$urisegment.'');
                                    }
                                ?>
                                <?php echo validation_errors(); ?>
                                <div class="card-body card-block">
                                <?php if($ket!="detail") { ?> 
                                    <div class="form-group">
                                        <label class=" form-control-label">Gambar</label>
                                        <input type="file" name="image" class="form-control" <?php echo $required ?> <?php if($ket!="tambah"){?>value="<?php echo $acara['gambar'];?>"<?php echo $label; } ?>>
                                    </div>
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#staticModal">Ketentuan Gambar</button>
                                <?php } ?>

                                    <div class="form-group">
                                        <label class=" form-control-label">Organisasi</label>
                                        <input type="text" name="organisasi" placeholder="Organisasi" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $acara['organisasi'];?>"<?php echo $label; } ?>>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Tema</label>
                                        <input type="text" name="tema" placeholder="Tema Acara" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $acara['tema'];?>"<?php echo $label; } ?>>
                                    </div>

                                    <div class="form-group">
                                        <label class=" form-control-label">Tempat</label>
                                        <input type="text" name="tempat" placeholder="Tempat Acara" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $acara['tempat'];?>"<?php echo $label; } ?>>
                                    </div>
                                    
                                     <div class="row form-group">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Tanggal</label>
                                                <input type="date" name="tanggal" placeholder="Tanggal Acara" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $acara['tanggal'];?>"<?php echo $label; } ?> min="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Jam</label>
                                                <input type="time" placeholder="Jam" name="jam" class="form-control" <?php if($ket!="tambah"){?>value="<?php echo $acara['jam'];?>"<?php echo $label; } ?>>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label class=" form-control-label">HTM</label>
                                                <input type="number" placeholder="Harga Tiket Masuk" name="htm" class="form-control" <?php if($ket!="tambah"){?>value="<?php echo $acara['htm'];?>"<?php echo $label; } ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label class=" form-control-label">Kontak Koordinator</label>
                                                <input type="text" name="telp" placeholder="Telp / HP Koordinator" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $acara['cotelp'];?>"<?php echo $label; } ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Keterangan / Deskripsi</label>
                                       <textarea name="des" rows="5" placeholder="Keterangan..." class="form-control" <?php if($ket!="tambah"){ echo $label; } ?> required><?php if($ket!="tambah"){ echo $acara['des'];?><?php } ?></textarea>
                                    </div>

                                    <div class="card-footer">
                                    <center>
                                        <div class="row form-group">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                 <?php if($ket!="detail"){?>
                                                <button type="submit" class="btn btn-success btn-lg " >
                                                    <i class="fa fa-dot-circle-o"></i> Tambahkan
                                                </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <a href="<?php echo site_url('Acara') ?>">
                                                <button type="reset" class="btn btn-danger btn-lg ">
                                                    <i class="fa fa-ban"></i> Batal / Kembali
                                                </button>
                                                </a>
                                            </div>
                                        </div>
                                    </center>
                                    </div>
                                  <?php echo form_close(); ?>  
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

        <!-- modal static -->
            <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Ketentuan Gambar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                1. Format jpg, jpeg, png<br>
                                2. max_width 10240 px<br>
                                3. max_height 7680 px<br>
                                4. Size 1000000000 KB
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- end modal static -->

    </div>

   <?php include 'footer.php'; ?>

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

</html>
<!-- end document-->