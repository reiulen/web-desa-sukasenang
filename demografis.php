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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="asset/js/Chart.js"></script>
        <?php
             $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
            $a = mysqli_fetch_object($setting)
            ?>
    <link rel="icon" href="web/asset/gambar/<?php echo $a -> logo_desa ?>">
   <title>Demografis <?php echo  $a-> nama_desa ?></title>
  </head>
  <body style="background-color:#f7fafc;">
<header>
  <?php include'asset/include/navbar.php';?>

<section>
  <div class="banner-halaman" style="background-image: url(asset/gambar/wave.svg); height:37vh; background-size: cover; ">
    <div class="container">
     <div class="text-bannner" style="position: absolute; display: block; top:15%; color: #DADADA;">
    <h1 style="font-weight:bold;">Demografis</h1>
     <nav >
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../." class="text-decoration-none" style="color:#dadada;"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="#" class="text-decoration-none" style="color:#dadada;">Demografis</a></li>
        </ol>
      </nav>
  </div>
  </div>
  </div>
</section>
</header>
 
 

<section class="page-data-penduduk my-5">
  <div class="container">
    <div class="row">
      <div class="col-2">
        <div class="row">
           <div class="list-group p-0 m-0 text-center" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">
                  <h1 class="fa fa-map" ></h1>
                  <p class="d-lg-block d-md-none d-none">Luas Wilayah</p>
              </a>
              <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">
                <h1 class="fa fa-search-dollar" ></h1>
                <p class="d-lg-block d-md-none d-none">Kondisi Ekonomi</p>
              </a>
              <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">
                <h1 class="fa fa-building"></h1>
                <p class="d-lg-block d-md-none d-none">Sarana dan Prasarana</p>
              </a>
           </div>
        </div>
      </div>
      <div class="col-10">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

            </div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
          
            </div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
          
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

            </div>
            </div>
          </div>
      </div>
    </div>
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