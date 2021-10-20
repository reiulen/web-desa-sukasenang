
<?php
session_start();
 if (!isset($_SESSION["login"])) {
    echo '<script>location="login-admin.php"</script>';
 }
 include'../db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Desa Sukasenang</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Desa Sukasenang</div>
            </a>


            <!-- Nav Item - Dashboard -->
           <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            
              <li class="nav-item">
                <a class="nav-link" href="data-artikel.php">
                    <i class="fas fa-clipboard"></i>
                    <span>Berita</span></a>
            </li>
            
              <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-pager"></i>
                    <span>Halaman</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item" href="data-halaman.php">Profil</a>
                        <a class="collapse-item" href="data-kelembagaan.php">Kelembagaan</a>
                        <a class="collapse-item" href="data-desa.php">Data Desa</a>
                        <a class="collapse-item" href="data-perangkat-desa.php">Perangkat Desa</a>
                        <a class="collapse-item" href="sambutan-kepala-desa?id=3.php">Sambutan Kepala Desa</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="data-gambar.php">
                   <i class="fas fa-images"></i>
                    <span>Gallery</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="data-pengumuman.php">
                    <i class="fas fa-bullhorn"></i>
                    <span>Pengumuman</span></a>
            </li>
              <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span>Data Penduduk</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item" href="data-pekerjaan.php">Pekerjaan</a>
                        <a class="collapse-item" href="data-agama.php">Agama</a>
                        <a class="collapse-item" href="data-jeniskelamin.php">Jenis Kelamin</a>
                    </div>
                </div>
            </li>
             <li class="nav-item ">
                <a class="nav-link" href="tempat.php">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Tempat</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="setting-desa.php">
                    <i class="fas fa-cogs"></i>
                    <span>Setting Desa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data-sosmed.php">
                    <i class="fas fa-user-circle"></i>
                    <span>Sosmed</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

                <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-eye"></i>
                    <span>Lihat Web</span></a>
            </li>
        

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                         <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown">
                                <i class="far fa-comments text-dark"> Komentar</i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header text-center">
                                    Komentar Terbaru Belum Disetujui
                                </h6>
                             <?php
                                $komentar = mysqli_query($conn, "SELECT * FROM komentar WHERE type_komen = 'komen' AND status ='Nonaktif' ORDER BY id DESC LIMIT 6");
                                while($k=mysqli_fetch_array($komentar)){
                                    $tanggal = $k['tgl'];

                                 ?>
                                <a class="dropdown-item d-flex align-items-center" href="data-komentar">
                                    <div class="dropdown-list-image mr-3">
                                        <img data-name="<?= $k['nama'] ?>" class="profile rounded-circle"/>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?= $k['komentar'] ?></div>
                                         <div class="small text-gray-500"><?= $k['nama_halaman'] ?></div>
                                        <div class="small text-gray-500"><?= $k['nama'] ?> · <?= date(' d F Y',strtotime($tanggal));?></div>
                                    </div>
                                </a>
                               <?php } ?>
                                <a class="dropdown-item text-center small text-gray-500" href="data-komentar">Read More Messages</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1 my-auto">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                           
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

      <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-primary text-white" href="tambah-pengumuman.php">Tambah Pengumuman</a>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th>Nama Pengumuman</th>
                                    <th>Dari</th>
                                    <th>Sampai</th>
                                    <th>Lokasi</th>
                                    <th>Proses</th>
                                </thead>
                                <tbody>
                                     <?php 
                                     include '../db.php';
                                            $pengumuman = mysqli_query($conn, "SELECT * FROM tb_pengumuman ORDER BY id DESC");

                                            while ($row = mysqli_fetch_array($pengumuman)) {
                                    ?>
                                <tr class="kolom">
                                    <td><?php echo $row['nama_pengumuman'] ?></td>
                                    <td><?php echo $row['tanggal_awal'] ?></td>
                                    <td><?php echo $row['tanggal_akhir'] ?></td>
                                    <td><?php echo $row['lokasi'] ?></td>
                                    <td>
                                        <a href="proses-hapus.php?idnp=<?php echo $row['id'] ?>" class="btn btn-primary btn-circle shadow" ><i class="fas fa-trash"></i></a>
                                        <a href="edit/edit-pengumuman.php?id=<?php echo $row['id'] ?>"class="btn btn-primary btn-circle shadow" ><i class="fas fa-edit"></i></a>
                                    </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                        </div>
                    </div>

            <!-- End of Main Content -->

            
 <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 id="exampleModalLabel">Apakah Yakin Ingin Keluar</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;2021 by PKL</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <<script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
    </script>

</body>

</html> 