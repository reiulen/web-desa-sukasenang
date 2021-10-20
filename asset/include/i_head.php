<link href="../asset/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../asset/css/artikel.css">
    <link rel="stylesheet" type="text/css" href="../asset/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <?php
       $setting = mysqli_query($conn, "SELECT * FROM tb_setting");
       $a = mysqli_fetch_object($setting)
    ?>
<link rel="icon" href="../web/asset/gambar/<?php echo $a -> logo_desa ?>" >