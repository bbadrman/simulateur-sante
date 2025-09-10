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

// Form steps functionality
const step1 = document.getElementById("step1");
const step2 = document.getElementById("step2");
const steps = document.querySelectorAll(".step");
const nextStep1Btn = document.getElementById("next-step1");
const prevStep2Btn = document.getElementById("prev-step2");
const confirmBtn = document.getElementById("confirm");

nextStep1Btn.addEventListener("click", function () {
    step1.classList.remove("active");
    step2.classList.add("active");

    steps[0].classList.remove("active");
    steps[1].classList.add("active");

    window.scrollTo({
        top: document.getElementById("formulaire").offsetTop - 70,
        behavior: "smooth",
    });
});

prevStep2Btn.addEventListener("click", function () {
    step2.classList.remove("active");
    step1.classList.add("active");

    steps[1].classList.remove("active");
    steps[0].classList.add("active");

    window.scrollTo({
        top: document.getElementById("formulaire").offsetTop - 70,
        behavior: "smooth",
    });
});

// confirmBtn.addEventListener('click', function() {
//     alert('Votre demande a été envoyée avec succès ! Un conseiller vous contactera rapidement.');
// });

document.addEventListener("DOMContentLoaded", function () {
    const benificaireSelect = document.getElementById("benificaire");
    const nbrBenificGroup = document.getElementById("nbrBenificGroup");

    function toggleNbrBenific() {
        if (benificaireSelect.value === "OUI") {
            nbrBenificGroup.style.display = "block";
        } else {
            nbrBenificGroup.style.display = "none";
        }
    }

    toggleNbrBenific(); // vérifie au chargement
    benificaireSelect.addEventListener("change", toggleNbrBenific);
});
