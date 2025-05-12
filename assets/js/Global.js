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
    ]
});