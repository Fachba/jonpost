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
            <?php if ($member==null)
            {?>
            <br><br><br>
            <h3 style="text-align: center;" class="title-5 m-b-35">Daftar Member Kosong</h3>
            <br><br><br><br><br><br><br><br><br><br><br>
            <?php } else { ?>
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Daftar Member</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <?php echo form_open_multipart('Peserta/cari'); ?>
                                    <div class="rs-select2--light rs-select2--md">
                                        <select class="js-select2" name="option">
                                            <option value="0" selected="selected">All Properties</option>
                                            <option value="1">Aktif</option>
                                            <option value="2">Non Aktif</option>
                                            <option value="3">Laki Laki</option>
                                            <option value="4">Perempuan</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <!-- Atau ID Peserta
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
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2" id="datamember">
                                    <thead>
                                        <tr>
                                            <th>ID_Member</th>
                                            <th>Nama</th>
                                            <th>Kelamin</th>
                                            <th>Umur</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Aktif</th>
                                            <th>Jumlah_Acara</th>
                                            <th>Acara</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($member as $key) { ?> 
                                        <tr class="tr-shadow">
                                            <td><?php echo $key->idm ?></td>
                                            <td><?php echo $key->nama ?></td>
                                            <td><?php echo $key->jk ?></td>
                                            <td><?php echo $key->umur ?></td>
                                            <td>
                                                <span class="block-email"><?php echo $key->email ?></span>
                                            </td>
                                            <td><?php echo $key->username ?></td>
                                            
                                            <td>
                                                <?php
                                                if($key->aktif==0)
                                                { ?>
                                                    <a href="<?php echo site_url('Member/editaktif/'.$key->idm.'/1') ?>"> 
                                                    <button type="button" class="btn-danger btn-lg" data-toggle="tooltip" data-placement="top" title="Tidak Hadir"><i class="fa fa-times"></i>
                                                    </button>
                                                    </a>
                                                    
                                                <?php
                                                }
                                                else if($key->aktif==1)
                                                {
                                                    ?>
                                                    <a href="<?php echo site_url('Member/editaktif/'.$key->idm.'/0') ?>"> 
                                                    <button type="button" class="btn-success btn-lg" data-toggle="tooltip" data-placement="top" title="Hadir"><i class="fa fa-check-square"></i>
                                                    </button>
                                                    </a><?php
                                                }?>
                                            </td>
                                            <td>
                                                <?php echo $key->acara ?>
                                            </td>
                                            <td>
                                                 <a href="<?php echo site_url('Acara/memberacara/'.$key->idm.'') ?>">
                                                <button type="button" class="btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Lihat Acara Member">Lihat</button>
                                                 </a>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                   
                                                    <a href="<?php echo site_url('Member/hapus/'.$key->idm.'') ?>">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    </a>
                                                    <a href="<?php echo site_url('Member/vdetail/'.$key->idm.'') ?>">
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
        $('#datamember').DataTable();
    });

   </script>

</body>

</html>
<!-- end document-->