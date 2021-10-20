<?php include'db.php'; ?>
   

      <?php 
              $url = $_GET['slug'];
              $title = str_replace("-", " ", $url);
              $artikel = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE judul_artikel = '$title' ");
              $a= mysqli_fetch_object($artikel);
              $judul =$a->judul_artikel;


              $komentar = mysqli_query($conn, "SELECT * FROM komentar WHERE nama_halaman = '$judul' AND status='Aktif'ORDER BY id ");
              if (mysqli_num_rows($komentar)>0) {
               
              while($k=mysqli_fetch_array($komentar)){
                $tanggal= $k['tgl'];
              ?>
              <?php
              $komentar = mysqli_query($conn, "SELECT * FROM komentar WHERE nama_halaman = '$judul' AND  type_komen = 'komen' AND status='Aktif'ORDER BY id ");
              while($k=mysqli_fetch_array($komentar)){
                $tanggal= $k['tgl'];
              ?>
                <div class="col-10 d-flex">
                  <img data-name="<?= $k['nama']; ?>" class="profile rounded-circle my-3" style="height: 50px;" />
                  <div class="d-flex-none mx-3 my-2">
                    <h5 class="m-0"><?= $k['nama']; ?></h5>
                    <span class="text-muted m-0" style="font-style: italic;"><?= date(' d F Y',strtotime($tanggal));?></span>
                    <p><?= $k['komentar'] ?></p>
                  </div>
                </div>
                 <?php

              $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
              $s = mysqli_fetch_object($setting);
              $balasan = mysqli_query($conn, "SELECT * FROM komentar WHERE nama_halaman = '$judul' AND type_komen ='Balasan'  AND id_komen ='$k[id]' ORDER BY id ");
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
<script>
  $('.profile').initial(); 
</script> 