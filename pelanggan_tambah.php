  <?php
   if(isset($_POST['pelanggan'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $query = mysqli_query($koneksi, "INSERT INTO pelanggan (nama_pelanggan, alamat, no_telepon) VALUES ('$nama_pelanggan', '$alamat', '$no_telepon')");

    if($query) {
        echo "<script>alert('Data berhasil ditambahkan'); location.href='?page=pelanggan';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan')</script>";
    }
   }
  ?>
  
  
  
  <div class="container-fluid px-4">
      <h1 class="mt-4">Pelanggan</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Pelanggan</li>
      </ol>

    <form method="POST">
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
        </div>
        <button type="submit" name="pelanggan" class="btn btn-primary">Tambah Data</button>


     
  </div>
  </div>

  </div>