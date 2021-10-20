<?php 
include'../db.php';
    $url = $_GET['slug'];
    $title = str_replace("-", " ", $_GET['slug']);
    $berita = mysqli_query($conn, "SELECT * FROM tb_kelembagaan WHERE judul_halaman ='$title' ");
    $b= mysqli_fetch_object($berita);
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:site_name" content="Desa Sukasenang">
    <meta property="og:title" content="<?= $b->judul_halaman ?>" />
    <meta property="og:description" content="<?= substr(strip_tags($b->isi_halaman),0,100)?>" />
    <meta property="og:image" itemprop="image" content="../web/gambar/<?= $b->gambar_halaman ?>">
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="<?= $b->tanggal ?>" />
    <title><?= $b->judul_halaman ?></title>
    <?php include'../asset/include/i_head.php'; ?>
  </head>
  <body style="background-color: #f7fafc;">

<header>
<?php include'../asset/include/i_navbar.php';?>

<section>
  <div class="banner-halaman" style="background-image: url(../asset/gambar/wave.svg); height:47vh; background-size: cover; ">
    <div class="container">
     <div class="text-bannner" style="position: absolute; display: block; top:20%; color: #DADADA;">
    <h1 style="font-weight:bold;">Kelembagaan</h1>
     <nav >
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../." class="text-decoration-none" style="color:#dadada;"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="../kelembagaan" class="text-decoration-none" style="color:#dadada;">Kelembagaan</a></li>
            <li class="breadcrumb-item active" style="color:#dadada;"><?= $b->judul_halaman?></li>
        </ol>
     </nav>
  </div>
  </div>
  </div>
</section>
</header>
 
 
 

 <section class="mx-auto">
    <div class="container">
      <div class="row">


        <div class="col-md-9 mx-auto">
         <?php 
          error_reporting(0);
           $url = $_GET['slug'];
          $title = str_replace("-", " ", $_GET['slug']);
          $artikel = mysqli_query($conn, "SELECT * FROM tb_kelembagaan WHERE judul_halaman ='$title' ");
          if (mysqli_num_rows($artikel)>0) {
          $a = mysqli_fetch_object($artikel);
           ?>

          <div class="row content-artikel p-2" style="text-align: justify;">

            <h1 class="judul-berita" style="font-weight: 700;"><?php echo $a -> judul_halaman ?></h1>
            <img src="../web/gambar/<?php echo $a -> gambar_halaman ?>" class="img-fluid" style="border-radius: 3%;">
            <p class="isi-artikel"><?php echo $a -> isi_halaman;?></p>
          </div>
        </div>


        <?php include'../asset/include/widget-artikel.php'; ?>

        <?php 
          }else{
            echo'<script>location="../"</script>';
          }
        ?>
      
       
      </div>
    </div>
 </section>


 <?php include'../asset/include/i_footer.php'; ?>




  </body>
</html>