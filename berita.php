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
    <link rel="icon" href="web/asset/gambar/<?php echo $a -> logo_desa ?>">
   <title>Berita <?php echo  $a-> nama_desa ?></title>
  </head>
  <body style="background-color:#f7fafc;">
<header>
  <?php include'asset/include/navbar.php';?>
<header>

  <div class="container">
    <div class="row justify-content-center">
      <img src="asset/gambar/berita.svg" class="img-fluid my-5" style="width:600px;">
    </div>
     <h1 class="nama-berita display-4 " style="font-weight: bold;">Berita Desa</h1>
  </div>
</header>
 
 
 

 <section class="berita my-5" >
   <div class="container">
    <?php
     $batas   = 8;
        $halaman = @$_GET['id'];
            if(empty($halaman)){
                $posisi  = 0;
                $halaman = 1;
            }
            else{
                $posisi  = ($halaman-1) * $batas;
            }

        $no = $posisi+1;
        $sql="SELECT * FROM tb_artikel ORDER BY artikel_id DESC LIMIT $posisi,$batas";
        $hasil=mysqli_query($conn,$sql);
        if (mysqli_num_rows($hasil)>0) {
        while ($a = mysqli_fetch_array($hasil)) {
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
                  <div class="d-flex text-dark text-muted" data-aos="fade-up" data-aos-duration="1000" >
                    <p class="text-muted" ><?php echo date('l, d F Y',strtotime($tanggal));?></p>
                        <p><i class="fa fa-user ms-3 me-1"></i><?= $a['oleh']; ?></p><p><i class="fa fa-comments ms-3 "></i>
                        <?php $komentar= mysqli_query($conn,"SELECT *, COUNT( * ) AS total FROM komentar WHERE id_berita = '$a[artikel_id]' AND status='Aktif' GROUP BY id_berita;");
                        if (mysqli_num_rows($komentar)>0) {
                        $kom =mysqli_fetch_object($komentar) ;
                        ?><?= $kom->total ?></p><?php }else{
                            echo'0';
                        } ?>
                    </div>
                 <p data-aos="fade-up" data-aos-duration="1200" ><?php echo substr(strip_tags($a['isi_artikel']),0,300);?>....</p>
                <p class="text-muted selengkapnya" data-aos="fade-up" data-aos-duration="1400" >Selengkapnya<i class="fas fa-angle-right p-2"></i></p>
            </a>
           </div>
       </div>
     </div>
    <?php }?>
<?php

    $query2     = mysqli_query($conn, "SELECT * FROM tb_artikel");
    $jmldata    = mysqli_num_rows($query2);
    $jmlhalaman = ceil($jmldata/$batas);
    $sebelum        = $halaman - 1;
    $setelah        = $halaman + 1;
    ?>
    <div class="text-center">
        <ul class="pagination">
          <li class="page-item">
              <a class="page-link" <?php if($halaman > 1){ echo "href='berita$sebelum'"; } ?>>Previous</a>
          </li>
            <?php
            for($i=1;$i<=$jmlhalaman;$i++) {
                if ($i != $halaman) {
                    echo "<li class='page-item'><a class='page-link' href='berita$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
            }
            ?>
             <li class="page-item">
                <a  class="page-link" <?php  if($halaman < $jmlhalaman) { echo "href='berita$setelah'"; } ?>>Next</a>
              </li>
        </ul>
    </div>
    <?php }else{
        echo'<h1 class="text-center m-5 p-5" style="background-color:white; border-radius:8px; box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.1);  font-weight:bold;">Tidak Ada Berita</h1>';
    }  ?>
   </div>
 </section>

















<footer class="footer-akhir p-3 mt-100">
<?php include'asset/include/footer.php' ; ?>
</footer>





     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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