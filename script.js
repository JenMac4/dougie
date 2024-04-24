function toggleMenu() {
    var links = document.getElementById("navLinks");
    if (links.classList.contains("expanded")) {
        links.classList.remove("expanded");
    } else {
        links.classList.add("expanded");
    }
}

