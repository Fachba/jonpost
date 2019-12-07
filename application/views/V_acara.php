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
            
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Daftar Postingan Acara</h3>
                            <?php if ($this->session->userdata('master')==0||$nonmas==0){?>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <?php echo form_open_multipart('Acara/cari'); ?>
                                    <div class="rs-select2--light rs-select2--md">
                                        <select class="js-select2" name="option">
                                            <option value="" selected="selected">All Properties</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Non Aktif</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                
                                    <button class="au-btn-filter">
                                        <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    <?php echo form_close(); ?>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="<?php echo site_url('Acara/vtambah') ?>">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>Add Acara</button></a>
                                    <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <select class="js-select2" name="type">
                                            <option selected="selected">Export</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div> -->
                                </div>
                            </div>
                            <?php } ?>
                            <?php if ($acara==null)
                            {?>
                            <br><br><br>
                            <h3 style="text-align: center;" class="title-5 m-b-35">Daftar Postingan Kosong</h3>
                            <br><br><br><br><br><br><br><br><br><br><br>
                            <?php } else { ?>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2" id="dataacara">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <!-- <th>Organisasi</th>
                                            <th>Tema</th> -->
                                            <th>Tanggal_Acara</th>
                                            <!-- <th>Peserta</th> -->
                                            <th>HTM</th>
                                            <!-- <th>Total_HTM</th> -->
                                            <th>Link Pendaftaran</th>
                                            <th>No_Koordinator</th>
                                            <th>Posting</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0; foreach ($acara as $key) { $no++; ?> 
                                        <!-- <tr class="spacer"></tr> -->
                                        <tr class="tr-shadow spacer">
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $key->ida ?></td>
                                            <!-- <td>
                                                <span class="block-email"><?php echo $key->organisasi ?></span>
                                            </td>
                                            <td class="desc"><?php echo $key->tema ?></td> -->
                                            <td><?php echo $key->tanggal ?></td>
                                            <!-- <td>
                                                <?php echo $key->tpeserta ?>
                                            </td> -->
                                            <td><?php echo $key->htm ?></td>
                                            <!-- <td><?php echo $key->thtm ?></td> -->
                                            <td><a href="<?php echo site_url('Posting/detail/'.$key->ida.'') ?>" target="_blank"><?php echo site_url('Posting/detail/'.$key->ida.'') ?></a></td>
                                            <td><?php echo $key->cotelp ?></td>
                                             <td>
                                                <?php
                                                if($key->post==0)
                                                {?>
                                                    <a href="<?php echo site_url('Acara/editpost/'.$key->ida.'/1') ?>">
                                                    <button type="button" class="btn-danger btn-lg" data-toggle="tooltip" data-placement="top" title="Tidak Aktif"><i class="fa fa-times"></i>
                                                    </button>
                                                    </a>
                                                    <?php
                                                }
                                                else if($key->post==1)
                                                {
                                                    ?>
                                                    <a href="<?php echo site_url('Acara/editpost/'.$key->ida.'/0') ?>"> 
                                                    <button type="button" class="btn-success btn-lg" data-toggle="tooltip" data-placement="top" title="Aktif"><i class="fa fa-check-square"></i>
                                                    </button>
                                                    </a><?php
                                                }?>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="<?php echo site_url('Peserta/pesertaacara/'.$key->ida.'') ?>">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Peserta">
                                                        <i class="fas fa-users"></i>
                                                    </button>
                                                    </a>
                                                    <a href="<?php echo site_url('Acara/vedit/'.$key->ida.'') ?>">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    </a>
                                                    <a href="<?php echo site_url('Acara/hapus/'.$key->ida.'') ?>">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    </a>
                                                    <a href="<?php echo site_url('Acara/vdetail/'.$key->ida.'') ?>">
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
            
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

   <?php include 'footer.php'; ?><script src="<?=base_url()?>assets/DataTables/datatables.min.js"></script>
   <script type="text/javascript">
       
       $(document).ready(function()
    {
        $('#dataacara').DataTable();
    });

   </script>
   

</body>

</html>
<!-- end document-->