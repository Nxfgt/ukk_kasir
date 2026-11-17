<div class="container-fluid">

    <h1 class="mt-4">Penjualan</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Penjualan</li>
    </ol>

    <a href="?page=penjualan_tambah" class="btn btn-primary">+ Tambah Penjualan</a>

    <table class="table table-bordered">
        <br>
        <tr>
            <th>Tanggal Penjualan</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['tanggal_penjualan']; ?></td>
                <td><?php echo $data['nama_pelanggan']; ?></td>
                <td><?php echo number_format($data['total_harga'], 0, ',', '.'); ?></td>
                <td>
                    <a href="?page=penjualan_detail&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-secondary">Detail</a>
                    <?php if ($_SESSION['user']['level'] == 'admin') { ?>
                    <a href="?page=penjualan_hapus&&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-danger">Hapus</a>
                    <?php } ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    </table>
</div>