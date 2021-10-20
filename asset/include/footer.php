 <div class="container">
        <div class="row p-5">
            <div class="col-md-1 d-none d-md-block">
                <img src="asset/gambar/logo.png" style="width: 75%" class="img-fluid">
            </div>
            <div class="col-md-4">
              <?php 
                $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
                $s = mysqli_fetch_object($setting);

              ?>
                <h4 class="footer-judul">PEMERINTAHAN<br><?php echo $s -> nama_desa ?> </h4>
                <hr>
                <?php
                  $sambutan = mysqli_query($conn, "SELECT * FROM tb_sambutan");
                  $a =mysqli_fetch_object($sambutan)
                  ?>
                <p><?php echo substr(strip_tags($a->sambutan),0,150);?></p>
            
              
                <?php
                $sosmed = mysqli_query($conn, "SELECT * FROM tb_sosmed");
                while($s = mysqli_fetch_array($sosmed)){
                 ?>
                 <a href="<?php echo $s['link']; ?>">
                <i class="fab fa-<?= $s['nama'] ?> pe-3" style="font-size:25px;"></i>
                </a>
                <?php } ?>
            </div>
            <div class="col-md-3 ms-auto d-none d-md-block">
              <h4 class="footer">Tentang Kami</h4>
                <div class="footer" style="list-style: none;">
                  <?php
                  $profile = mysqli_query($conn, "SELECT * FROM tb_profile");
                  while($a =mysqli_fetch_array($profile)){
                  ?>
                    <a class="" href="profil/<?= strtolower(str_replace(" ", "-", $a['judul_halaman']))?>" >
                       <p class="px-1"><?php echo $a ['nama_halaman'];?></p>
                    </a>
                  <?php } ?>
                </div>
            </div>
             <div class="col-md-3 ms-auto d-none d-md-block">
              <h4 class="footer">Kontak Kami</h4>
                <div class="footer" style="list-style: none;">
                  <?php
                  $profile = mysqli_query($conn, "SELECT * FROM tb_setting");
                  $a =mysqli_fetch_object($profile);
                  ?>
                      <div class="row">
                      <div class="col-1 pe-2">
                       <i class="fas fa-map-marker-alt"></i>
                       </div>
                       <div class="col-11 mx-auto pe-1">
                         <p><?php echo $a -> alamat ?></p>
                       </div>
                       </div>
                        <p><i class="fas fa-phone-alt pe-2"></i><?php echo $a -> no_hp ?></p>
                        <a href="mailto:<?php echo $a -> email ?>">
                        <p><i class="fas fa-envelope pe-2"></i><?php echo $a -> email ?></p>
                        </a>
                </div>
            </div>
        </div>
    </div>
     <hr>
        <p class="m-2 text-center">copyright by comunity @2021</p>
