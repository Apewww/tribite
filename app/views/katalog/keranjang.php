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

$rowupon = [];
if ($stmt = $conn->prepare("CALL GetKupon()")) {
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rowupon[] = $row;
        }
    } else {
        $_SESSION['notif'] = ["Warn", "Kupon tidak ditemukan!"];
    }
    $stmt->close();
    $conn->next_result();
}

$conn->close();
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
              <select name="KuponSelected" id="KuponSelected" class="form-control">
                <option>Pilih Kupon</option>
                <?php foreach ($rowupon as $row): ?>
                  <option 
                    value="<?= $row['id'] ?? '' ?>"
                    data-nilai="<?= $row['nilai_diskon'] ?? '' ?>"
                    data-tipe="<?= $row['tipe_diskon'] ?? '' ?>" 
                    data-deskripsi="<?= $row['deskripsi'] ?? '' ?>"
                    data-minimal="<?= $row['minimal_belanja'] ?? '' ?>"
                    >
                    <?= $row['kode'] ?> (<?= $row['tipe_diskon'] == 'nominal' ? 'Rp' . number_format($row['nilai_diskon']) : $row['nilai_diskon'] . '%' ?>)
                  </option>
                <?php endforeach; ?>
              </select>
              <div class="mt-1">
                <small id="KuponDeskripsi" class="text-muted fst-italic d-block">
                </small>
            </div>
            </div>
            <div class="mb-3">
              <input type="text" name="FinalPrice" id="totalHargaConfirm" class="form-control" value="" disabled>
              <!-- <span><strong id="totalHargaConfirm">Rp 0</strong></span> -->
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
  const totalHargaConfirm = document.getElementById('totalHargaConfirm');
  const checkoutBtn = document.getElementById('checkoutBtn');
  const selectAll = document.getElementById('selectAll');
  const inputArea = document.getElementById("hiddenInputArea");
  const KuponSelect = document.getElementById("KuponSelected");
  const DescKupon = document.getElementById("KuponDeskripsi");

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
    const selectedOption = KuponSelect.options[KuponSelect.selectedIndex];
    const nilaiDiskon = parseFloat(selectedOption.dataset.nilai || 0);
    const jenisDiskon = selectedOption.dataset.tipe || "";
    const deskripsiDiskon = selectedOption.dataset.deskripsi || "";
    const minimalDiskon = selectedOption.dataset.minimal || "";
    let total = 0;
    let totalItem = 0;
    let Diskon;
    inputArea.innerHTML = "";
    document.querySelectorAll('.item-check').forEach(cb => {
      if (cb.checked) {
        const index = parseInt(cb.dataset.index);
        const item = keranjang[index];
        total += item.harga * item.jumlah;
        totalItem += item.jumlah;

        const inputNama = document.createElement("input");
        inputNama.type = "hidden";
        inputNama.name = `dataCheckout[${index}][nama]`;
        inputNama.value = item.nama;
        
        const inputJumlah = document.createElement("input");
        inputJumlah.type = "hidden";
        inputJumlah.name = `dataCheckout[${index}][jumlah]`;
        inputJumlah.value = item.jumlah;
        
        inputArea.appendChild(inputNama);
        inputArea.appendChild(inputJumlah);
      }
    });

    // keranjang.forEach((item, index) => {
    //   // Input untuk nama produk

    // });

    if(total > minimalDiskon) {
      Diskon = total;
      if (jenisDiskon === "nominal") {
        Diskon -= nilaiDiskon;
      } else if (jenisDiskon === "persen") {
        Diskon -= total * (nilaiDiskon / 100);
      }

      if (Diskon < 0) Diskon = 0;

      DescKupon.innerHTML = deskripsiDiskon;
      totalHargaConfirm.value = `Rp. ${Math.round(Diskon).toLocaleString()}`;
    } else {
      DescKupon.innerHTML = deskripsiDiskon;
      totalHargaConfirm.value = `Rp. ${Math.round(total).toLocaleString()} (Kupon tidak aktif)`;
    }


    

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

  KuponSelect.addEventListener("change", updateTotal);
  renderCart();
});

</script>


<?php include PARTIALS_PATH . 'footer.php'; ?>
