<h1>Delete Buku</h1>
<?php
    session_start();
    if(isset($_GET["id"])){
    include  'koneksi.php';

    $conn->query("DELETE FROM tb_buku WHERE id_buku = ".$_GET["id"]);

    }
    header("location:tampil.php");
    exit();
?>