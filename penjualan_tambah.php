
<?php

if(isset($_POST['id_pelanggan'])) {

    $id_pelanggan = $_POST['id_pelanggan'];
    $produk = $_POST['produk'];
    $diskon = $_POST['diskon'];
    $total = 0;
    $tanggal = date('Y-m-d');

    if($diskon < 50 || $diskon > 50) {
        echo "<script>alert('Diskon harus 50');</script>";
    } else {

        mysqli_query($koneksi, "INSERT INTO penjualan(tanggal_penjualan,id_pelanggan,total_harga) VALUES ('$tanggal','$id_pelanggan','0')");

        $id_penjualan = mysqli_insert_id($koneksi);

        foreach($produk as $key=>$val) {

            if($val > 0) {

                $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk=$key"));

                $sub = $val * $pr['harga'];
                $total += $sub;

                mysqli_query($koneksi, "INSERT INTO detail_penjualan(id_penjualan,id_produk,jumlah_produk,subtotal) VALUES ('$id_penjualan','$key','$val','$sub')");

                mysqli_query($koneksi, "UPDATE produk SET stok=stok-$val WHERE id_produk=$key");
            }
        }

        $potongan = $total * $diskon / 50;
        $total_bayar = $total - $potongan;

        $query = mysqli_query($koneksi, "UPDATE penjualan SET total_harga=$total_bayar WHERE id_penjualan=$id_penjualan");

        if($query) {
            echo '<script>alert("Penjualan berhasil");location.href="?page=penjualan"</script>';
        } else {
            echo '<script>alert("Penjualan gagal");</script>';
        }
    }
}
?>

<div class="container-fluid">

    <h1 class="mt-4">Penjualan</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Penjualan</li>
    </ol>

    <a href="?page=penjualan" class="btn btn-danger">Kembali</a>

    <form method="post">
        <table class="table table-bordered">

            <tr>
                <td width="200">Nama pelanggan</td>
                <td>:</td>
                <td>
                    <select class="form-select" name="id_pelanggan">
                        <?php
                        $p = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        while($pel = mysqli_fetch_array($p)) {
                        ?>
                            <option value="<?php echo $pel['id_pelanggan']; ?>">
                                <?php echo $pel['nama_pelanggan']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <?php
            $pro = mysqli_query($koneksi, "SELECT * FROM produk");
            while($produk = mysqli_fetch_array($pro)) {
            ?>

            <tr>
                <td>
                    <?php echo $produk['nama_produk'].' (stok : '.$produk['stok'].')'; ?>
                </td>
                <td>:</td>
                <td>
                    <input class="form-control"
                        type="number"
                        value="0"
                        min="0"
                        max="<?php echo $produk['stok']; ?>"
                        name="produk[<?php echo $produk['id_produk']; ?>]">
                </td>
            </tr>

            <?php } ?>

            <tr>
                <td>Diskon (%)</td>
                <td>:</td>
                <td>
                    <input type="number" name="diskon"
                        class="form-control" value="0" min="0" max="100">
                </td>
            </tr>

            <tr>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Hapus</button>
                </td>
            </tr>

        </table>
    </form>

</div>
