/**
File    : custom.js
Version : 1.0
**/



/*************------------------------------


 JS INDEX
    ===================


    1. Sticky Header
    2. Parallax
    3. Mobile Menu
    4. Image Hover Start
    5. Counter
    6. Portfolio


------------------------------*************/
(function ($) {
    "use strict";

    /****---- Sticky Header Start ----****/

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            $(".header").addClass("sticky");
        } else {
            $(".header").removeClass("sticky");
        }
    });

    /****---- Parallax Start ----****/



    /****---- Image Hover Start ----****/

     $(".move").hover3d({
         selector: ".movie__card",
         shine: true,
         sensitivity: 22,
     });

    /****---- Image Hover End ----****/



     document.addEventListener('keydown', function (event) {
         if (event.keyCode === 27) {
             event.preventDefault();
             jQuery('.header .main-menu').removeClass('show');
         }
     }.bind(this));    

   $(document).ready(function () {
    });



})(jQuery);