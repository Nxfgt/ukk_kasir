  <?php
   if(isset($_POST['produk'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = mysqli_query($koneksi, "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga', stok = '$stok' WHERE id_produk = '$_GET[id]'");

    if($query) {
        echo "<script>alert('Data berhasil diubah'); location.href='?page=produk';</script>";
    } else {
        echo "<script>alert('Data gagal diubah')</script>";
    }
   }
  ?>
  
  
  
  <div class="container-fluid px-4">
      <h1 class="mt-4">Produk</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Produk</li>
      </ol>

    <form method="POST">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control" id="stok" name="stok" required>
        </div>
        <button type="submit" name="produk" class="btn btn-primary">Ubah Data</button>
        <button type="reset" name="produk" class="btn btn-secondary">Reset</button>


     
  </div>
  </div>

  </div>