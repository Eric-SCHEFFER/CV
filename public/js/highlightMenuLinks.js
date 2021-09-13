// Met en surbrillance le lien du menu quand l'ancre qu'il cible est affichée dans la page

window.addEventListener("DOMContentLoaded", () => {
   const ancres = document.querySelectorAll(".ancre[id]");
   const fenetre = document.querySelector("body");
   navHighlighter();
   fenetre.addEventListener("scroll", navHighlighter);

   /**
    * 
    */
   function navHighlighter() {
      let scrollY = document.body.scrollTop;
      ancres.forEach(ancre => {
         let sectionHeight = ancre.parentElement.offsetHeight;
         // Si l'id de l'ancre est "top", on agrandi la hauteur de sa section avec la hauteur de la navbar + le padding-top de .page-wrapper, pour éviter que le lien accueil soit éteind pendant une partie de la transition du scroll avec la prochaine section.
         if (ancre.getAttribute("id") === "top") {
            // Hauteur navbar
            let navbarHeight = document.querySelector(".navbar").offsetHeight;
            // Valeur du padding-top de .page-wrapper
            let pageWwrapperPadding = parseInt(window.getComputedStyle(document.querySelector(".page-wrapper")).getPropertyValue("padding-top"), 10);
            sectionHeight = ancre.parentElement.offsetHeight + navbarHeight + pageWwrapperPadding;
         }
         const sectionTop = ancre.parentElement.offsetTop - 70;
         sectionId = ancre.getAttribute("id");
         if (
            scrollY > sectionTop &&
            scrollY <= sectionTop + sectionHeight
         ) {
            document.querySelector(".navbar a[href*=" + sectionId + "]").classList.add("active");
         } else {
            document.querySelector(".navbar a[href*=" + sectionId + "]").classList.remove("active");
         }
      });
   }
});