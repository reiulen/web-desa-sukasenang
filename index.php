<?php include 'db.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Website Resmi Pemerintahan Desa Sukasenang Kecamatan Cikoneng Kabupaten Ciamis" name="Description" />
    <meta content="Pemerintahan Desa Sukasenang, Website Desa Sukasenang Ciamis, Desa Sukasenang, Website Desa, Website Resmi Desa" name="keywords" />
    <link href="asset/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="asset/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="asset/css//owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css//owl.theme.default.min.css">
    <script src="asset/js/Chart.js"></script>
    <link href="https://github.hubspot.com/odometer/themes/odometer-theme-default.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js"></script>
   <?php
             $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
            $a = mysqli_fetch_object($setting)
            ?>
    <link rel="icon" href="web/asset/gambar/<?php echo $a -> logo_desa ?>">
    <title><?php echo  $a-> nama_desa ?> | <?= $a -> motto_desa ?></title>
  </head>
  <body>
<header>
 <?php include'asset/include/navbar.php';?>
</header>


    <section>  
  <div id="carouselExampleCaptions"  class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php 
                $result = mysqli_query($conn, "SELECT judul,deskripsi,gambar,link FROM gallery WHERE gallery='Ya' ");
                $i = 0;
                foreach ($result as $row) {
                  $actives='';
                  if ($i == 0) {
                    $actives= 'active';
                  }
               ?>
              <div class="carousel-item  <?= $actives; ?>">
              <div class="main-banner"style="background-image:url(web/gambar/<?=$row['gambar'] ?>)"></div>
             <div class="carousel-caption"  data-aos="fade-down" data-aos-duration="1000">
               <a class="text-decoration-none" href="<?=$row['link'] ?>">
                <h2><?=$row['judul'] ?></h2>
                <p><?=$row['deskripsi'] ?></p>
                </a>
              </div>
            </div>
              <?php $i++; }?>
            <button class="carousel-control-prev sm-none" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
      </div>
</div>
</section>     

<section class="bar-menu mb-100">
  <div class="container-fluid">
        <div class="row" style="box-shadow:0px 10px 15px 1px rgba(0, 0, 0, 0.1) , 0px 4px 6px 1px rgba(0, 0, 0, 0.1); background-color:white; border:none;">
     <div class="main-bar-menu col-md col-sm-6 col-6 text-center py-3">
      <a href="profil" style="text-decoration: none; border:none; cursor: pointer; color: black;">
        <div class="row  border-end ">
      <i class="fa fa-home" style="font-size:100px;"></i>
        <h5>Profile</h5>
        </div>
        </a>
      </div>
       <div class="main-bar-menu col-md col-sm-6 col-6 text-center py-3">
        <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-decoration: none; border:none; cursor: pointer;">
        <div class="row  border-end">
        <i class="fa fa-bullhorn" style="font-size:100px;"></i>
        <h5>Pengumuman</h5>
        </div>
      </a>
      </div>
       <div class="main-bar-menu col-md col-sm-6 col-6 text-center py-3">
        <a href="berita" style="text-decoration: none; border:none; cursor: pointer; color: black;">
        <div class="row border-end">
        <i class="fa fa-newspaper" style="font-size:100px;"></i>
        <h5>Berita Desa</h5>
        </div>
        </a>
      </div>
       <div class="main-bar-menu col-md col-sm-6 col-6 text-center py-3">
        <a data-bs-toggle="modal" data-bs-target="#Modalaspirasi" style="text-decoration: none; border:none; cursor: pointer;">
        <div class="row border-end">
        <i class="fa fa-users" style="font-size:100px;"></i>
        <h5>Aspirasi Warga</h5>
        </div>
      </a>
      </div>
       <div class="main-bar-menu col-md col-sm-6 col-6 text-center py-3">
        <a data-bs-toggle="modal" data-bs-target="#Modalpengaduan" style="text-decoration: none; border:none; cursor: pointer;">
        <div class="row border-end">
        <i class="fa fa-phone" style="font-size:100px;"></i>
        <h5>Layanan Pengaduan</h5>
        </div>
      </a>
      </div>
       <div class="main-bar-menu col-md col-sm-6 col-6 text-center py-3 ">
        <a href="gallery" style="text-decoration: none; border:none; cursor: pointer; color: black;">
        <div class="row border-start border-end">
        <i class="fa fa-images" style="font-size:100px;"></i>
        <h5>Gallery</h5>
        </div>
        </a>
      </div>
      </div>
  </div>
