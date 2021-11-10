<h1>Update Buku</h1>
<?php
    session_start();

    if(!isset($_GET["id"])){
        header("location:tampil.php");
        exit();
    }

    include 'koneksi.php';

    $id = $_GET["id"];

    $getData = $conn->query("SELECT * FROM tb_buku WHERE id_buku = ".$id);

    if($getData->num_rows==0){
        header("location:tampil.php");
        exit();
    }
    $getData = $getData->fetch_assoc();
?>
<form action="do_simpan.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    <table>
        <tr>
            <td>Judul Buku</td>
            <td>:</td>
            <td><input type="text" name="judul_buku" value="<?=$getData["judul_buku"]?>"></td>
         </tr>
        <tr>
            <td>Nama Penulis</td>
            <td>:</td>
             <td><input type="text" name="penulis" value="<?=$getData["penulis"]?>"></td>
          </tr>
         <tr>
             <td>Jenis Buku</td>
                <td>:</td>
                <td><input type="text" name="jenis_buku" value="<?=$getData["jenis_buku"]?>"></td>
            </tr>
            <tr>
             <td>Gambar Buku</td>
                <td>:</td>
                <td><input type="file" name="gambar_buku" ></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button>Simpan Buku</button></td>
            </tr>
    </table>
    
</form>
<?php
     if(isset($_SESSION["message"])){
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
?>