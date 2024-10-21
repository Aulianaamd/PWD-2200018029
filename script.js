
// Get the modal element
var popup = document.getElementById("popup");

// Get the button that opens the modal
var openPopupBtn = document.getElementById("open-popup");

// Get the <span> element that closes the modal
var closeBtn = document.querySelector(".close-btn");

// When the user clicks the button, open the modal
openPopupBtn.onclick = function() {
    popup.style.display = "flex";
}

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function() {
    popup.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}