</section>

<?= password_hash("admin", PASSWORD_DEFAULT); ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #73006e; color:#DADADA;">
        <h5 class="modal-title" id="exampleModalLabel" >Pengumuman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <div class="row">
          <?php 
          $pengumuman = mysqli_query($conn, "SELECT * FROM tb_pengumuman ORDER BY id DESC");
          while($a= mysqli_fetch_array($pengumuman)){
          ?>
          <div class="col-4 text-center p-2">
           <div class="card"  style="background-color:#f7fafc; border:none; box-shadow: 1px 2px 3px rgba(0, 0, 0, 0.5);">
            <p style="background-color: #73006e; color: #DADADA;"><?php echo substr(strip_tags($a['tanggal_awal']),3,3);?></p>
           <h1 style="font-weight:bold;"><?php echo substr(strip_tags($a['tanggal_awal']),0, 2);?></h1>
           </div>
           </div>
          <div class="col-8 p-2">
            <div class="card" style="border:none;">
           <h5><?php echo $a['nama_pengumuman'] ?></h5>
           <p class="text-muted" style="font-size:12px; padding:0; margin: 0;"><?php echo $a['tanggal_awal']; ?> - <?php echo $a['tanggal_akhir']; ?> </p>
           <p> <i class="fas fa-map-marker-alt pe-2"></i><?php echo $a ['lokasi']; ?></p>
           </div>
          </div>
        <?php } ?>
        </div>
        </div>

      </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="Modalaspirasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-xxl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #73006e; color:#DADADA;">
        <h5 class="modal-title" id="exampleModalLabel" >Aspirasi Warga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
       <iframe src="" style="height:100%; width:100%;"></iframe>
      </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="Modalpengaduan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #73006e; color:#DADADA;">
        <h5 class="modal-title" id="exampleModalLabel" >Layanan Pengaduan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
      <div class="container">
        <div class="row">
          <div class="card text-center" style="border:none;">
            <img src="asset/gambar/halo.svg">
            <h5>Adukan Keluhanmu</h5>
            <?php
            $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
            $wa = mysqli_fetch_object($setting);

            ?>
            <a href="https://wa.me/<?php echo $wa -> no_wa ?>">
            <button type="button" class="btn btn-selengkapnya"  style="background-color: #73006e; color:#DADADA;">Hubungi Kami</button>
            </a>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="Modalasambutan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #73006e; color:#DADADA;">
        <h5 class="modal-title" id="exampleModalLabel" >Sambutan Kepala Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row">
          <div class="card" style="border:none;">
            <?php 
            $sambutan = mysqli_query($conn, "SELECT * FROM tb_sambutan");
            $s = mysqli_fetch_object($sambutan);
            ?>
             <h3 class="p-3 text-center" style="font-weight:bold;">KEPALA DESA SUKASENANG</h3>
            <img class="mx-auto" src="web/gambar/<?php echo $s -> gambar ?>" style="width: 250px;">
            <h4 class="kepala-desa pt-2 text-center"><?php echo $s -> nama ?></h4>
            <p style="margin:0;"><?php echo $s -> sambutan ?></p>
        </div>
      </div>
    </div>
      </div>
      </div>
    </div>
  </div>








          <?php 
            $artikel = mysqli_query($conn, "SELECT * FROM tb_sambutan");
            while($a= mysqli_fetch_array($artikel)){
            ?>
<section class="sambutan-kepala mt-100 mb-5">
  <div class="container-fluid">
    <h1 class="px-5"  data-aos="fade-right" data-aos-duration="1000">Sambutan Kepala Desa</h1>
    <div class="row p-5 ">
      <div class="col-lg-5 text-center">
        <img  data-aos="fade-up" data-aos-duration="1000" src="web/gambar/<?php echo $a['gambar']; ?>" class="img-fluid" style="width: 250px;" >
        <h3 class="text-center"  data-aos="fade-up" data-aos-duration="500"><?php echo $a['nama'];?></h3>
      </div>
      <div class="col-lg-7">
        <h1 class="kutip-text">&#8220;</h1>
        <p  data-aos="fade-left" data-aos-duration="1000"><?php echo substr(strip_tags($a['sambutan']),0,500); ?></p>
      <?php } ?>
       <a data-bs-toggle="modal" data-bs-target="#Modalasambutan" style="text-decoration: none; border:none;">
        <button type="button" class="btn btn-selengkapnya"  data-aos="fade-up" data-aos-duration="1000">Baca Selengkapnya</button>
      </a>
      </div>
    </div>
  </div>
