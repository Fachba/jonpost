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
                                        <li class="list-inline-item">Tambah Peserta</li>
                                    </ul>
                                </div>     
                            </div>
                        </div> -->
                        <br><br><br>
                         <div class="col-lg-5">
                            <img src="<?php if($ket!="tambah"){ echo base_url() ?>/assets/images/nota/<?php echo $peserta['nota']; } ?>" id="preview-image" alt="Preview Gambar Kosong"/>
                        </div>
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Posting peserta</strong>
                                    <small> Form</small>
                                </div>
                                
                                    <div class="form-group">
                                        <label class=" form-control-label">Status Pembayaran</label>
                                        <?php 
                                        if($peserta['bill']==0)
                                        {
                                            ?>
                                            <button class="btn btn-danger col-md-12">Belum</button>
                                            <?php
                                        }
                                        else if($peserta['bill']==1)
                                        {
                                            ?>
                                            <button class="btn btn-warning col-md-12">Verifikasi</button><?php
                                        }
                                        else
                                        {
                                            ?>
                                            <button class="btn btn-success col-md-12">Lunas</button><?php   
                                        }
                                         ?>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Ubah Status</label>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <a class="col-md-12" href="<?php echo site_url('peserta/editstatus/'.$peserta['idp'].'/0') ?>">
                                                <button class="btn btn-danger col-md-12 btn-lg">Belum</button>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a class="col-md-12" href="<?php echo site_url('peserta/editstatus/'.$peserta['idp'].'/2') ?>">
                                                <button class="btn btn-success col-md-12 btn-lg">Lunas</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                            echo form_open_multipart('Peserta/');
                                    ?>
                                    <?php echo validation_errors(); ?>
                                    <div class="card-body card-block">
                                    <?php if($ket!="detail") { ?> 
                                        <div class="form-group">
                                            <label class=" form-control-label">Gambar</label>
                                            <input type="file" name="image" class="form-control" <?php echo $required ?> <?php if($ket!="tambah"){?>value="<?php echo $peserta['nota'];?>"<?php echo $label; } ?>>
                                        </div>
                                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#staticModal">Ketentuan Gambar</button>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label class=" form-control-label">ID Peserta</label>
                                        <input type="text" name="nama" placeholder="Nama" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $peserta['idp'];?>"<?php echo $label; } ?>>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Nama</label>
                                        <input type="text" name="nama" placeholder="Nama" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $peserta['nama_peserta'];?>"<?php echo $label; } ?>>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Kelamin</label>
                                        <input type="text" name="jk" placeholder="Nama" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $peserta['jk_peserta'];?>"<?php echo $label; } ?>>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Umur</label>
                                        <input type="text" name="umur" placeholder="Umur Anda" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $peserta['umur_peserta'];?>"<?php echo $label; } ?>>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Status</label>
                                        <input type="text" name="status" placeholder="Nama" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $peserta['status_peserta'];?>"<?php echo $label; } ?>>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Email</label>
                                        <input type="text" name="email" placeholder="Email Anda" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $peserta['email_peserta'];?>"<?php echo $label; } ?>>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Telp / HP</label>
                                        <input type="text" name="telp" placeholder="Nomor Anda" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $peserta['telp_peserta'];?>"<?php echo $label; } ?>>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Alamat</label>
                                       <textarea name="alamat" rows="2" placeholder="Keterangan..." class="form-control" <?php if($ket!="tambah"){ echo $label; } ?> required><?php if($ket!="tambah"){ echo $peserta['alamat_peserta'];?><?php } ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Keterangan Peserta</label>
                                       <textarea name="ket" rows="3" placeholder="Keterangan..." class="form-control" <?php if($ket!="tambah"){ echo $label; } ?> required><?php if($ket!="tambah"){ echo $peserta['ket_peserta'];?><?php } ?></textarea>
                                    </div>

                                    <div class="card-footer">
                                        <center>
                                        <div class="row form-group">
                                        <div class="col-md-6 col-xs-12">
                                            <?php if($ket!="detail"){?>
                                            <button type="submit" class="btn btn-success btn-lg " >
                                                <i class="fa fa-dot-circle-o"></i> Tambahkan
                                            </button>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <button type="reset" class="btn btn-danger btn-lg " onclick="location.href='<?php echo site_url('Peserta') ?>'">
                                                <i class="fa fa-ban"></i> Batal / Kembali
                                            </button>
                                        </div>
                                        </div>
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

</body>

</html>
<!-- end document-->