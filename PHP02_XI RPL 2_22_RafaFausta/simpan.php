<?php
    session_start();
    if(isset($_POST["judul_buku"])){
        include './koneksi.php';

        $judul_buku = $_POST['judul_buku'];
        $penulis = $_POST['penulis'];
        $jenis_buku = $_POST['jenis_buku'];
        $gambar_buku = $_FILES['gambar_buku'];

        $message = "";

        

        if($judul_buku == ""){
            $message = "Judul Buku harus diisi!";
        }else if($penulis == ""){
            $message = "Penulis harus diisi!";
        }else if($jenis_buku == ""){
            $message = "Jenis Buku harus diisi!";
        }else if(!isset($gambar_buku["tmp_name"]) || $gambar_buku["tmp_name"] == ""){
            $message = "Gambar Buku harus diisi!";
        }else{

            $filePath = "upload/".basename($gambar_buku["name"]);
            move_uploaded_file($gambar_buku["tmp_name"], $filePath);

            $conn->query("INSERT INTO tb_buku VALUES (null, '".$judul_buku."','".$penulis."','".$jenis_buku."', '".$filePath."')");

            $message = "Buku berhasil ditambahkan!";
        }

        $_SESSION["message"] = $message;
    }

    header("location:formulir.php");
    exit();

?>