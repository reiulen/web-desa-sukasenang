
	 <div class="col-md-3 mx-auto">
        <div class="row widget-artikel">





          <div class="col-md-12 my-auto">
           <div class="row">
                     <?php
                      $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
                     
                      while($a= mysqli_fetch_array($setting)){
                        ?>
                        <div class="text-center pt-3">
                          <img src="../web/asset/gambar/<?php echo $a['logo_desa'] ?>" class="img-fluid" style="width: 40%;">
                          </div>
                    <h5 class="pt-3 text-center" style="font-weight: bold;"><?php echo $a['nama_desa']; ?></h5>
                   <div class="col-md-12">
                            <p class="text-center"><?php echo $a['alamat']; ?></p>
                            <?php } ?>
                   </div>   
                </div>
              </div>
 

          <div class="col-md-12 my-auto">
                  <div class="row pt-3 pb-4 px-auto">
                  <h5 style="font-weight:bold;">Cari</h5>
                  <div class="card " style="border-color: #f7f8fd !important; border-radius: 0; background-color:#f7f8fd;">
                  <form class="d-flex" action="" method="POST">
                  <input type="text" placeholder="Cari" name="cari" class="form-control" style="border:none; background:none;" required="">
                  <button type="submit" name="submit" class="btn-search btn"><i class="fa fa-search"></i></button>
                  </form>
                  <?php 

                  if (isset($_POST['submit'])) {

                    $cari =$_POST['cari'];
                    session_start();    
                    if ($_POST['cari']!='') {
                      echo'<script>location="../i?cari='.$cari.'  "</script>';
                    }

                  }

                  ?>

                  </div>
                  </div>
                </div>









             <div class="col-md-12 my-auto">
                  <div class="row pb-4 pt-2">
                  <h5 style="font-weight: bold; margin: 10px auto;">Baca Juga</h5>
                   <?php
                              
                  $no = 1;
                  $artikel = mysqli_query($conn, "SELECT * FROM tb_artikel ORDER BY artikel_id DESC LIMIT 3");
                  while($a= mysqli_fetch_array($artikel)){
                    $tanggal =  $a['tanggal'];
                                  ?>
                  <div class="col-4 my-3">
                    <img src="../web/gambar/<?php echo $a['gambar_artikel'] ?>" class="img-fluid" style="border-radius: 3px;">
                  </div>
                  <div class="col-8 ps-0 my-1">
                    <a class="text-decoration-none"  href="../berita/<?= strtolower(str_replace(" ", "-", $a['judul_artikel']))?>"style="color:black;">
                    <p class="p-0 m-0 judul-berita" style="font-weight:600 ; cursor:pointer; ;"><?php echo $a['judul_artikel'] ?></p>
                    <span class="text-muted p-0" style="font-size:14px;"> <i class="fa fa-calendar-alt p-1"></i><?php echo date('d F Y',strtotime($tanggal));?></span>
                     <div class="d-flex text-dark mx-1" style="font-size:14px;">
                    <p><i class="fa fa-user me-2"></i><?= $a['oleh'] ?></p><p><i class="fa fa-comments ms-3 "></i>
                        <?php $komentar= mysqli_query($conn,"SELECT *, COUNT( * ) AS total FROM komentar WHERE id_berita = '$a[artikel_id]' AND status='Aktif' GROUP BY id_berita;");

                        if (mysqli_num_rows($komentar)>0) {
                        $kom =mysqli_fetch_object($komentar) ;
                        ?><?= $kom->total ?></p><?php }else{
                            echo'0';
                        } ?>
              </div>
                  </a>
                  </div>
                 <?php } ?>
                </div>
              </div>

   
        <div class="col-lg-12 my-auto">
                  <div class="row ">
                      <h5 class="text-center" style="font-weight:bold;">Ikuti Kami</h5>
                       <?php  
                            $setting = mysqli_query($conn, "SELECT * FROM tb_sosmed");
                            while($a= mysqli_fetch_array($setting)){ ?>
                             
                      <a href="<?php echo $a['link']; ?>">
                      <p class="text-center ">
                        <img src="../web/gambar/<?php echo $a['gambar'];?>" style="width:35px;">
                       </p></a>
                      
                        <?php } ?>
                  </div>
                </div>
        </div>
      </div>
