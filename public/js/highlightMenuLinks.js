// TODO: Mettre en surbrillance le lien du menu quand l'ancre qu'il cible est affichée dans la page

window.addEventListener("DOMContentLoaded", () => {

   const ancres = document.querySelectorAll(".ancre[id]");
   const sections = document.querySelectorAll(".ancre[id] + section.bloc-1")
   document.querySelector("body").addEventListener("scroll", navHighlighter);

   /**
    * 
    */
   function navHighlighter() {
      let scrollY = window.document.body.scrollTop;
      console.log(scrollY);

   }
});