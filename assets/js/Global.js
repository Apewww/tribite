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

new DataTable('#myTable', {
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

const notif = document.getElementById('notif');
if (notif) {
  setTimeout(() => {
    notif.classList.add('visually-hidden');
  }, 3000);
}

const editButtons = document.querySelectorAll('#edit-akun');
editButtons.forEach(button => {
  button.addEventListener('click', () => {
    document.getElementById('edit-id').value = button.dataset.id;
    document.getElementById('data-nama').value = button.dataset.nama;
    document.getElementById('data-email').value = button.dataset.email;
    document.getElementById('data-role').value = button.dataset.role;
  });
});

const buttons = document.querySelectorAll('#edit-katalog');
buttons.forEach(button => {
    button.addEventListener('click', function () {
        const id = this.dataset.id;
        const nama = this.dataset.nama;
        const deskripsi = this.dataset.deskripsi;
        const harga = this.dataset.harga;
        const kategori = this.dataset.kategori;
        const status = this.dataset.status
        document.getElementById('data-id').value = id;
        document.getElementById('data-nama').value = nama;
        document.getElementById('data-deskripsi').value = deskripsi;
        document.getElementById('data-harga').value = harga;
        document.getElementById('data-kategori').value = kategori;
        document.getElementById('data-status').value = status;
    });
});

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
  const input = document.getElementById('searchInput');
  if(!input) return;

  const filter = input.value.toLowerCase();
  const cards = document.querySelectorAll('.menu-body .card');
  
  cards.forEach(card => {
    const title = card.querySelector('.card-title').textContent.toLowerCase();
    if(title.includes(filter)) {
      card.parentElement.style.display = "block";
    } else {
      card.parentElement.style.display = "none";
    }
  });
}
