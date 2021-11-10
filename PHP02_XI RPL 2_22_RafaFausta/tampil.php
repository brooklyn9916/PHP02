<h1>Daftar Buku</h1>
<?php
    include 'koneksi.php';
    $getbuku = $conn->query("SELECT * FROM tb_buku");
    while($fetchProduct = $getbuku->fetch_assoc()){
   ?>  
   
        <table style="display:inline-table;width:200px">
            <tr>
                <td><img style="width:100%" src="<?=$fetchProduct["gambar_buku"]?>"></td>
    </tr>
    <tr>
        <td>
            <strong><?=$fetchProduct["judul_buku"]?></br>
            <?=$fetchProduct["penulis"]?></br>
            <?=$fetchProduct["jenis_buku"]?></br></br></strong>
        </td>
    </tr>
    <tr>
        <td>
            <a href="update.php?id=<?=$fetchProduct["id_buku"]?>"><button>Update</button></a>
            <a href="delete.php?id=<?=$fetchProduct["id_buku"]?>"><button>Delete</button>
    </table>
   <?php
    }
?>