<?php
$pageTitle = "Keranjang Saya";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
session_start();
?>

<div class="container py-5 min-vh-100">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <a href="/menu" class="btn btn-outline-secondary">
      <i class="fa fa-arrow-left me-2"></i> Kembali ke Menu
    </a>
    <h2 class="mb-0">Keranjang Saya</h2>
  </div>

  <div id="cart-items" class="row gy-3"></div>

  <div class="card mt-4">
    <div class="card-body d-flex justify-content-between align-items-center">
      <div>
        <input type="checkbox" id="selectAll" class="form-check-input me-2">
        <label for="selectAll" class="form-check-label">Pilih Semua</label>
      </div>
      <div>
        <span>Total: <strong id="totalHarga">Rp 0</strong></span>
        <button class="btn btn-danger ms-3" id="checkoutBtn">Checkout (0)</button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const cartItemsContainer = document.getElementById('cart-items');
  const totalHargaEl = document.getElementById('totalHarga');
  const checkoutBtn = document.getElementById('checkoutBtn');
  const selectAll = document.getElementById('selectAll');

  let keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];

  function renderCart() {
    cartItemsContainer.innerHTML = '';
    let total = 0;
    let totalItem = 0;

    keranjang.forEach((item, index) => {
      const subtotal = item.harga * item.jumlah;
      total += subtotal;
      totalItem += item.jumlah;

      const col = document.createElement('div');
      col.className = 'col-12';

      col.innerHTML = `
        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-3 item-check" data-index="${index}" checked>
            <img src="/tribite/assets/img/keranjang.jpg" alt="gambar" class="img-thumbnail me-3" style="width: 80px; height: 80px; object-fit: cover;">
            <div class="flex-grow-1">
              <h5 class="mb-1">${item.nama}</h5>
              <div class="text-danger">Rp. ${item.harga.toLocaleString()}</div>
              <small>Jumlah: ${item.jumlah}</small>
            </div>
          </div>
        </div>
      `;
      cartItemsContainer.appendChild(col);
    });

    totalHargaEl.textContent = `Rp. ${total.toLocaleString()}`;
    checkoutBtn.textContent = `Checkout (${totalItem})`;
  }

  selectAll.addEventListener('change', function () {
    document.querySelectorAll('.item-check').forEach(cb => cb.checked = this.checked);
  });

  renderCart();
});
</script>


<?php include PARTIALS_PATH . 'footer.php'; ?>
