const navbar = document.getElementById('navbarNav');
const landing = document.getElementById('landingContent');

navbar.addEventListener('shown.bs.collapse', () => {
  landing.classList.add('landing-blur');
});

navbar.addEventListener('hidden.bs.collapse', () => {
  landing.classList.remove('landing-blur');
});