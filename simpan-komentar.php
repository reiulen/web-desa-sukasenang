                 <?php 
                 include'db.php';

                                $nama     = $_POST['nama'];
                                $email     = $_POST['email'];
                                $komentar     = $_POST['komentar'];
                                $id_berita     = $_POST['id_berita'];
                                $nama_halaman     = $_POST['nama_halaman'];
                                $type = 'Komen';
                                $status = 'Nonaktif';
                                

                                $insert = mysqli_query($conn, " INSERT INTO komentar VALUES(
                                          null,
                                          '".$nama."',
                                          '".$email."',
                                          '".$komentar."',
                                          null,
                                          '".$id_berita."',
                                          '".$nama_halaman."',
                                          '".$status."',
                                          '".$type."',
                                          null

                                           
                                )");
                                  

                     
                  ?>