</section>


<section class="data-penduduk" style="background:url(asset/gambar/banner.jpg); background-attachment: fixed; background-size: cover; background-position: cover; height: 90vh; ">
  <div class="container" >
    <h1 class="display-1 text-data-penduduk text-center pt-4 mb-3" data-aos="fade-up" data-aos-duration="1000">Data Penduduk</h1>
    <div class="row text-center" data-aos="fade-up" data-aos-duration="1000">
        <?php 
        $data = mysqli_query($conn,"SELECT * FROM tb_jkelamin ORDER BY id");
        while($d= mysqli_fetch_array($data)){
         ?>
        <div class="col-lg-4">
          <i class="fa fa-male fa-3x" aria-hidden="true"></i>
          <h2 style="font-weight:bold;"><?php echo $d ['jumlah']; ?></h2>
          <h4 style="font-weight:bold;"><?php echo $d['n_kelamin']; ?></h4>
      </div>
    <?php }?>
    <?php 
      $jumlah = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah_total FROM tb_jkelamin;");
      $d = mysqli_fetch_object($jumlah);
     ?>
        <div class="col-lg-4" >
          <i class="fa fa-users fa-3x" aria-hidden="true"></i>
           <h2  style="font-weight:bold;"><?php  echo $d -> jumlah_total  ?></h2>
          <h4  style="font-weight:bold;">JUMLAH WARGA</h4>
      </div> 
      <a href="demografis" style="text-decoration: none; border:none; ">
         <button type="button" class="btn btn-outline text-center button1" data-aos="fade-up" data-aos-duration="1000">LIHAT DEMOGRAFIS</button>
      </a>
      <a href="data-penduduk" style="text-decoration: none; border:none; ">
         <button type="button" class="btn btn-outline text-center button2" data-aos="fade-up" data-aos-duration="1000">LIHAT DATA PENDUDUK</button>
      </a>
  </div>
</div>
</section>


