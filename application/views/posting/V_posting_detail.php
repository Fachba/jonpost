<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>JonPost | Detail</title>

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
                            <li class="breadcrumb-item"><a href="#">Postingan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Single Blog Area Start ****** -->
    <section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-7">
                    <div class="row no-gutters">

                        <!-- Single Post Share Info -->
                        <!-- <div class="col-2 col-sm-1">
                            <div class="single-post-share-info mt-100">
                                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#" class="googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#" class="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </div>
                        </div> -->

                        <!-- Single Post -->
                        <div class="col-12 col-sm-12">
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="<?php echo base_url();?>assets/images/acara/<?php echo $posting['gambar'] ?>" width="700px" height="480px"" >
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">Organisasi <?php echo $posting['organisasi'] ?></a>
                                            </div>
                                            
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#"><?php echo $posting['tanggal'] ?></a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#"> &nbsp <?php echo $posting['jam'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <h2 class="post-headline"><?php echo $posting['tema'] ?></h2>
                                    </a>
                                    <h6>Tempat &nbsp : <?php echo $posting['tempat'] ?>
                                        <br>
                                        Tanggal &nbsp: <?php echo $posting['tanggal'] ?>
                                        <br>
                                        Jam &nbsp &nbsp &nbsp &nbsp: <?php echo $posting['jam'] ?>
                                        <br>
                                    </h6>
                                    <blockquote class="yummy-blockquote mt-30 mb-30">
                                        <h5 class="mb-30"><?php echo $posting['des'] ?></h5>
                                        <h6 class="text-muted"><?php echo $posting['nama'] ?></h6>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ****** Blog Sidebar ****** -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                    <div class="blog-sidebar mt-5 mt-lg-0">
                        <!-- Single Widget Area -->
                        <!-- <div class="single-widget-area about-me-widget text-center">
                            <div class="widget-title">
                                <h6>About Me</h6>
                            </div>
                            <div class="about-me-widget-thumb">
                                <img src="<?php echo base_url();?>assets/yummy/yummy/img/about-img/1.jpg" alt="">
                            </div>
                            <h4 class="font-shadow-into-light">Shopia Bernard</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                        </div>   -->                      
                    </div>

                     <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                            <h2 class="contact-form-title mb-30">Daftar Sekarang !</h2>
                            <!-- Contact Form -->
                            <?php $urisegment=$this->uri->segment(3); ?>
                            <?php echo form_open_multipart('Posting/daftar/'.$urisegment.''); ?>
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" id="contact-name" placeholder="Name" <?php if($this->session->userdata('nama')!=null){?>value="<?php echo $this->session->userdata('nama');}?>">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="umur" class="form-control" id="contact-name" placeholder="Umur Anda" <?php if($this->session->userdata('nama')!=null){?>value="<?php echo $this->session->userdata('umur');}?>">
                                </div>
                                <div class="form-group">
                                    <select name="jk" class="form-control" required>
                                        <?php if($this->session->userdata('nama')!=null){?>
                                            <option value="<?php echo $this->session->userdata('jk'); ?>"><?php echo $this->session->userdata('jk'); ?></option>
                                        <?php }?>
                                        <option value="laki">Laki Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="status" class="form-control" required>
                                        <?php if($this->session->userdata('nama')!=null){?>
                                            <option value="<?php echo $this->session->userdata('status'); ?>"><?php echo $this->session->userdata('status'); ?></option>
                                        <?php }else{?>
                                        <option value="dll"><<--Pilih Status Anda-->></option>
                                        <?php } ?>
                                        <option value="pelajar">Pelajar</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                        <option value="bekerja">Bekerja</option>
                                        <option value="dll">Dll</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="instansi" placeholder="Instansi" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <input type="text" name="telp" placeholder="Nomor Telp / HP" class="form-control" <?php if($this->session->userdata('telp')!=null){?>value="<?php echo $this->session->userdata('telp');}?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="contact-email" placeholder="Email" <?php if($this->session->userdata('nama')!=null){?>value="<?php echo $this->session->userdata('email');}?>">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="alamat" id="message" cols="30" rows="10"  placeholder="Alamat Anda"><?php if($this->session->userdata('nama')!=null){?><?php echo $this->session->userdata('alamat');}?></textarea>
                                </div>
                                <div class="form-group">
                                <h5>* Pastikan Anda Mengisi dengan Baik dan Benar, Terima Kasih</h5>
                                </div>

                                <button type="submit" class="btn contact-btn btn-lg">Daftar Sekarang</button>
                            <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </section>
    <!-- ****** Single Blog Area End ****** -->

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
