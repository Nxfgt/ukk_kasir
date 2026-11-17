 <?php
 if ($_SESSION['user']['level'] != 'admin') {
        echo "<script>alert('Anda tidak dapat menghapus ini'); location.href='?page=penjualan';</script>";
        exit;
    }
    ?>
 <?php
  $id = $_GET["id"];

    $query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$id'");

    if($query) {
        echo "<script>alert('Data berhasil dihapus'); location.href='?page=pelanggan';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus')</script>";
    }
   
  ?>