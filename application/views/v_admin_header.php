<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Penerapan Data Mining Memprediksi Putusan Perkara Perceraian Menggunakan Metode Clustering K-Means Pada Pengadilan Agama Pekanbaru</title>
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>
<table width="100%" style="border-bottom:1px solid black;">
<tr>
	<td style="text-align:center; padding:4px; margin:4px; font-weight:bold;">
		Penerapan Data Mining Memprediksi Putusan Perkara Perceraian Menggunakan Metode Clustering K-Means Pada Pengadilan Agama Pekanbaru
	</td>
</tr>
</table>
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Menu</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            >
        </nav>
<?php
  $geturl1 = $this->uri->segment(1);
  $geturl2 = $this->uri->segment(2);
  $beranda = "";
  $user = "";
  
  if($geturl1=="admin" && ($geturl2=="" or strpos($geturl2, "index")!== FALSE)){
	  $beranda = "active";
  }
  if(strpos($geturl1, "user")!== FALSE){
	  $user = "active";
  }
?>
<div id="layoutSidenav">
	 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link <?php echo $beranda;?>" href="<?php echo base_url(); ?>admin"
                                ><div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Beranda</a>
							<a class="nav-link <?php echo $user;?>" href="<?php echo base_url(); ?>user"
                                ><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User</a>
							<a class="nav-link <?php echo $user;?>" href="<?php echo base_url(); ?>login/logout"
                                ><div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                                Logout</a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Login sebagai :</div>
                        <?php 
						$id_user = $this->session->userdata('id_user');
						$tbl_user = $this->db->query("select * from tbl_user where id_user='$id_user'")->row();
						echo $tbl_user->nm_user;?>
                    </div>
                </nav>
      </div>
	  <div id="layoutSidenav_content">