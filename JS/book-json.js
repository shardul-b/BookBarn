let outputDiv = document.getElementById('book-info');
const API_KEY = 'AIzaSyBaRgj-YxD3Nemg1VRo_ZBDfhf3-susTTY';
function myFunction() {
  var x = document.getElementById('book-input').value;
  getBooks(x);
  //document.getElementById("book-info").innerHTML = x;
}
