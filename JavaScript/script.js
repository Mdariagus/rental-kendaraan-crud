const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".navbar-nav a");

function setActiveLink() {
    let current = "home";

    sections.forEach((section) => {
        const sectionTop = section.offsetTop - 100;

        if (window.scrollY >= sectionTop) {
            current = section.id;
        }
    });

    navLinks.forEach((link) => {
        link.classList.remove("active");

        if (link.getAttribute("href") === `#${current}`) {
            link.classList.add("active");
        }
    });
}

window.addEventListener("scroll", setActiveLink);
window.addEventListener("load", setActiveLink);
window.dispatchEvent(new Event("scroll"));