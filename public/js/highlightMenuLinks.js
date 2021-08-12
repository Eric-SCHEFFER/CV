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
         // Si l'id de l'ancre est "top", on agrandi la hauteur de sa section de la hauteur de la navbar + le padding-top de page-wrapper, pour éviter qu'aucun lien ne soit allumé pendant la transition du scroll avec la prochaine section.
         if (ancre.getAttribute("id") === "top") {
            // Taille navbar et taille padding-top du .page-wrapper
            let navbarheight = document.querySelector(".navbar").offsetHeight;
            let pageWwrapperPadding = parseInt(window.getComputedStyle(document.querySelector(".page-wrapper")).getPropertyValue("padding-top"), 10);
            sectionHeight = ancre.parentElement.offsetHeight + pageWwrapperPadding + navbarheight;
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