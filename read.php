<?php

require 'functions.php';

$id = $_GET["id"];

// mengganti status surat menjadi Terbaca

if (read ($id) > 0){
    echo "
    <script>
        alert('Surat telah dibaca!');
        document.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>
        alert('Status surat gagal diubah!');
        document.location.href = 'index.php';
    </script>";
}
?>