<section class="berita-terbaru py-5"style="background-color: #f7fafc;">
  <div class="container">
   <h1 class="text-center py-5" data-aos="fade-up" data-aos-duration="1000">BERITA TERBARU</h1>
    <div class="row" >
                    <?php
                  
                        $ambildata = mysqli_query($conn, "SELECT * FROM tb_artikel ORDER BY artikel_id DESC LIMIT 6");
                        while($a=mysqli_fetch_array($ambildata)){
                          $tanggal =  $a['tanggal']
                            ?>
            <div class="col-lg-4 col-sm-6 p-4" data-aos="zoom-in-up"  data-aos-duration="1000">
              <div class="thumbnail-berita  " style="background-color: white; box-shadow:0px 20px 30px rgba(0, 0, 0, 0.1);">
              <div class="card">
              <img src="web/gambar/<?php echo $a['gambar_artikel'] ?>" class="img-fluid" style="width:100%;">
              <div class="share-berita text-center py-5">
                  <h3>Share<span class="fas fa-share p-2"></span></h3>
                  <a class="text-decoration-none text-white" href="whatsapp://send?text=http://desasukasenang.rf.gd/berita/strtolower(str_replace(" ", "-", $a['judul_artikel']))" target="_blank" rel="noopener" aria-label="Share on Whatsapp"><i class="fab fa-whatsapp p-1 sosmed"></i></a>
                  <a class="text-decoration-none text-white" href="https://twitter.com/intent/tweet/?text=http://desasukasenang.rf.gd/berita/strtolower(str_replace(" ", "-", $a['judul_artikel']))" target="_blank" rel="noopener" aria-label="Share on Twitter" ><i class="fab fa-twitter p-1 sosmed"></i></a>
                   <a class="text-decoration-none text-white" href="https://facebook.com/sharer/sharer.php?u=http://desasukasenang.rf.gd/berita/strtolower(str_replace(" ", "-", $a['judul_artikel']))" target="_blank" rel="noopener" aria-label="Share on Facebook"><i class="fab fa-facebook p-1 sosmed"></i></a>
                   <a class="text-decoration-none text-white"  href="mailto:?subjecthttp://desasukasenang.rf.gd/berita/strtolower(str_replace(" ", "-", $a['judul_artikel']))" target="_blank" rel="noopener" aria-label="Share on Mail"><i class="fa fa-envelope p-1 sosmed"></i></a>
              </div>
              </div>
              <div class="tanggal-berita">
                <span class="tanggal"><?php echo date('d',strtotime($tanggal));?></span>
                <span class="bulan-tahun"><?php echo date('F',strtotime($tanggal));?></span>
              </div>
              <div class="content-berita my-4 mx-3 px-4 pt-4 pb-5">
                <a class="text-decoration-none" href="berita/<?= strtolower(str_replace(" ", "-", $a['judul_artikel']))?>">
                <h4 class="judul-berita"><?php echo $a['judul_artikel'];?></h4>
                <div class="d-flex text-dark" style="font-size:14px;">
                 <p class="me-3"><i class="fa fa-calendar-alt mx-1"></i><?php echo date('d F',strtotime($tanggal));?></p>
                <p><i class="fa fa-user me-1"></i><?= $a['oleh'] ?></p><p><i class="fa fa-comments ms-3"></i>
                 <?php $komentar= mysqli_query($conn,"SELECT *, COUNT( * ) AS total FROM komentar WHERE id_berita = '$a[artikel_id]' AND status='Aktif' GROUP BY id_berita;");
                 if (mysqli_num_rows($komentar)>0) {
                $kom =mysqli_fetch_object($komentar) ;

                ?>
                <?= $kom->total ?><?php }else{
                  echo'0';
                } ?></p>
                </div>
                <p class="deskripsi-berita"><?php echo substr(strip_tags($a['isi_artikel']),0,250);?>...</p>
                <p class="text-muted selengkapnya">Selengkapnya</i><i class="fas fa-angle-right p-2"></i></p>
                </a>
              </div>
            </div>
          </div>
           <?php
            }
           ?>
      </div>
      <div class="button-berita text-center">
        <a href="berita">
         <button type="button" data-aos="fade-up" data-aos-duration="1000" class="btn btn-outline text-center">LIHAT SEMUA BERITA TERBARU</button>
         </a>
       </div>
    </div>
  </div>
</section>






<section class="perangkat-desa mt-100 pb-5" >
   <div class="container">
     <div class="row">
       <div class="col-md-4">
         <h3>Perangkat Desa</h3>
         <p>Perangkat Desa adalah unsur staf yang membantu Kepala Desa dalam penyusunan Kebijakan dan koordinasi</p>
         <a href="perangkat-desa" class="detail-perangkat">
          <p>Lihat Semua Perangkat Desa</p>
         </a>
         <div id="button-slider"></div>
       </div>
       <div class="col-md-8">
          <div class="owl-carousel owl-theme">
            <?php 
              include 'db.php';
              $no = 1;
              $artikel = mysqli_query($conn, "SELECT * FROM tb_perangkat");
              while($a= mysqli_fetch_array($artikel)){
              ?>
                <div class="col-md-12">
                  <div class="card" data-aos="fade-up" data-aos-duration="1000">
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a['id_perangkat'] ?>" style="text-decoration: none; border: none; cursor: pointer;">
                    <img src="web/gambar/<?php echo $a['gambar'] ?>" class="img-fluid mx-auto" style="height: 240px; width: 200px; object-fit: cover; object-position: top;">
                      <div class="card-body text-center">
                        <h5 style="font-weight:bold;"><?php echo $a['nama'] ?></h5>
                        <p class=""><?php echo $a['jabatan'] ?></p></a>
                      </div>
                  </div>
                </div>
            <?php }?>
          </div>
       </div>
     </div>
   </div>
