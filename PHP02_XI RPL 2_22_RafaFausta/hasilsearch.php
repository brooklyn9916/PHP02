<?php
    $kolom = $_POST['kolom'];
    $cari = $_POST['cari'];
    $link = mysqli_connect("localhost", "root", "", "db_buku");
    $hasil = mysqli_query($link, "SELECT * FROM tb_buku where $kolom like '%$cari%'");
    $jumlah = mysqli_num_rows($hasil);
    echo "<br>";
    echo "Ditemukan: $jumlah";
    echo "<br>";

    while($baris = mysqli_fetch_array($hasil))
    {
        echo "judul_buku : ";
        echo $baris[1];
        echo "<br>";
        echo "penulis : ";
        echo $baris[2];
        echo "<br>";
        echo "jenis_buku : ";
        echo $baris[3];
    }
?>