<?php 
include'db.php';
       ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="asset/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="asset/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="asset/css/artikel.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <?php
             $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
            $a = mysqli_fetch_object($setting);
            ?>
    <link rel="icon" href="web/asset/gambar/<?= $a -> logo_desa ?>" height="10px">
   <title>Perangkat <?= $a -> nama_desa ?></title>
  </head>
  <body style="background-color:#f7fafc;">
<header>
  <?php include'asset/include/navbar.php';?>
<header>


<section class="header-perangkat-desa">
  <div class="container">
    <div class="row">
      <img src="asset/gambar/berita.svg" class="img-fluid my-5" style="width:600px; margin:auto;">
    </div>
     <h1 class="text-center text-dark display-4 m-5" >Perangkat Desa</h1>
  </div>
</section>

 
 
 

 <section class="perangkat-desa mb-100" >
   <div class="container">
    <div class="row">
      <?php 
        $perangkat =mysqli_query($conn, "SELECT * FROM tb_perangkat");
        if (mysqli_num_rows($perangkat)>0) {
        while($p=mysqli_fetch_array($perangkat)){
      ?>
      <div class="col-md-4">
         <a data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#exampleModal<?php echo $p['id_perangkat'] ?>">
        <div class="row m-3  justify-content-center text-center" style="box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.1); background-color:white; border-radius: 8px;">
          <img src="web/gambar/<?php echo $p['gambar']; ?>" class="img-fluid pt-2" style="height: 260px; width: 200px; object-fit: cover; object-position:center ; " >
          <div class="nama-perangkat p-4">
          <h5 style="font-weight:700;"><?php echo $p['nama'] ?></h5>
          <p><?php echo $p['jabatan'] ?></p>
        </a>
          </div>
        </div>
      </div>
    <?php } ?>
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
      <div class="modal-header" style="background-color:#73006e !important; color:#DADADA;" >
        <h5 class="modal-title" id="exampleModalLabel">Perangkat Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <h3 class="py-2" style="font-weight:bold;"><?php echo $a['nama'] ;?></h3>
        <img class="m-auto" src="web/gambar/<?php echo $a['gambar'] ?>" class="img-fluid" style=" width:300px;">
       <h4 class="py-2"><?php echo $a['jabatan'] ?></h4>
      </div>
    </div>
  </div>
</div>

  <?php }}else{
        echo'<h1 class="text-center m-5 p-5" style="background-color:white; border-radius:8px; box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.1);  font-weight:bold;">Tidak Ada Perangkat Desa</h1>';
    } ?>













<footer class="footer-akhir p-3 mt-100">
<?php include'asset/include/footer.php' ; ?>
</footer>





     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../asset/js/owl.carousel.min.js"></script>
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