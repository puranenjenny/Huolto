
//tallennetaan scrollauskohta localstorageen kun yritetään kirjautua sisään
function saveScrollPosition() {
  localStorage.setItem('scrollPosition', document.body.scrollTop);
}

//palautetaan scrollauskohta kun sivu ladataan ja poistetaan localstoragesta
function restoreScrollPosition() {
  const scrollPosition = localStorage.getItem('scrollPosition');
  if (scrollPosition) {
      document.body.scrollTop = parseInt(scrollPosition, 10);
      localStorage.removeItem('scrollPosition');
  }
}

//kutsutaan funktioita kun sivu ladataan
document.addEventListener('DOMContentLoaded', restoreScrollPosition);
