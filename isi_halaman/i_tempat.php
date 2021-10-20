<?php 
include'../db.php';
     $url = $_GET['slug'];
     $title = str_replace("-", " ", $_GET['slug']);
     $berita = mysqli_query($conn, "SELECT * FROM map WHERE n_tempat ='$title' ");
     $b= mysqli_fetch_object($berita);
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:site_name" content="Desa Sukasenang">
    <meta property="og:title" content="<?= $b->n_tempat?>" />
    <meta property="og:description" content="<?= substr(strip_tags($b->j_tempat),0,100)?>" />
    <meta property="og:image" itemprop="image" content="../web/gambar/<?= $b->gambar_tempat ?>">
    <meta property="og:type" content="website" />
    <title><?= $b->n_tempat ?></title>
    <?php include'../asset/include/i_head.php'; ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="crossorigin=""/>
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="../asset/js/initial.js"></script>
  </head>
  <body style="background-color: #f7fafc;">

<header>
<?php include'../asset/include/i_navbar.php';?>

<section>
  <div class="banner-halaman" style="background-image: url(../asset/gambar/wave.svg); height:47vh; background-size: cover; ">
    <div class="container">
     <div class="text-bannner" style="position: absolute; display: block; top:20%; color: #DADADA;">
    <h1 style="font-weight:bold;">Tempat</h1>

    <nav >
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../." class="text-decoration-none" style="color:#dadada;"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="../tempat" class="text-decoration-none" style="color:#dadada;">Tempat</a></li>
        <li class="breadcrumb-item active" style="color:#dadada;"><?= $b->n_tempat?></li>
      </ol>
    </nav>
  </ul>
  </div>
  </div>
  </div>
</section>
</header>
 
 
 

 <section class="detail-tempat mx-auto">
    <div class="container">
      <div class="row">
          

        <div class="col-md-8">
          <div class="row isi-tempat">
            <?php
            error_reporting(0);
            $url = $_GET['slug'];
            $title = str_replace("-", " ", $_GET['slug']);
            $map = mysqli_query($conn, "SELECT * FROM map WHERE n_tempat ='$title' ");
            if (mysqli_num_rows($map)>0) {
            $m=(mysqli_fetch_object($map));
             ?>
             <h1 style="font-weight:600;"><?= $m -> n_tempat  ?></h1>
             <p><?= $m -> alamat  ?></p>
             <img class="img-fluid p-2" style="width: 550px; border-radius: 3%;" src="../web/gambar/<?= $m -> gambar_tempat ?>">
             <p><?= $m -> j_tempat ?></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row isi-tempat">
           <style>
             #mapid { 
              height: 250px; 
            }
           </style>
            <div id="mapid"></div>
          </div>
       
              <div class="row form-komen my-3 mx-0" >
              <form method="POST" action="../simpan-komentar">
                <input type="hidden" name="id_berita" value="<?= $m -> id ?>">
                <input type="hidden" name="nama_halaman" value="<?= $m -> n_tempat ?>">
                <div class="d-flex">
                <div class="form-group m-2">
                  <label>Nama</label>
                  <input type="name" name="nama" id="nama_pengirim" class="form-control" placeholder="Masukkan Nama"  required="Isi Nama" />
                </div>
                 <div class="form-group m-2">
                  <label>Email</label>
                  <input type="email" name="email"  id="floatingInput" class="form-control" placeholder="Masukkan Email"  required="Isi Email" />
                </div>
              </div>
                <div class="form-group m-2">
                  <label>Ulasan</label>
                  <textarea name="komentar" id="komen" class="form-control" placeholder="Tulis Ulasan" rows="5" required="Isi Komentar" ></textarea>
                </div>
                <div class="form-group my-3 mx-2">
                  <input type="submit" name="kirim" id="submit" class="btn" value="Kirim Ulasan" style="background-color:#73006e !important; color:#DADADA;" />
                </div>
              </form>
              <hr>
              <h4 class="mb-3">Ulasan :</h4>
              <?php 
              $artikel = mysqli_query($conn, "SELECT * FROM map WHERE n_tempat ='$title' ");
              $a= mysqli_fetch_object($artikel);
              $idartikel = $a -> id;

              $komentar = mysqli_query($conn, "SELECT * FROM komentar WHERE id_berita = '$idartikel' AND status='Aktif'ORDER BY id ");
              if (mysqli_num_rows($komentar)>0) {
               
              while($k=mysqli_fetch_array($komentar)){
                $tanggal= $k['tgl'];
              ?>
              <?php
              $komentar = mysqli_query($conn, "SELECT * FROM komentar WHERE id_berita = '$idartikel' AND  type_komen = 'komen' AND status='Aktif'ORDER BY id ");
              while($k=mysqli_fetch_array($komentar)){
                $tanggal= $k['tgl'];
              ?>
                <div class="col-10 d-flex">
                  <img data-name="<?= $k['nama'] ?>" class="profile rounded-circle my-3" style="height:50px;" />
                  <div class="d-flex-none mx-3 my-2">
                    <h5 class="m-0"><?= $k['nama']; ?></h5>
                    <span class="text-muted m-0" style="font-style: italic;"><?= date(' d F Y',strtotime($tanggal));?></span>
                    <p><?= $k['komentar'] ?></p>
                  </div>
                </div>
                 <?php

              $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
              $s = mysqli_fetch_object($setting);
              $balasan = mysqli_query($conn, "SELECT * FROM komentar WHERE id_berita = '$idartikel' AND type_komen ='Balasan'  AND id_komen ='$k[id]' ORDER BY id ");
              while($b=mysqli_fetch_array($balasan)){
                $tanggal= $b['tgl'];
                ?>
                <div class="col-10 d-flex mx-5 my-0 text-muted">
                  <img src="../web/asset/gambar/<?= $s->logo_desa ?>" class="img-fluid my-4" style="height:55px; "/>
                  <div class="d-flex-none mx-3 my-0">
                    <p style="font-style: italic; font-size:15px; padding:0; margin:0;">dibalas</p>
                    <h5 class="m-0">Admin</h5>
                    <span class="text-muted m-0" style="font-style: italic; font-size:15px ;"><?= date(' d F Y',strtotime($tanggal));?></span>
                    <p class="my-0"><?= $b['komentar'] ?></p>
                  </div>
                </div>
              <?php  } } 
                  }}else{
                    echo '<p style="font-style:italic;">Belum Ada Komentar</p>';
                  }

               ?>
                        

            </div>

        </div>


      </div>
    </div>
 </section>
  <?php
    }else{
      echo'<script>location="../"</script>';
    }

   ?>

 <?php include'../asset/include/i_footer.php'; ?>




  </body>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <script>
    <?php
    $map= mysqli_query($conn, "SELECT * FROM map WHERE n_tempat = '$title' ");
    $m= mysqli_fetch_object($map);
     ?>
    var mymap = L.map('mapid').setView([<?= $m -> lat ?>,<?= $m -> lng ?>], 17);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="../desa">Desa Sukasenang</a>',
    }).addTo(mymap);
    var geojsonFeature = {
        "type": "Feature",
        "properties": {
            "name": "Coors Field",
            "amenity": "Baseball Stadium",
            "popupContent": "This is where the Rockies play!"
        },
        "geometry": {
            "type": "Point",
            "coordinates": [<?= $m -> lng ?>,<?= $m -> lat ?>]
        }
    };
    L.geoJSON(geojsonFeature).addTo(mymap);
   </script>
    <script>
        $('.profile').initial(); 
    </script> 

</html>