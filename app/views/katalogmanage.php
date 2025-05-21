<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';
include PARTIALS_PATH . 'header.php';
// echo "Requested URI: " . $uri;

?>


<div class="container-fluid">
    <div class="row">
        <?php include PARTIALS_PATH . 'sidebar.php'; ?>
        
        <div class="col">
            <div class="container mt-4">
                <div class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-center">
                  <div class="text-center text-md-start">
                    <h3>Katalog Management</h3>
                    <p>Halaman pengelolaan katalog.</p>
                  </div>
                  <a href="tambah_katalog.php" class="btn btn-success w-100 w-md-auto mb-4">+ Tambah Produk</a>
                </div>
                <table id="katalogTable" class="table nowrap w-100">
                        <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Produk A</td>
                                <td>Rp 75.000</td>
                                <td>100</td>
                                <td>
                                    <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                        <img src="/tribite/assets/img/keranjang.jpg" class="img-fluid rounded img-katalog" alt="Gambar Produk">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Produk B</td>
                                <td>Rp 50.000</td>
                                <td>75</td>
                                <td>
                                    <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                        <img src="/tribite/assets/img/keranjang.jpg" class="img-fluid rounded img-katalog" alt="Gambar Produk">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
