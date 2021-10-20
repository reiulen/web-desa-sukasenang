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
            $a = mysqli_fetch_object($setting)
            ?>
    <link rel="icon" href="web/asset/gambar/<?php echo $a -> logo_desa ?>" >
   <title>Cari <?= $_GET['cari'] ?></title>
  </head>
  <body style="background-color:#f7fafc;">
<header>
  <?php include'asset/include/navbar.php';?>
<header>

  <div class="container">
     <h1 class="nama-berita mt-100 pt-100 " style="font-weight: bold;">Hasil Pencarian</h1>
  </div>
</header>
 
 <?php 
 if ($_GET['cari']!='') {
  
 ?>


 <section class="berita my-5" >
   <div class="container">
    <?php
    if ($_GET['cari']!='') {
        $where = "WHERE judul_artikel LIKE '%".$_GET['cari']."%' ";
    }
    
          $hasil=mysqli_query($conn, "SELECT * FROM tb_artikel $where ORDER BY artikel_id DESC");
          if (mysqli_num_rows($hasil)>0) {

          while($a=mysqli_fetch_array($hasil)){
          $tanggal =  $a['tanggal'];
          ?>
        <div class="row my-4 justify-content-center" style="box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.1); background-color:white; border-radius: 8px;" data-aos="fade-up" data-aos-duration="500" >
         <div class="col-md-4 m-auto text-center">
           <img data-aos="fade-up" data-aos-duration="600"  src="web/gambar/<?php echo $a['gambar_artikel'] ?>" class="img-fluid" style="border-radius: 7px;">
         </div>
         <div class="col-md-8 my-5">
           <div class="container">
            <a class="text-decoration-none"  href="berita/<?= strtolower(str_replace(" ", "-", $a['judul_artikel']))?>"style="color:black;">
                 <h2 class="judul-berita" data-aos="fade-up" data-aos-duration="800" style="font-weight: bold;"><?php echo $a['judul_artikel']; ?></h2>
                 <p class="text-muted" data-aos="fade-up" data-aos-duration="1000" ><?php echo date('l, d F Y',strtotime($tanggal));?></p>
                 <p data-aos="fade-up" data-aos-duration="1200" ><?php echo substr(strip_tags($a['isi_artikel']),0,300);?>....</p>
                <p class="text-muted selengkapnya" data-aos="fade-up" data-aos-duration="1400" >Selengkapnya<i class="fas fa-angle-right p-2"></i></p>
            </a>
           </div>
       </div>
     </div>
    <?php }?>

   </div>
 </section>

 <section class="berita my-5" >
   <div class="container">
    <?php
     if ($_GET['cari']!='') {
        $where = "WHERE judul_halaman LIKE '%".$_GET['cari']."%' ";
    }
        $hasil=mysqli_query($conn, "SELECT * FROM tb_datadesa $where ORDER BY id_data DESC");
        while($a=mysqli_fetch_array($hasil)){
          $ada= 'adacuy';
          ?>
        <div class="row my-4 justify-content-center" style="box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.1); background-color:white; border-radius: 8px;" data-aos="fade-up" data-aos-duration="500" >
         <div class="col-md-4 m-auto text-center">
           <img data-aos="fade-up" data-aos-duration="600"  src="web/gambar/<?php echo $a['gambar_halaman'] ?>" class="img-fluid" style="border-radius: 7px;">
         </div>
         <div class="col-md-8 my-5">
           <div class="container">
            <a class="text-decoration-none"  href="datadesa/<?= strtolower(str_replace(" ", "-", $a['judul_halaman']))?>"style="color:black;">
                 <h2 class="judul-berita" data-aos="fade-up" data-aos-duration="800" style="font-weight: bold;"><?php echo $a['judul_halaman']; ?></h2>
                 <p data-aos="fade-up" data-aos-duration="1200" ><?php echo substr(strip_tags($a['isi_halaman']),0,300);?>....</p>
                <p class="text-muted selengkapnya" data-aos="fade-up" data-aos-duration="1400" >Selengkapnya<i class="fas fa-angle-right p-2"></i></p>
            </a>
           </div>
       </div>
     </div>
    <?php } }else{
      echo'Tidak Ada Hasil Berita';
    }?>
   </div>
 </section>

  <section class="berita my-5" >
   <div class="container">
    <?php
     if ($_GET['cari']!='') {
        $where = "WHERE judul_halaman LIKE '%".$_GET['cari']."%' ";
     }
        $hasil=mysqli_query($conn, "SELECT * FROM tb_kelembagaan $where ORDER BY id_kelembagaan DESC");
        if (mysqli_num_rows($hasil)>0) {
          
        while($a=mysqli_fetch_array($hasil)){
          ?>
        <div class="row my-4 justify-content-center" style="box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.1); background-color:white; border-radius: 8px;" data-aos="fade-up" data-aos-duration="500" >
         <div class="col-md-4 m-auto text-center">
           <img data-aos="fade-up" data-aos-duration="600"  src="web/gambar/<?php echo $a['gambar_halaman'] ?>" class="img-fluid" style="border-radius: 7px;">
         </div>
         <div class="col-md-8 my-5">
           <div class="container">
            <a class="text-decoration-none"  href="kelembagaan<?= strtolower(str_replace(" ", "-", $a['judul_halaman']))?>"style="color:black;">
                 <h2 class="judul-berita" data-aos="fade-up" data-aos-duration="800" style="font-weight: bold;"><?php echo $a['judul_halaman']; ?></h2>
                 <p data-aos="fade-up" data-aos-duration="1200" ><?php echo substr(strip_tags($a['isi_halaman']),0,300);?>....</p>
                <p class="text-muted selengkapnya" data-aos="fade-up" data-aos-duration="1400" >Selengkapnya<i class="fas fa-angle-right p-2"></i></p>
            </a>
           </div>
       </div>
     </div>
    <?php } }else{
      echo'Tidak Ada Hasil Kelembagaan';
    } ?>

   </div>
 </section>



 <section class="berita my-5" >
   <div class="container">
    <?php
    if ($_GET['cari']!='') {
        $where = "WHERE judul_halaman LIKE '%".$_GET['cari']."%' ";
     }
     $hasil=mysqli_query($conn, "SELECT * FROM tb_profile $where ORDER BY id_profile DESC");
     if (mysqli_num_rows($hasil)>0) {
          
     while($a=mysqli_fetch_array($hasil)){
          ?>
        <div class="row my-4 justify-content-center" style="box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.1); background-color:white; border-radius: 8px;" data-aos="fade-up" data-aos-duration="500" >
         <div class="col-md-4 m-auto text-center">
           <img data-aos="fade-up" data-aos-duration="600"  src="web/gambar/<?php echo $a['gambar_halaman'] ?>" class="img-fluid" style="border-radius: 7px;">
         </div>
         <div class="col-md-8 my-5">
           <div class="container">
            <a class="text-decoration-none"  href="profil/<?= strtolower(str_replace(" ", "-", $a['judul_halaman']))?>"style="color:black;">
                 <h2 class="judul-berita" data-aos="fade-up" data-aos-duration="800" style="font-weight: bold;"><?php echo $a['judul_halaman']; ?></h2>
                 <p data-aos="fade-up" data-aos-duration="1200" ><?php echo substr(strip_tags($a['isi_halaman']),0,300);?>....</p>
                <p class="text-muted selengkapnya" data-aos="fade-up" data-aos-duration="1400" >Selengkapnya<i class="fas fa-angle-right p-2"></i></p>
            </a>
           </div>
       </div>
     </div>
    <?php } }else{
      echo'Tidak Ada Hasil Profile';
    } ?>
   </div>
 </section>

 <section class="berita my-5" >
   <div class="container">
    <?php
    if ($_GET['cari']!='') {
        $where = "WHERE n_tempat LIKE '%".$_GET['cari']."%' ";
    }
        $hasil=mysqli_query($conn, "SELECT * FROM map $where ORDER BY id DESC");        
        if (mysqli_num_rows($hasil)>0) {
        while($a=mysqli_fetch_array($hasil)){
          ?>
        <div class="row my-4 justify-content-center" style="box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.1); background-color:white; border-radius: 8px;" data-aos="fade-up" data-aos-duration="500" >
         <div class="col-md-4 m-auto text-center py-5 px-3">
           <img data-aos="fade-up" data-aos-duration="600"  src="web/gambar/<?php echo $a['gambar_tempat'] ?>" class="img-fluid" style="border-radius: 7px; ">
         </div>
         <div class="col-md-8 my-5">
           <div class="container">
            <a class="text-decoration-none"  href="tempat/<?= strtolower(str_replace(" ", "-", $a['n_tempat']))?>"style="color:black;">
                 <h2 class="judul-berita" data-aos="fade-up" data-aos-duration="800" style="font-weight: bold;"><?php echo $a['n_tempat']; ?></h2>
                 <p data-aos="fade-up" data-aos-duration="1200" ><?php echo substr(strip_tags($a['j_tempat']),0,300);?>....</p>
                <p class="text-muted selengkapnya" data-aos="fade-up" data-aos-duration="1400" >Selengkapnya<i class="fas fa-angle-right p-2"></i></p>
            </a>
           </div>
       </div>
     </div>
    <?php } }else{
      echo'Tidak Ada Hasil Tempat';
    } ?>
   </div>
 </section>



<?php }else{
  echo'<script>location="."</script>';
}


?>




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