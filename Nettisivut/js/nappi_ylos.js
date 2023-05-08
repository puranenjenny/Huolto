// nappi joka vie sivun ylös

window.addEventListener("wheel", scrollFunction);

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("btn_ylos").style.display = "block";
  } else {
    document.getElementById("btn_ylos").style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
