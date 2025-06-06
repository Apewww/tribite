<?php
$pageTitle = "Keranjang Saya";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
session_start();

// var_dump($_POST['ids']);
$idArray = json_decode($_POST['ids'] ?? '[]', true);
// var_dump($idArray);
if (!isset($_POST['keranjangData'])) {
    echo "<script>alert('Keranjang kosong!'); window.location.href='/menu';</script>";
    exit;
}
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
        <button class="btn btn-danger ms-3" id="checkoutBtn" data-bs-toggle="modal" data-bs-target="#Checkout">Checkout (0)</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Checkout" tabindex="-1" aria-labelledby="CheckoutLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="/menu/keranjang/checkout">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="Checkout">Checkout Payment</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="hiddenInputArea"></div>
            <div class="mb-3">
                <select name="KuponSelected" class="form-control">
                  <option value="">Pilih Kupon</option>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Bayar</button>
          </div>
        </div>
    </form>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const cartItemsContainer = document.getElementById('cart-items');
  const totalHargaEl = document.getElementById('totalHarga');
  const checkoutBtn = document.getElementById('checkoutBtn');
  const selectAll = document.getElementById('selectAll');
  const inputArea = document.getElementById("hiddenInputArea");

  let keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];

  function renderCart() {
    cartItemsContainer.innerHTML = '';

    keranjang.forEach((item, index) => {
      const gambar = item.gambar || '/tribite/assets/img/keranjang.jpg';

      const col = document.createElement('div');
      col.className = 'col-12';
      col.innerHTML = `
        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center">
            <input type="checkbox" class="form-check-input me-3 item-check" data-index="${index}" checked>
            <img src="${gambar}" alt="gambar" class="img-thumbnail me-3" style="width: 80px; height: 80px; object-fit: cover;">
            <div class="flex-grow-1">
              <h5 class="mb-1">${item.nama}</h5>
              <div class="text-danger">Rp. ${item.harga.toLocaleString()}</div>
              <div class="d-flex align-items-center mt-2">
                <button class="btn btn-sm btn-outline-secondary btn-decrease" data-index="${index}">−</button>
                <input type="text" value="${item.jumlah}" readonly class="form-control form-control-sm mx-2" style="width: 50px; text-align: center;">
                <button class="btn btn-sm btn-outline-secondary btn-increase" data-index="${index}">+</button>
              </div>
            </div>
            <button class="btn btn-sm btn-outline-danger btn-delete ms-3" data-index="${index}">Hapus</button>
          </div>
        </div>
      `;
      cartItemsContainer.appendChild(col);
    });

    updateTotal();
    attachEventListeners();
  }

  function updateTotal() {
    let total = 0;
    let totalItem = 0;
    inputArea.innerHTML = "";
    document.querySelectorAll('.item-check').forEach(cb => {
      if (cb.checked) {
        const idx = parseInt(cb.dataset.index);
        const item = keranjang[idx];
        total += item.harga * item.jumlah;
        totalItem += item.jumlah;
      }
    });

    keranjang.forEach((item, index) => {
      // Input untuk nama produk
      const inputNama = document.createElement("input");
      inputNama.type = "hidden";
      inputNama.name = `dataCheckout[${index}][nama]`;
      inputNama.value = item.nama;
      
      // Input untuk jumlah
      const inputJumlah = document.createElement("input");
      inputJumlah.type = "hidden";
      inputJumlah.name = `dataCheckout[${index}][jumlah]`;
      inputJumlah.value = item.jumlah;
      
      // Tambahkan ke form
      inputArea.appendChild(inputNama);
      inputArea.appendChild(inputJumlah);
    });


    totalHargaEl.textContent = `Rp. ${total.toLocaleString()}`;
    checkoutBtn.textContent = `Checkout (${totalItem})`;
  }

  function attachEventListeners() {
    document.querySelectorAll('.item-check').forEach(cb => {
      cb.addEventListener('change', () => {
        updateTotal();

        if (!cb.checked) {
          selectAll.checked = false;
        } else {
          const allChecked = Array.from(document.querySelectorAll('.item-check')).every(c => c.checked);
          selectAll.checked = allChecked;
        }
      });
    });

    document.querySelectorAll('.btn-delete').forEach(btn => {
      btn.addEventListener('click', () => {
        const idx = parseInt(btn.dataset.index);
        keranjang.splice(idx, 1);
        localStorage.setItem('keranjang', JSON.stringify(keranjang));
        renderCart();
      });
    });

    document.querySelectorAll('.btn-increase').forEach(btn => {
      btn.addEventListener('click', () => {
        const idx = parseInt(btn.dataset.index);
        keranjang[idx].jumlah++;
        localStorage.setItem('keranjang', JSON.stringify(keranjang));
        renderCart();
      });
    });

    document.querySelectorAll('.btn-decrease').forEach(btn => {
      btn.addEventListener('click', () => {
        const idx = parseInt(btn.dataset.index);
        if (keranjang[idx].jumlah > 1) {
          keranjang[idx].jumlah--;
          localStorage.setItem('keranjang', JSON.stringify(keranjang));
          renderCart();
        }
      });
    });
  }

  selectAll.addEventListener('change', function () {
    document.querySelectorAll('.item-check').forEach(cb => cb.checked = this.checked);
    updateTotal();
  });

  renderCart();
});

</script>


<?php include PARTIALS_PATH . 'footer.php'; ?>
