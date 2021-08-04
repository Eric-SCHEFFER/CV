// TODO: Mettre en surbrillance le menu correspondant à la position du scroll par rapport à son ancre

window.addEventListener("DOMContentLoaded", () => {

   document.querySelector("body").addEventListener("scroll", detecteScroll);

   /**
    * 
    */
   function detecteScroll() {
      console.log(document.body.scrollTop);

   }
});