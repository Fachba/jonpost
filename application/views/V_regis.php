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
    <title>Sign Up Jonpost</title>

    <?php include 'header.php'; ?>
    <?php
        $urisegment=$this->uri->segment(3); 
        if ($ket=="detail")
        {
            $label="disabled";
           
        }
        else
        {
            $label="";
           
        }
        if ($ket=="tambah")
        {
            $url_kembali='Posting';
            $tombol_simpan="Daftar";
            $url_simpan='Login/registrasi/';
            // echo form_open_multipart('Login/registrasi/');
        }
        elseif ($ket=="edit")
        {
            $url_kembali='Dashboard';
            $url_simpan='Member/edit/'.$urisegment.'';
            $tombol_simpan="Simpan";
            // echo form_open_multipart('Member/edit/'.$urisegment.'');
        }
    ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- PAGE CONTENT-->
        <div class="section__content section__content--p30">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Member</strong>
                                    <small> Registrasi</small>
                                </div>
                                <?php
                                    echo form_open_multipart($url_simpan);
                                ?>
                                <?php echo validation_errors(); ?>
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class=" form-control-label">Nama</label>
                                            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $member['nama'];?>"<?php echo $label; } ?>>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class=" form-control-label">Gender</label>
                                                    <select name="jk" class="form-control" required>
                                                        <?php if($ket!="tambah"){?>
                                                        <option value="<?php echo $member['jk'];?>"><?php echo $member['jk'];?></option>
                                                        <?php } ?>
                                                        <option value="laki">Laki Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class=" form-control-label">Umur</label>
                                                    <input type="number" name="umur" placeholder="Umur Anda" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $member['umur'];?>"<?php echo $label; } ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class=" form-control-label">Status</label>
                                                    <select name="status" class="form-control" required>
                                                        <?php if($ket!="tambah"){?>
                                                        <option value="<?php echo $member['status'];?>"><?php echo $member['status'];?></option>
                                                        <?php } ?>
                                                        <option value="pelajar">Pelajar</option>
                                                        <option value="mahasiswa">Mahasiswa</option>
                                                        <option value="bekerja">Bekerja</option>
                                                        <option value="dll">Dll</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class=" form-control-label">Telp/ HP</label>
                                                    <input type="text" name="telp" placeholder="Nomor Telp / HP" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $member['telp'];?>"<?php echo $label; } ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Alamat Anda</label>
                                           <textarea name="alamat" rows="3" placeholder="Alamat anda" class="form-control" ><?php if($ket!="tambah"){?><?php echo $member['alamat'];?><?php } ?></textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class=" form-control-label">E-Mail</label>
                                            <input type="text" name="email" placeholder="Email anda" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $member['email'];?>"<?php echo $label; } ?>>
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Username</label>
                                            <input type="text" name="username" placeholder="Username" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $member['username'];?>"<?php echo $label; } ?>>
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Password</label>
                                            <input type="text" name="password" placeholder="Password" class="form-control" required <?php if($ket!="tambah"){?>value="<?php echo $member['password'];?>"<?php echo $label; } ?>>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-lg btn-block"><?php echo $tombol_simpan ?></button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <div class="form-group">
                                                <button type="reset" class="btn btn-danger btn-lg btn-block" onclick="location.href='<?php echo site_url($url_kembali) ?>'">Kembali</button>
                                                </div>
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

    </div>

   <?php include 'footer.php'; ?>
</body>

</html>
<!-- end document-->