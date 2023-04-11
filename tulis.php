<?php
require 'functions.php';

if (isset($_POST["submit"])) {
    if (surat($_POST) > 0) {
        echo "
        <script>
            alert('Surat berhasil terkirim!');
            document.location.href = 'index.php';
        </script>";
    } else {
      echo "
        <script>
          alert('Surat gagal terkirim!');
          document.location.href = 'tulis.php';
        </script>";
    }
}
if (!$result){
  echo mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Tulis Surat</title>
  </head>
  <body>
    <div class="container my-2">
      <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Dashboard</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-3">
              <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="lampiran.php"><i class="fa-solid fa-file"></i> Lampiran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="tulis.php"> <i class="fa-solid fa-pencil"></i> Buat Surat </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> <i class="fas fa-bell"></i> Notifikasi </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Lainnya </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Akun</a></li>
                  <li><a class="dropdown-item" href="#">Pesan</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li><a class="dropdown-item" href="login.html">Keluar</a></li>
                </ul>
              </li>
            </ul>
            <!-- Search -->
            <form class="d-flex" role="search">
              <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </div>
    <div class="small-container">
      <form class="row g-3 my-3" action="" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
          <label for="noSurat" class="form-label">No. Surat</label>
          <input type="text" class="form-control" id="noSurat" name="noSurat" placeholder="ex. 2620/E2/BP/2020" />
        </div>
        <div class="col-md-6">
          <label for="namaSurat" class="form-label">Nama Surat</label>
          <input type="text" class="form-control" id="namaSurat" name="namaSurat" placeholder="ex. Surat pengajuan anggaran" />
        </div>
        <div class="col-12">
          <label for="tembusanSurat" class="form-label">Tembusan</label>
          <input type="text" class="form-control" id="tembusanSurat" name="tembusanSurat" placeholder="ex. Kepala Dinas, Sekertaris Dinas, dan Seluruh anggota" />
        </div>
        <div class="col-12">
          <label for="keteranganSurat" class="form-label">Keterangan</label>
          <input type="text" class="form-control" id="keteranganSurat" name="keteranganSurat" />
        </div>
        <div class="col-md-6">
          <label for="pengirimSurat" class="form-label">Dikirim oleh</label>
          <input type="text" class="form-control" id="pengirimSurat" name="pengirimSurat" placeholder="ex. Kementrian Komunikasi dan Informasi" />
        </div>
        <div class="col-md-4">
          <label for="lokasiPengirim" class="form-label">Lokasi kegiatan</label>
          <select id="inputState" class="form-select" name="lokasiSurat">
            <option value="Jakarta" selected>Jakarta</option>
            <option value="Banten">Banten</option>
            <option value="Depok">Depok</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="narahubung" class="form-label">Narahubung</label>
          <input type="text" class="form-control" id="narahubung" name="narahubung" placeholder="ex. 08xxxxxxxxxx" />
        </div>
        <div class="input-group mb-3 my-4">
          <input type="file" class="form-control" id="lampiranSurat" name="lampiranSurat" />
          <label class="input-group-text" for="lampiranSurat" name="lampiranSurat">Upload</label>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" />
            <label class="form-check-label" for="gridCheck"> Saya bertanggung jawab atas keaslian surat ini </label>
          </div>
        </div>
        <div class="col-12" style="text-align: center">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
