// Met en surbrillance le lien du menu quand l'ancre qu'il cible est affichée dans la page

window.addEventListener("DOMContentLoaded", () => {
   const ancres = document.querySelectorAll(".ancre[id]");
   const fenetre = document.querySelector("body");
   navHighlighter();
   fenetre.addEventListener("scroll", navHighlighter);
   // Au chargement de la page, si le scroll est tout en haut, le lien accueil doit être allumé
   // if (fenetre.scrollTop === 0) {
   //    document.querySelector(".navbar a[href*=top]").classList.add("active");
   // }


   /**
    * 
    */
   function navHighlighter() {
      let scrollY = document.body.scrollTop;
      ancres.forEach(ancre => {
         let sectionHeight = ancre.parentElement.offsetHeight;
         // Si l'id de l'ancre est "top", on agrandi la hauteur de sa section pour éviter qu'aucun lien ne soit allumé pendant la transition du scroll avec la prochaine section.
         if (ancre.getAttribute("id") === "top") {
            sectionHeight = ancre.parentElement.offsetHeight + 114;
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