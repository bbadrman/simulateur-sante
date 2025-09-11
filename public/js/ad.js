document.querySelector(".menu-toggle").addEventListener("click", function () {
    document.querySelector("nav ul").classList.toggle("active");
});

// Smooth scrolling for navigation links
document.querySelectorAll("nav a, .hero a").forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();

        const targetId = this.getAttribute("href");
        const targetElement = document.querySelector(targetId);

        window.scrollTo({
            top: targetElement.offsetTop - 70,
            behavior: "smooth",
        });

        // Close mobile menu if open
        document.querySelector("nav ul").classList.remove("active");
    });
});

// confirmBtn.addEventListener('click', function() {
//     alert('Votre demande a été envoyée avec succès ! Un conseiller vous contactera rapidement.');
// });
