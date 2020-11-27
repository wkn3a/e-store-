links = document.getElementsByClassName("confirm");

Array.from(links).forEach(function (link) {
  link.onclick = function () {
    return confirm("Confirmer l'action ?");
  }
});