</section>
<?php
 $artikel = mysqli_query($conn, "SELECT * FROM tb_perangkat");
            while($a= mysqli_fetch_array($artikel)){
?>
<div class="modal fade" id="exampleModal<?php echo $a['id_perangkat']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#73006e; color: white;" >
        <h5 class="modal-title" id="exampleModalLabel">Perangkat Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <h3 class="py-2" style="font-weight:bold;"><?php echo $a['nama'] ;?></h3>
        <img class="m-auto" src="web/gambar/<?php echo $a['gambar'] ?>" class="img-fluid" style=" width:300px;">
       <p class="py-2"><?php echo $a['jabatan'] ?></p>
      </div>
    </div>
  </div>
</div>

  <?php }?>


  <section class="infografis pb-5">
     <div class="container-fluid">
       <h1 class="pt-5 text-center" style="font-weight:bold;">Infografis</h1>
       <div class="infografis-row pb-5 pt-3 d-lg-flex">
         <?php
         $info = mysqli_query($conn, "SELECT * FROM gallery WHERE infografis='Ya' ");
         while($i = mysqli_fetch_array($info)){
         ?>
         <a href="<?= $i['link'] ?>" class="m-0 p-0">
          <div class="box">
            <div class="img">
              <img src="web/gambar/<?= $i['gambar']; ?>" class="img-fluid">
            </div>
            <div class="content-box">
              <h4 style="font-weight:bold;"><?= $i['judul'] ?></h4>
              <p><?= $i['deskripsi'] ?></p>
            </div>
         </a>
          </div>
         <?php } ?>
       </div>
     </div>
  </section>


<section class="lokasi">
  <div class="container">
    <div class="row pt-5 pb-100 px-5">
      <h1 class="text-center mb-5">Maps Desa</h1>
      <?php include'asset/leaflet/leaflet.php'; ?>
    </div>
  </div>
</section>
  




<?php
    include 'db.php';
    $ip      = $_SERVER['REMOTE_ADDR'];
    $tanggal = date("d F Y"); 
    $waktu   = time(); 
    $index ='index';
    $s = mysqli_query($conn,"SELECT * FROM tb_statistik WHERE ip='$ip' AND tanggal='$tanggal' AND halaman='$index' ");
    if(mysqli_num_rows($s) == 0){
    mysqli_query($conn,"INSERT INTO tb_statistik (ip, tanggal, hits, halaman, id_halaman) VALUES('$ip','$tanggal','1','$index', null)");
    } 
    else{
    mysqli_query($conn,"UPDATE tb_statistik SET hits=hits+1 WHERE ip='$ip' AND tanggal='$tanggal' AND halaman='$index' ");
    }
?>












<footer class="footer-akhir p-3">
<?php include'asset/include/footer.php' ; ?>
</footer>






     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="asset/js/owl.carousel.min.js"></script>
   

 
    <script>
   var owl = $('.owl-carousel');
owl.owlCarousel({
    nav:true,
    loop:false,
    dots:false,
    margin:0,
    navText:[
      '<i class="fas fa-arrow-left"></i>',
      '<i class="fa fa-arrow-right"></i>'
    ],
    navContainer: "#button-slider",
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
  });

    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/612b65f6d6e7610a49b28ce8/1fe8ociq4';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
  </body>
</html>