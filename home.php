 <?php

    $query_pemasukan = mysqli_query($koneksi, "SELECT SUM(total_harga) AS total FROM penjualan");
    $total_pemasukan = mysqli_fetch_array($query_pemasukan);
    ?>


 <div class="container-fluid px-4">
     <ol class="breadcrumb mb-4">
     </ol>
     <div class="card text-white mb-4" style="background: linear-gradient(150deg, #1B4332, #40916C);">
         <div class="card-body text-center p-4">
             <h4> PROMO KHUSUS MEMBER</h4>
             <h1 class="font-weight-bold">DISKON 50%</h1>
             <p>Minimal Pembelian Rp. 150.000</p>
             <span class="badge badge-warning p-2">KHUSUS MEMBER</span>
         </div>
     </div>
     <div class="row">

         <div class="col-xl-3 col-md-6">
             <div class="card bg-danger text-white mb-4">
                 <div class="card-body"><?php $query = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pelanggan"));
                                        echo $query; ?> | Pelanggan</div>
                 <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="?page=pelanggan">View Details</a>
                     </i>
                     <div class="small text-white"></i><i class="fas fa-user"></i></div>
                 </div>
             </div>
         </div>
         <!-- #region -->
         <div class="col-xl-3 col-md-6">
             <div class="card bg-success text-white mb-4">
                 <div class="card-body"><?php $query = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penjualan"));
                                        echo $query  ?> | Penjualan</div>
                 <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="?page=penjualan">View Details</a>
                     <div class="small text-white"><i class="fas fa-cart-plus"></i></i></div>
                 </div>
             </div>
         </div>

         <?php
            if ($_SESSION['user']['level'] == 'admin') {
            ?>

             <div class="col-xl-3 col-md-6">
                 <div class="card bg-warning text-white mb-4">
                     <div class="card-body"><?php $query = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk"));
                                            echo $query ?> | Produk</div>
                     <div class="card-footer d-flex align-items-center justify-content-between">
                         <a class="small text-white stretched-link" href="?page=produk">View Details</a>
                         <div class="small text-white"><i class="fas fa-box-open"></i></i></div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-3 col-md-6">
                 <div class="card bg-danger text-white mb-4">
                     <div class="card-body"><?php $query = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user"));
                                            echo $query  ?> | User</div>
                     <div class="card-footer d-flex align-items-center justify-content-between">
                         <a class="small text-white stretched-link" href="?page=user">View Details</a>
                         <div class="small text-white"> <i class="fas fa-users"></i>

                         </div>
                     </div>
                 </div>
             <?php } ?>
             </div>
             <div class="col-12">
                 <div class="card bg-success text-white mb-4">
                     <div class="card-body">
                         Total Pemasukan
                         <h4>Rp <?php echo number_format($total_pemasukan['total'] ?? 0, 0, ',', '.'); ?></h4>
                     </div>
                     <div class="card-footer d-flex align-items-center justify-content-between">
                         <span>Total seluruh pembelian</span>
                         <i class="fas fa-money-bill-wave"></i>
                     </div>
                 </div>