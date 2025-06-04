const navbar = document.getElementById('navbarNav');
const landing = document.getElementById('landingContent');

if (navbar && landing) {
  navbar.addEventListener('shown.bs.collapse', () => {
    landing.classList.add('landing-blur');
  });
  navbar.addEventListener('hidden.bs.collapse', () => {
    landing.classList.remove('landing-blur');
  });
} else {
  console.log("Navbar or Landing elements not found on this page.");
}

new DataTable('#akunTable', {
  responsive: true,
  columnDefs: [
    { responsivePriority: 1, targets: 0 },
  ],
  pageLength: 10,
  lengthMenu: [5, 10, 25, 50],
  ordering: true,
  info: false,
  language: {
    lengthMenu: '_MENU_',
  },
  dom: '<"top w-100"f>rt<"bottom d-flex justify-content-between justify-content-md-end align-items-center mt-3"lp><"clear">'

});

new DataTable('#katalogTable', {
  responsive: true,
  columnDefs: [
    { responsivePriority: 1, targets: 0 },
  ],
  pageLength: 10,
  lengthMenu: [5, 10, 25, 50],
  ordering: true,
  info: false,
  language: {
    lengthMenu: '_MENU_',
  },
  dom: '<"top w-100"f>rt<"bottom d-flex justify-content-between justify-content-md-end align-items-center"lp><"clear">'

});

new DataTable('#kuponTable', {
  responsive: true,
  columnDefs: [
    { responsivePriority: 1, targets: 0 },
  ],
  pageLength: 10,
  lengthMenu: [5, 10, 25, 50],
  ordering: true,
  info: false,
  language: {
    lengthMenu: '_MENU_',
  },
  dom: '<"top w-100"f>rt<"bottom d-flex justify-content-between justify-content-md-end align-items-center"lp><"clear">'

});

const notif = document.getElementById('notif');
if (notif) {
  setTimeout(() => {
    notif.classList.add('visually-hidden');
  }, 3000);
}

// const editAkunButtons = document.querySelectorAll('#edit-akun');
// editAkunButtons.forEach(button => {
//   button.addEventListener('click', () => {
//     document.getElementById('edit-id').value = button.dataset.id;
//     document.getElementById('data-nama').value = button.dataset.nama;
//     document.getElementById('data-email').value = button.dataset.email;
//     document.getElementById('data-role').value = button.dataset.role;
//   });
// });

// const editAkunModal = document.getElementById('AkunEditModal');
// editAkunModal.addEventListener('show.bs.modal', function (event) {
//   const button = event.relatedTarget;
//   const id = button.getAttribute('edit-id');
//   const nama = button.getAttribute('data-nama');
//   const email = button.getAttribute('data-email');
//   const role = button.getAttribute('data-role');
//   this.querySelector('#data-id').value = id || '';
//   this.querySelector('#data-nama').value = nama || '';
//   this.querySelector('#data-email').value = email || '';
//   this.querySelector('#data-role').value = role || '';
// });

// const editKatalogModal = document.getElementById('EditKatalog');
// editKatalogModal.addEventListener('show.bs.modal', function (event) {
//   const button = event.relatedTarget;
//   const id = button.getAttribute('data-id');
//   const nama = button.getAttribute('data-nama');
//   const deskripsi = button.getAttribute('data-deskripsi');
//   const harga = button.getAttribute('data-harga');
//   const kategori = button.getAttribute('data-kategori');
//   const status = button.getAttribute('data-status');
//   this.querySelector('#data-id').value = id || '';
//   this.querySelector('#data-nama').value = nama || '';
//   this.querySelector('#data-deskripsi').value = deskripsi || '';
//   this.querySelector('#data-harga').value = harga || '';
//   this.querySelector('#data-kategori').value = kategori || '';
//   this.querySelector('#data-status').value = status || '';
// });


function toggleSearchInput(e) {
    e.preventDefault();
    const wrapper = document.getElementById('navSearchWrapper');
    const input = document.getElementById('navSearchInput');
    wrapper.classList.toggle('d-none');
    if (!wrapper.classList.contains('d-none')) {
      input.focus();
    }
}

function filterMenu() {
  const keyword = document.getElementById('searchInput').value.toLowerCase();
  const kategori = document.getElementById('kategoriSelect').value.toLowerCase();

  document.querySelectorAll('.card').forEach(card => {
    const nama = card.querySelector('.card-title').textContent.toLowerCase();
    const kategoriItem = card.getAttribute('data-kategori')?.toLowerCase() || '';

    const cocokNama = nama.includes(keyword);
    const cocokKategori = kategori === '' || kategoriItem === kategori;

    if (cocokNama && cocokKategori) {
      card.parentElement.style.display = ''; // tampilkan kolom
    } else {
      card.parentElement.style.display = 'none'; // sembunyikan kolom
    }
  });
}

