<?php
require 'functions.php';

$data = query ("SELECT * FROM surat ORDER BY id DESC");
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
    <title>Dashboard</title>
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
                <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="lampiran.php"><i class="fa-solid fa-file"></i> Lampiran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tulis.php"> <i class="fa-solid fa-pencil"></i> Buat Surat </a>
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
                  <li>
                    <a class="dropdown-item" href="js/fullscreen/jquery.fullscreen-min.js">Fullscreen</a>
                  </li>
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
    <!-- Table -->
    <div class="small-container my-4">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tembusan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Oleh</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
          <?php $i = 1; ?>
          <?php foreach($data as $row): ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <th scope="row"><?= $row["no_surat"] ?></th>
            <td><?= $row["nama_surat"] ?></td>
            <td><?= $row["tembusan_surat"] ?></td>
            <td><?= $row["tanggal_surat"] ?></td>
            <td><?= $row["pengirim_surat"] ?></td>
            <td><?= $row["status_surat"] ?></td>
            <td>
              <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
              <a href="read.php?id=<?= $row["id"]?>" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i></a>
              <a href="hapus.php?id=<?= $row["id"]?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?');"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
          <?php if(empty($data)): ?>
          <tr>
            <td colspan="5">
              <h4 style="text-align: center;">Data tidak ditemukan</h4>
            </td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="js/fullscreen/jquery.fullscreen-min.js"></script>
  </body>
</html>
