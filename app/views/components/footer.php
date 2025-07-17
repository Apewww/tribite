<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/tribite/assets/js/bootstrap.bundle.min.js"></script>
<script src="/tribite/assets/js/datatables.min.js"></script>
<script src="/tribite/assets/js/Global.js"></script>

<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: rgba(255,255,255,0.95);">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="searchModalLabel">Cari Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <form action="/menu" method="POST">
          <div class="input-group">
            <input type="text" class="form-control form-control-lg" name="q" id="searchInput" placeholder="Masukkan nama menu..." required>
            <button class="btn btn-danger" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- QR Code Modal -->
  <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title w-100" id="qrModalLabel">QR Code Anda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=User123" alt="QR Code" class="img-fluid" />
        </div>
      </div>
    </div>
  </div>
</body>
</html>