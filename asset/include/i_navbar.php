
	 <nav class="navbar navbar-expand-lg  fixed-top navbar-light">
  <div class="container">
    <a href="../." class="navbar-brand d-flex">
      <?php
             $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
             while($a= mysqli_fetch_array($setting)){
            ?>
              <img src="../web/asset/gambar/<?php echo $a['logo_desa'] ?>" width="26" height="38" class="d-md-block d-lg-block">
              <span class="align-middle navbar-brand-text d-none d-md-none d-lg-block  mt-1 mx-1">
              <?php echo $a['nama_desa']; ?>
              <b> <?php echo $a['motto_desa']; ?></b>
            <?php } ?>
               </span>
      </a>
    <i class="fa fa-search ms-auto d-md-inline-block d-lg-none"></i>
    <div class="navbar-toggler" id="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span id="span1"></span>
      <span id="span2"></span>
      <span id="span3"></span>
    </div>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../.">Beranda</a>
        </li>
         <li class="nav-item" >
          <a class="nav-link " aria-current="page" href="../berita">Berita Desa</a>
        </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profil<i class="fa fa-angle-down ms-2"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php 
            $artikel = mysqli_query($conn, "SELECT * FROM tb_profile");
            while($a= mysqli_fetch_array($artikel)){
            ?>
            <li>
              <a class="dropdown-item" href="../profil/<?= strtolower(str_replace(" ", "-", $a['judul_halaman']))?>"><?php echo $a['nama_halaman']; ?></a></li>
           <?php } ?>
            </ul>
          </li>
        </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="../kelembagaan" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kelembagaan<i class="fa fa-angle-down ms-2"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php 
            $artikel = mysqli_query($conn, "SELECT * FROM tb_kelembagaan");
            while($a= mysqli_fetch_array($artikel)){
            ?>
            <li><a class="dropdown-item" href="../kelembagaan/<?= strtolower(str_replace(" ", "-", $a['judul_halaman']))?>"><?php echo $a['nama_halaman']; ?></a></li>
           <?php } ?>
          </ul>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle border-end border-1" href="../datadesa" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Data Desa<i class="fa fa-angle-down ms-2"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php 
            $artikel = mysqli_query($conn, "SELECT * FROM tb_datadesa");
            while($a= mysqli_fetch_array($artikel)){
            ?>
            <li><a class="dropdown-item" href="../datadesa/<?= strtolower(str_replace(" ", "-", $a['judul_halaman']))?> "><?php echo $a['nama_halaman']; ?></a></li>
           <?php } ?>
            </ul>
          </li>
           <li class="nav-item px-0 d-none d-lg-inline-block" id="navbar-search">
             <a class="nav-link">
              <input type="checkbox" id="searchbutton" />
              <label for="searchbutton">
                <i class="fa fa-search" id="searchbtn"></i>
                <i class="fas fa-times" id="closesearch"></i>
              </label>
             </a>
            </li>
       
      </ul>
    </div>
  </div>
</nav>

<script>
  window.addEventListener("scroll", function(){
    var header = document.querySelector("nav");
    header.classList.toggle("sticky", window.scrollY);
    navb.classList.remove("show");
    nav.classList.remove("navbar-on");
  });

  let navb = document.querySelector(".navbar-collapse");
  let nav = document.querySelector(".navbar-toggler");
  let search = document.querySelector(".navbar-search");

    nav.addEventListener("click", function(){
    nav.classList.toggle("navbar-on");
    });
</script>
