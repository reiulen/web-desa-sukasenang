<?php 
include'../db.php';
 $url = $_GET['slug'];
 $title = str_replace("-", " ", $_GET['slug']);
 $artikel = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE judul_artikel='$title' ");
$a = mysqli_fetch_object($artikel);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:site_name" content="Desa Sukasenang">
    <meta property="og:title" content="<?= $a->judul_artikel ?>" />
    <meta property="og:description" content="<?= substr(strip_tags($a->isi_artikel),0,100)?>" />
    <meta property="og:image" itemprop="image" content="../web/gambar/<?= $a->gambar_artikel ?>">
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="<?= $a->tanggal ?>" />
    <title><?= $a->judul_artikel ?></title>
    <?php include'../asset/include/i_head.php'; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../asset/js/initial.js"></script>
  </head>
  <body style="background-color: #f7fafc;">

<header>
<?php include'../asset/include/i_navbar.php';?>
 <?php 
    $url = $_GET['slug'];
    $title = str_replace("-", " ", $url);
    $artikel = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE judul_artikel= '$title' ");
    $a= mysqli_fetch_object($artikel)
    ?>
<section>
  <div class="banner-halaman" style="background-image: url(../asset/gambar/wave.svg); height:40vh; background-size: cover; ">
    <div class="container">
     <div class="text-bannner" style="position: absolute; display: block; top:17%; color: #DADADA !important;">
    <h2 style="font-weight:bold;">Berita Desa</h2>
    <nav >
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../." class="text-decoration-none" style="color:#dadada;"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="../berita" class="text-decoration-none" style="color:#dadada;">Berita</a></li>
    <li class="breadcrumb-item active" style="color:#dadada;"><?= $a->judul_artikel ?></li>
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
          $title = str_replace("-", " ", $url);
          $artikel = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE judul_artikel= '$title' ");
          if (mysqli_num_rows($artikel)>0) {
          $a = mysqli_fetch_object($artikel);
          $tanggal= $a -> tanggal
           ?>

          <div class="row content-artikel p-2">

            <h1 class="judul-berita mx-1" style="font-weight: 700;"><?php echo $a -> judul_artikel ?></h1>
             <div class="d-flex text-dark text-muted">
                    <p class="opacity-75 mx-1"><?php echo date('l, d F Y',strtotime($tanggal));?></p>
                        <p><i class="fa fa-user ms-3 me-1"></i><?= $a->oleh; ?></p><p><i class="fa fa-comments ms-3 "></i>
                        <?php $komentar= mysqli_query($conn,"SELECT *, COUNT( * ) AS total FROM komentar WHERE id_berita = '$a->artikel_id' AND status='Aktif' GROUP BY id_berita;");
                        if (mysqli_num_rows($komentar)>0) {
                        $kom =mysqli_fetch_object($komentar) ;
                        ?><?= $kom->total ?></p><?php }else{
                            echo'0';
                        } ?>
                        <p class="ms-3 me-1"><i class="fa fa-eye"></i><?php $hit = mysqli_query($conn, "SELECT SUM(hits) AS jumlah_total FROM tb_statistik WHERE id_halaman = $a->artikel_id GROUP BY id_halaman");
                                    if (mysqli_num_rows($hit)>0) {
                                    $h= mysqli_fetch_object($hit);
                                    ?>
                                    <p><?= $h -> jumlah_total; }else{
                                        echo'<p>0</p>';
                                    } ?> Kali</p>
                    </div>
            <img src="../web/gambar/<?php echo $a -> gambar_artikel ?>" class="img-fluid" style="border-radius: 3%;">
            <p class="isi-artikel" align="justify"><?php echo $a -> isi_artikel;?></p>

             <div class="share-halaman mt-5">
              <p class="bagikan" style="font-weight:bold;">Bagikan</p>
              <ul class="d-flex p-0 mt-4">
                <a href="whatsapp://send?text=https://desasukasenang.rf.gd/berita/<?php echo $a->artikel_id; ?>-<?= str_replace(" ", "-", $a->judul_artikel)?>" target="_blank" rel="noopener" aria-label="Share on Whatsapp">
                <li class="whatsapp"><i class="fab fa-whatsapp "></i></li>
                    </a>
                 <a href="https://twitter.com/intent/tweet/?text=https://desasukasenang.rf.gd/berita/<?php echo $a->artikel_id; ?>-<?= str_replace(" ", "-", $a->judul_artikel)?>" target="_blank" rel="noopener" aria-label="Share on Twitter">
                <li class="twitter"><i class="fab fa-twitter"></i></li>
                </a>
                 <a href="https://facebook.com/sharer/sharer.php?u=https://desasukasenang.rf.gd/berita/<?php echo $a->artikel_id; ?>-<?= str_replace(" ", "-", $a->judul_artikel)?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
                <li class="facebook"><i class="fab fa-facebook-f"></i></li>
                </a>
                 <a href="mailto:?subject=https://desasukasenang.rf.gd/berita/<?php echo $a->artikel_id; ?>-<?= str_replace(" ", "-", $a->judul_artikel)?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
                <li class="envelope"><i class="fa fa-envelope"></i></li>
                </a>

              </ul>
            
          </div>

            <div class="container my-5">
              <div class="row form-komen" >
                <div class="invalid-feedback  alert alert-dismissible fade show" id="alertTrue" role="alert" style="background-color:#73006e; color: #DADADA;">
                  <strong>Komentar Berhasil Dikirim,</strong> Tunggu Admin Menyerujui Komentar Kamu!
                </div>
              <form method="post" class="form_komentar" id="formKomen">
                <input type="hidden" name="id_berita" id="komentar_id" value="<?= $a -> artikel_id ?>">
                <input type="hidden" name="nama_halaman" value="<?= $a -> judul_artikel ?>">
                <div class="d-flex">
                <div class="form-group m-2">
                  <label>Nama</label>
                  <input type="name" name="nama" id="nama_pengirim"  class="form-control" placeholder="Masukkan Nama"  />
                  <div class="invalid-feedback m-2 text-danger" id="alertNama">
                      Nama Belum Diisi!
                  </div>
                </div>
                 <div class="form-group m-2">
                  <label>Email</label>
                  <input name="email" id="email"  class="form-control" placeholder="Masukkan Email"   />
                  <div class="invalid-feedback m-2 text-danger" id="alertEmail">
                      Email Belum Diisi!
                  </div>
                </div>
              </div>
                <div class="form-group m-2">
                  <label>Komentar</label>
                  <textarea name="komentar" id="komen" class="form-control" placeholder="Tulis Komentar" rows="5" ></textarea>
                  <div class="invalid-feedback m-2 text-danger" id="alertKomen">
                      Komentar Belum Diisi!
                  </div>
                </div>
                <div class="form-group my-3 mx-2">
                 <button type="submit" name="submit" id="submit" class="btn" style="background-color:#73006e !important; color:#DADADA;" >Kirim Komentar</button>
                </div>
              </form>
              <hr>
              <h4 class="mb-3">Komentar :</h4>
               <div id="tampil"></div>

              <script>
                $(document).ready(function(){
                  $('#tampil').load("../tampil<?= str_replace(" ", "-", $a->judul_artikel) ?> ");
                   $("#submit").click(function(){
                    event.preventDefault();
                    let nama_pengirim = $('#nama_pengirim').val();
                    let email= $('#email').val();
                    let komen = $('#komen').val();
                    
                    if(nama_pengirim==''){
                      var alertNama = document.querySelector("#alertNama");
                      alertNama.classList.remove("invalid-feedback");
                    } else if(email==''){
                      var alertEmail = document.querySelector("#alertEmail");
                      alertEmail.classList.remove("invalid-feedback");
                    } else if(komen==''){
                      var alertKomen = document.querySelector("#alertKomen");
                      alertKomen.classList.remove("invalid-feedback");
                    } else {
                        var form_data =$('.form_komentar').serialize();
                        $.ajax({
                              type  : 'post',
                              url   : '../simpan-komentar',
                              data  : form_data,

                              success : function(){
                                  $('#tampil').load("../tampil<?= str_replace(" ", "-", $a->judul_artikel) ?>");
                                  document.getElementById("formKomen").reset();
                                   var alertTrue = document.querySelector("#alertTrue");
                                   setTimeout(alertTrue.classList.remove("invalid-feedback"),3000);
                              },
                          });
                    }
                  });
             
                });
              </script>
                          
                


              </div>
            </div>

          </div>
        </div>
      <?php }else{
       echo'<script>location="../."</script>';
      } 
      ?>

        <?php include'../asset/include/widget-artikel.php'; ?>


       
      </div>
    </div>
 </section>


<?php
    $url = $_GET['slug'];
    $title = str_replace("-", " ", $url);
    $artikel = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE judul_artikel= '$title' ");
    $a= mysqli_fetch_object($artikel);
    $ip      = $_SERVER['REMOTE_ADDR'];
    $tanggal = date("Ymd"); 
    $id_halaman = $a->artikel_id;
    $artikel = 'artikel';


    $s = mysqli_query($conn,"SELECT * FROM tb_statistik WHERE ip='$ip' AND tanggal='$tanggal' AND id_halaman='$id_halaman' ");
    if(mysqli_num_rows($s) == 0){
    mysqli_query($conn,"INSERT INTO tb_statistik (ip, tanggal, hits, halaman, id_halaman) VALUES('$ip','$tanggal','1','$artikel','$id_halaman')");
    } 
    else{
    mysqli_query($conn,"UPDATE tb_statistik SET hits=hits+1, halaman='artikel', id_halaman='$id_halaman' WHERE ip='$ip' AND tanggal='$tanggal' AND id_halaman='$id_halaman' ");
    }
?>







 <?php include'../asset/include/i_footer.php'; ?>


  </body>
</html>