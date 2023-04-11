<!-- membuat file untuk download file dari surat -->
<?php
    require 'functions.php';
    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT lampiran_surat FROM surat WHERE id = $id");
    $file = mysqli_fetch_assoc($result);
    $file = $file['lampiran_surat'];
    $file = 'client/surat/lampiran/' . $file;
    if (file_exists($file)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
    else{
        echo "File tidak ditemukan";
        header("Location: lampiran.php");
    }
    
?>