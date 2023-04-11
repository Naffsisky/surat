<?php

$conn = mysqli_connect("localhost", "root", "", "arsip");

if (!$result){
    echo mysqli_error($conn);
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function surat($data){
    global $conn;

    $no_surat = htmlspecialchars($data["noSurat"]);
    $nama_surat = htmlspecialchars($data["namaSurat"]);
    $tembusan_surat = htmlspecialchars($data["tembusanSurat"]);
    $tanggal_surat = date("d/m/Y");
    $status_surat = "Belum Dibaca";
    $lokasi_surat = htmlspecialchars($data["lokasiSurat"]);
    $keterangan_surat = htmlspecialchars($data["keteranganSurat"]);
    $pengirim_surat = htmlspecialchars($data["pengirimSurat"]);
    $uploader_surat = "Naffsvn";
    $narahubung = htmlspecialchars($data["narahubung"]);

    $lampiran_surat = lampiran();
    if (!$lampiran_surat){
        return false;
    }

    $query = "INSERT INTO surat VALUES (NULL, '$no_surat', '$nama_surat', '$tembusan_surat', '$tanggal_surat', '$status_surat', '$lokasi_surat', '$keterangan_surat', '$pengirim_surat', '$uploader_surat', '$lampiran_surat',  '$narahubung')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function lampiran(){
    // lampiran surat bentuk pdf
    $namaFile = $_FILES['lampiranSurat']['name'];
    $ukuranFile = $_FILES['lampiranSurat']['size'];
    $error = $_FILES['lampiranSurat']['error'];
    $tmpName = $_FILES['lampiranSurat']['tmp_name'];

    // cek apakah tidak ada lampiran surat yang diupload
    if ($error === 4){
        echo "
        <script>
            alert('Pilih lampiran surat terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah tipe file pdf
    $ekstensiLampiranValid = ['pdf'];
    $ekstensiLampiran = explode('.', $namaFile);
    $ekstensiLampiran = strtolower(end($ekstensiLampiran));
    if (!in_array($ekstensiLampiran, $ekstensiLampiranValid)){
        echo "
        <script>
            alert('Pastikan file dengan format pdf!');
        </script>";
        return false;
    }

    // cek jika ukuran file lebih dari 2MB
    if ($ukuranFile > 2000000){
        echo "
        <script>
            alert('Ukuran file terlalu besar!');
        </script>";
        return false;
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiLampiran;
    $destinationFile = 'client/surat/';

    // lolos pengecekan, lampiran siap diupload
    move_uploaded_file($tmpName, $destinationFile . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id){
    global $conn;

    $result = mysqli_query($conn, "SELECT lampiran_surat FROM surat WHERE id = $id");
    $file = mysqli_fetch_assoc($result);
    $fileName = implode('.', $file);
    $location = "client/surat/$fileName";
    if (file_exists($location)){
        unlink('client/surat/' . $fileName);
    }
    mysqli_query($conn, "DELETE FROM surat WHERE id = $id");
    return mysqli_affected_rows($conn);
}

?>