<?php

if ($_SESSION['user']['level'] != 'admin') {
    echo "<script>alert('Anda tidak memiliki akses ke halaman ini'); location.href='index.php';</script>";
    exit;
}
?>

<div class="container-fluid">
    <h1 class="mt-4">Data User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data User</li>
    </ol>

    <a href="?page=user_tambah" class="btn btn-primary mb-3">+ Tambah User</a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM user");

        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo ucfirst($data['level']); ?></td>
                <td>
                    <a href="?page=user_ubah&id=<?php echo $data['id_user']; ?>" class="btn btn-warning btn-sm">Edit</a>

                    <a href="?page=user_hapus&id=<?php echo $data['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>