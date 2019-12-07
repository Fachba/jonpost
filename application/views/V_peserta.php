<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body class="animsition">
    <div class="page-wrapper">
       
       <?php include 'V_navbar.php'; ?>

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
           <!--  <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
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
                                        <li class="list-inline-item">Postingan</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- END BREADCRUMB-->
            <?php if ($peserta==null)
            {?>
            <br><br><br>
            <h3 style="text-align: center;" class="title-5 m-b-35">Daftar Peserta Kosong</h3>
            <br><br><br><br><br><br><br><br><br><br><br>
            <?php } else { ?>
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Daftar Peserta Acara</h3>
                            <?php if ($this->session->userdata('master')==0||$nonmas==0){?>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <?php echo form_open_multipart('Peserta/cari'); ?>
                                    <div class="rs-select2--light rs-select2--md">
                                        <select class="js-select2" name="option">
                                            <option value="0" selected="selected">All Properties</option>
                                            <option value="1">Lunas</option>
                                            <option value="2">Verifikasi</option>
                                            <option value="3">Belum Lunas</option>
                                            <option value="4">Hadir</option>
                                            <option value="5">Tidak Hadir</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                   <!--  Atau ID Peserta
                                    <div class="rs-select2--light rs-select2--md">
                                        <input type="number" class="form-control" name="id" placeholder="ID Peserta">
                                    </div> -->
                                    
                                    <button type="submit" class="au-btn-filter">
                                        <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    <?php echo form_close(); ?>
                                </div>
                                <!-- <div class="table-data__tool-right">
                                    <a href="<?php echo site_url('Acara/vtambah') ?>">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add item</button></a>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <select class="js-select2" name="type">
                                            <option selected="selected">Export</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div> -->
                            </div>
                        <?php } ?>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2" id="datapeserta">
                                    <thead>
                                        <tr>
                                            <th>ID Acara</th>
                                            <th>ID Peserta</th>
                                            <th>Nama</th>
                                            <th>Kelamin</th>
                                            <th>Status</th>
                                            <th>Telp</th>
                                            <th>HTM</th>
                                            <th>Bayar</th>
                                            <th>Hadir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($peserta as $key) { ?> 
                                        <!-- <tr class="spacer"></tr> -->
                                        <tr class="tr-shadow spacer">
                                           
                                            <td><?php echo $key->ida ?></td>
                                            <td><?php echo $key->idp ?></td>
                                            <td>
                                                <span class="block-email"><?php echo $key->nama_peserta ?></span>
                                            </td>
                                            <td><?php echo $key->jk_peserta ?></td>
                                            <td><?php echo $key->status_peserta ?></td>
                                            <td><?php echo $key->telp_peserta ?></td>
                                            <td><?php echo $key->htm ?></td>
                                            <td>
                                                <a href="<?php echo site_url('Peserta/detail/'.$key->idp.'') ?>">
                                                <?php
                                                if($key->bill==0)
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn-danger">Belum</button>
                                                    <?php
                                                }
                                                else if($key->bill==1)
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn-warning">Verifikasi</button><?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <button type="button" class="btn btn-success">Lunas</button><?php   
                                                }
                                                ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                if($key->hadir==0)
                                                {
                                                    if($key->bill==2){ ?>
                                                    <a href="<?php echo site_url('Peserta/edithadir/'.$key->idp.'/1') ?>"> 
                                                    <button type="button" class="btn-danger btn-lg" data-toggle="tooltip" data-placement="top" title="Tidak Hadir"><i class="fa fa-times"></i>
                                                    </button>
                                                    </a>
                                                    <?php } else{ ?>
                                                    <button type="button" class="btn-danger btn-lg" data-toggle="tooltip" data-placement="top" title="Tidak Hadir"><i class="fa fa-times"></i>
                                                    </button>
                                                    <?php }
                                                }
                                                else if($key->hadir==1)
                                                {
                                                    ?>
                                                    <a href="<?php echo site_url('Peserta/edithadir/'.$key->idp.'/0') ?>"> 
                                                    <button type="button" class="btn-success btn-lg" data-toggle="tooltip" data-placement="top" title="Hadir"><i class="fa fa-check-square"></i>
                                                    </button>
                                                    </a><?php
                                                }?>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                   
                                                    <a href="<?php echo site_url('Peserta/hapus/'.$key->idp.'') ?>">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    </a>
                                                    <a href="<?php echo site_url('Peserta/detail/'.$key->idp.'') ?>">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
            <?php } ?>
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
   <script src="<?=base_url()?>assets/DataTables/datatables.min.js"></script>
   <script type="text/javascript">
       
       $(document).ready(function()
    {
        $('#datapeserta').DataTable();
    });

   </script>

</body>

</html>
<!-- end document-->