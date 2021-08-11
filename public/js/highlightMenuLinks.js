// Mettre en surbrillance le lien du menu quand l'ancre qu'il cible est affichée dans la page

window.addEventListener("DOMContentLoaded", () => {
   const ancres = document.querySelectorAll(".ancre[id]");
   document.querySelector("body").addEventListener("scroll", navHighlighter);

   /**
    * 
    */
   function navHighlighter() {
      let scrollY = document.body.scrollTop;
      ancres.forEach(ancre => {
         const sectionHeight = ancre.parentElement.offsetHeight;
         const sectionTop = ancre.parentElement.offsetTop -90;
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