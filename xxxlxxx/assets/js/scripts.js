$(document).ready(function() {

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    


//   $(".select_image").on("click", function() { 
// 	$(".select_image").children("img").removeClass("border border-primary selected_img");
// 	$(this).children("img").addClass("border border-primary selected_img");
		
// });

       
        //auto_direction

        // $(".auto_direction").on("keyup", function(event) { 
            
        //     if ($(this).val().charCodeAt(0) < 200) {
        //         $(this).css("direction","ltr"); 
        //         $(this).attr('placeholder', $(this).attr("data-msgEng"));

        //     } else if ($(this).val().charCodeAt(0) >= 200){
        //         $(this).css("direction","rtl"); 
        //         $(this).attr('placeholder', $(this).attr("data-msgAr"));

        //     } 
            
        // });

        // $("form .row #title").on("keyup", function() { 

        //     $("#output-title").text($(this).val())

            
        // });

        // $("form .row #message").on("keyup", function() { 

        //     $("#output-message").text($(this).val())
            
        // });

      

});
  
