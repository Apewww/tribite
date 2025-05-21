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
