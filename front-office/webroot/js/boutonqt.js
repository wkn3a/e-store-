count = document.qt.cad_qt.value;
document.getElementById("plus").onclick = function() {
  count++;
  document.getElementById("count").value = count;
}
document.getElementById("moins").onclick = function() {
  if (count > 0) {
    count--;
    document.getElementById("count").value = count;
  }
}