links = document.getElementsByClassName("confirm");

Array.from(links).forEach(function (link) {
  link.onclick = function () {
    return confirm("Etes-vous sûr(e) de vouloir vider votre panier ?");
  }
});