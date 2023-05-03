//pitäisi scrollata takas ylös aina ku refreshaa sivun mutta ei tee sitä

// document.addEventListener("DOMContentLoaded", function () {
//     window.scrollTo(0, 0);
//   });

window.addEventListener("load", function () {
    setTimeout(function () {
      window.scrollTo(0, 0);
    }, 0);
  });