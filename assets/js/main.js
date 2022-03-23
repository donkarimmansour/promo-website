$(function () {

    if (window.location.href.includes("blog/")) {
        $("header .search").addClass("hidden")
        $("header .blog").removeClass("hidden")
        $("header .perks").addClass("hidden")
        $("header ul.nav-perks").addClass("hidden")
        $("header ul.nav-blog").removeClass("hidden")
    } else {
        $("header .search").removeClass("hidden")
        $("header .blog").addClass("hidden")
        $("header .perks").removeClass("hidden")
        $("header ul.nav-perks").removeClass("hidden")
        $("header ul.nav-blog").addClass("hidden")
    }


    $("body > header > nav").each(function () {

        let a = $(this).find("a");
        a.each(function () {
            if (window.location.href.includes($(this).attr("href"))) {
                $(this).addClass("selected");
            } else {
                $(this).removeClass("selected");
            }
        });


        $(this).hover(
            function () {
                $(this).addClass("active");
            },
            function () {
                $(this).removeClass("active");
            }
        );


    });

    $(".menu-icon-container").on("click", function () {
        if ($(".menu-icon-container").attr("aria-expanded") == "true") {
            $(".menu-icon-container").attr("aria-expanded", "false")
            $("header nav.menu").addClass("hidden").addClass("notactive").removeClass("active")

        } else {
            $(".menu-icon-container").attr("aria-expanded", "true")
            $("header nav.menu").removeClass("hidden").removeClass("notactive").addClass("active")
        }

    });

    $("header .secondary button.back").on("click", function () {
        $(this).parent().parent("ul").removeClass("menu-active")
        $(this).parents(".secondary").removeClass("menu-active")
        $("header ul.tertiary").removeClass("menu-hide")
        $(this).focus();
    });

    $("header .secondary button.sub-menu-button").on("click", function () {
        $(this).next("ul").removeClass("menu-hide").addClass("menu-active");
        $(this).parent().parent(".secondary").removeClass("menu-hide").addClass("menu-active");
        $("header ul.tertiary").removeClass("menu-active").addClass("menu-hide")
        $(this).focus();
    });


    $("header .tertiary button.back").on("click", function () {
        $(this).parent().parent("ul").removeClass("menu-active")
        $(this).parents(".tertiary").removeClass("menu-active")
        $("header ul.secondary").removeClass("menu-hide")
        $(this).focus();
    });

    $("header .tertiary  button.sub-menu-button").on("click", function () {
        $(this).next("ul").removeClass("menu-hide").addClass("menu-active");
        $(this).parent().parent(".tertiary").removeClass("menu-hide").addClass("menu-active");
        $("header ul.secondary").removeClass("menu-active").addClass("menu-hide")
        $(this).focus();
    });

    $("header .catcher").on("click", function () {
        if ($(".menu-icon-container").attr("aria-expanded") == "true") {
            $(".menu-icon-container").attr("aria-expanded", "false")
            $("header nav.menu").addClass("hidden").addClass("notactive").removeClass("active")
        }
    });


    $("header .search .search-icon ,header .search .search-close").on("click", function () {
        if ($("header .search .search-close").hasClass("hidden")) {
            $("header .search .search-close").removeClass("hidden")
            $("header .search .searchOverlay").removeClass("hidden")
            $("header .search .search-icon").addClass("hidden")
            $("header .search").addClass("expanded")
            if ($(window).innerWidth() <= 770) $("header .menu-icon-container").addClass("hidden")
            $("header .search #search-focus").focus()
        } else {
            $("header .search .search-close").addClass("hidden")
            $("header .search .searchOverlay").addClass("hidden")
            $("header .search .search-icon").removeClass("hidden")
            $("header .search").removeClass("expanded")
            if ($(window).innerWidth() <= 770) $("header .menu-icon-container").removeClass("hidden")
        }

    });


    $("header .search #search-focus").on("focus", function () {
        if ($("header .search .search-close").hasClass("hidden")) {
            $("header .search .search-close").removeClass("hidden")
            $("header .search .searchOverlay").removeClass("hidden")
            $("header .search .search-icon").addClass("hidden")
            $("header .search").addClass("expanded")
            if ($(window).innerWidth() <= 770) $("header .menu-icon-container").addClass("hidden")
        }
    });

    $("header .search #search-focus").on("blur", function () {
        // if (!$("header .search .search-close").hasClass("hidden")) {
        //     $("header .search .search-close").addClass("hidden")
        //     $("header .search .searchOverlay").addClass("hidden")
        //     $("header .search .search-icon").removeClass("hidden")
        //     $("header .search").removeClass("expanded")
        //     if ($(window).innerWidth() <= 770) $("header .menu-icon-container").removeClass("hidden")
        // }
    });


    $(".l-blog-container .left , .l-blog-container .right").on({
        mouseenter: () => {
            $(".l-blog-container .left").css("transform", `translateX(-0px)`);
            $(".l-blog-container .right").css("transform", `translateX(0px)`);
        },
        mouseleave: () => {
            $(".l-blog-container .left").css("transform", `translateX(-60px)`);
            $(".l-blog-container .right").css("transform", `translateX(60px)`);
        }
    });

    $(".l-blog-container .left").on("click", () => {
        $(".l-blog-container .nav span").each(function () {
            if ($(this).hasClass("active")) {
                const index = $(this).index()
                const len = $(".l-blog-container .featured .nav span").length
                if (index == 0) {
                    $(".l-blog-container .slides").css("transform", `translateX(-${len - 1}00%)`);
                    $(".l-blog-container .featured  .nav span").removeClass("active")
                    $(".l-blog-container .featured  .nav span").eq(len - 1).addClass("active")
                    return false;
                } else {

                    $(".l-blog-container .slides").css("transform", `translateX(-${index - 1}00%)`);
                    $(".l-blog-container .featured  .nav span").removeClass("active")
                    $(".l-blog-container .featured  .nav span").eq(index - 1).addClass("active")
                    return false;
                }

            }
        })
    });


    $(".l-blog-container .right").on("click", () => {
        $(".l-blog-container .nav span").each(function () {
            if ($(this).hasClass("active")) {
                const index = $(this).index()
                const len = $(".l-blog-container .featured .nav span").length
                if (index == (len - 1)) {
                    $(".l-blog-container .slides").css("transform", `translateX(-0%)`);
                    $(".l-blog-container .featured  .nav span").removeClass("active")
                    $(".l-blog-container .featured  .nav span").eq(0).addClass("active")
                    return false;
                } else {

                    $(".l-blog-container .slides").css("transform", `translateX(-${index + 1}00%)`);
                    $(".l-blog-container .featured  .nav span").removeClass("active")
                    $(".l-blog-container .featured  .nav span").eq(index + 1).addClass("active")
                    return false;
                }

            }
        })
    });



    $(".l-blog-container .featured .nav span").on("click", function () {

        $(".l-blog-container .featured  .nav span").removeClass("active")
        const index = $(this).index()
        $(".l-blog-container .slides").css("transform", `translateX(-${index}00%)`);
        $(this).addClass("active")

    });



    (function () {

        setInterval(() => {
            $(".l-blog-container .nav span").each(function () {
                if ($(this).hasClass("active")) {
                    const index = $(this).index()
                    const len = $(".l-blog-container .featured .nav span").length
                    if (index == (len - 1)) {
                        $(".l-blog-container .slides").css("transform", `translateX(-0%)`);
                        $(".l-blog-container .featured  .nav span").removeClass("active")
                        $(".l-blog-container .featured  .nav span").eq(0).addClass("active")
                        return false;
                    } else {

                        $(".l-blog-container .slides").css("transform", `translateX(-${index + 1}00%)`);
                        $(".l-blog-container .featured  .nav span").removeClass("active")
                        $(".l-blog-container .featured  .nav span").eq(index + 1).addClass("active")
                        return false;
                    }

                }
            })

        }, 5000)



    }());



    $(".scroller  button.showcase__scroll-prev").on("click", () => {

        $('.scroller  .highlight-scroll .sildeActive').filter(function () {

            const len = $(this).index()

            if ($(".scroller  .highlight-scroll article").eq(len - 1).hasClass("sildeUnActive")) {

                $(".scroller  .highlight-scroll article").removeClass("sildeActive").addClass("sildeUnActive");
                $(".scroller  .highlight-scroll article").eq(len - 1).removeClass("sildeUnActive").addClass("sildeActive")
                $(".scroller .hero__navigation").children("li").removeClass("active");
                $(".scroller .hero__navigation li").eq(len - 1).addClass("active")
            }

        })

    });


    $(".scroller  button.showcase__scroll-next").on("click", () => {

        $('.scroller  .highlight-scroll .sildeActive').filter(function () {

            const len = $(this).index()

            if ($(".scroller  .highlight-scroll article").eq(len + 1).hasClass("sildeUnActive")) {

                $(".scroller  .highlight-scroll article").removeClass("sildeActive").addClass("sildeUnActive");
                $(".scroller  .highlight-scroll article").eq(len + 1).removeClass("sildeUnActive").addClass("sildeActive")
                $(".scroller .hero__navigation").children("li").removeClass("active");
                $(".scroller .hero__navigation li").eq(len + 1).addClass("active")
            } else {
                $(".scroller  .highlight-scroll article").removeClass("sildeActive").addClass("sildeUnActive");
                $(".scroller  .highlight-scroll article").first().removeClass("sildeUnActive").addClass("sildeActive")
                $(".scroller .hero__navigation").children("li").removeClass("active");
                $(".scroller .hero__navigation li").first().addClass("active")
            }

        })
    });



    $(".scroller .hero__navigation li").on("click", function () {

        $(".scroller .hero__navigation li").removeClass("active");
        $(this).addClass("active")
         const len = $(this).index()

        $(".scroller  .highlight-scroll article").removeClass("sildeActive").addClass("sildeUnActive");
        $(".scroller  .highlight-scroll article").eq(len).removeClass("sildeUnActive").addClass("sildeActive")

    });

    (function () {

        setInterval(() => {
            console.log("e")
            $('.scroller   .highlight-scroll .sildeActive').filter(function () {

                const len = $(this).index()
                console.log(len)

                if ($(".scroller  .highlight-scroll article").eq(len + 1).hasClass("sildeUnActive")) {

                    $(".scroller  .highlight-scroll article").removeClass("sildeActive").addClass("sildeUnActive");
                    $(".scroller  .highlight-scroll article").eq(len + 1).removeClass("sildeUnActive").addClass("sildeActive")
                    $(".scroller .hero__navigation").children("li").removeClass("active");
                    $(".scroller .hero__navigation li").eq(len + 1).addClass("active")
                } else {
                    $(".scroller  .highlight-scroll article").removeClass("sildeActive").addClass("sildeUnActive");
                    $(".scroller  .highlight-scroll article").first().removeClass("sildeUnActive").addClass("sildeActive")
                    $(".scroller .hero__navigation").children("li").removeClass("active");
                    $(".scroller .hero__navigation li").first().addClass("active")
                }

            })
     
        }, 5000)



    }());




    $(".filter-sort__button , .filter-sort .catcher").on("click", function () {

        $(".filter-sort .catcher").toggleClass("hidden");
        $(".filter-sort .filter-sort__container").toggleClass("hidden");


    });

    $(".side-nav #Section_Policy_Navigation li").on("click", function () {
        $("#Page_Privacy , #Page_CookiePolicy , #Page_Terms , #Page_Accessibility , #Page_about").addClass("hidden");
        $(".side-nav #Section_Policy_Navigation li").removeClass("selected");

        if ($(this).data("page") == "terms") {
            $("#Page_Terms").removeClass("hidden");
            $("#Page_Terms").find('li[data-page="terms"]').addClass("selected");
        } else if ($(this).data("page") == "cookie") {
            $("#Page_CookiePolicy").removeClass("hidden");
            $("#Page_CookiePolicy").find('li[data-page="cookie"]').addClass("selected");
        } else if ($(this).data("page") == "privacy") {
            $("#Page_Privacy").removeClass("hidden");
            $("#Page_Privacy").find('li[data-page="privacy"]').addClass("selected");
        } else if ($(this).data("page") == "accessibility") {
            $("#Page_Accessibility").removeClass("hidden");
            $("#Page_Accessibility").find('li[data-page="accessibility"]').addClass("selected");
        }else if ($(this).data("page") == "about") {
            $("#Page_about").removeClass("hidden");
            $("#Page_about").find('li[data-page="about"]').addClass("selected");
        } else {
            $("#Page_CookiePolicy").removeClass("hidden");
            $("#Page_CookiePolicy").find('li[data-page="cookie"]').addClass("selected");
        }


    });



    $(window).on("hashchange", function () {
        $("#Page_Privacy , #Page_CookiePolicy , #Page_Terms , #Page_Accessibility , #Page_about").addClass("hidden");
        $(".side-nav #Section_Policy_Navigation li").removeClass("selected");
        checkPage();
    });

    (function () {

        checkPage();

    }());

    function checkPage() {
        if (location.href.indexOf("#") != -1) {
            let hash = window.location.hash
            console.log(hash)
            if (hash == "#terms") {
                $("#Page_Terms").removeClass("hidden");
                $("#Page_Terms").find('li[data-page="terms"]').addClass("selected");
            } else if (hash == "#cookie") {
                $("#Page_CookiePolicy").removeClass("hidden");
                $("#Page_CookiePolicy").find('li[data-page="cookie"]').addClass("selected");
            } else if (hash == "#privacy") {
                $("#Page_Privacy").removeClass("hidden");
                $("#Page_Privacy").find('li[data-page="privacy"]').addClass("selected");
            } else if (hash == "#accessibility") {
                $("#Page_Accessibility").removeClass("hidden");
                $("#Page_Accessibility").find('li[data-page="accessibility"]').addClass("selected");
            } else if (hash == "#about") {
                $("#Page_about").removeClass("hidden");
                $("#Page_about").find('li[data-page="about"]').addClass("selected");
            } else {
                $("#Page_CookiePolicy").removeClass("hidden");
                $("#Page_CookiePolicy").find('li[data-page="cookie"]').addClass("selected");
            }
        } else {
            $("#Page_CookiePolicy").removeClass("hidden");
            $("#Page_CookiePolicy").find('li[data-page="cookie"]').addClass("selected");
        }
    }



    const urlParams = new URLSearchParams(window.location.search);



     $(".filter-sort .filter-sort__container .filter-sort__apply").on("click", function () {
         let filter = $(this).parent("div").parent("div")

        if (filter.first("fieldset").find(".filter-sort__sort-options").find("input[name=sort]:checked").val() == "Trending") {

            urlParams.set("sort" , "t");

        }else if (filter.first("fieldset").find(".filter-sort__sort-options").find("input[name=sort]:checked").val() == "Date") {

            urlParams.set("sort" , "d");

        }else if (filter.first("fieldset").find(".filter-sort__sort-options").find("input[name=sort]:checked").val() == "AtoZ") {
            urlParams.set("sort" , "a");

        }else{
            urlParams.set("sort" , "n");

        }


        if (filter.last("fieldset").find("#showOnline").is(':checked') && filter.last("fieldset").find("#showInStore").is(':checked')) {
            urlParams.set("in" , "inon");

        }else if (filter.last("fieldset").find("#showOnline").is(':checked')) {

            urlParams.set("in" , "on");

        }else if (filter.last("fieldset").find("#showInStore").is(':checked')) {
             urlParams.set("in" , "in");
        }else{
            urlParams.delete("in");
        }
        
        
        if (filter.last("fieldset").find("#showLimited").is(':checked')) {
            urlParams.set("limited" , "yes");
        }else{
            urlParams.delete("limited");
        }
          


        location.href = `${location.origin}${location.pathname}?${urlParams.toString()}`

     });



    $(".filter-sort .filter-sort__container .filter-sort__reset").on("click", function () {
        urlParams.delete("limited");
        urlParams.delete("in");
        urlParams.delete("sort");

        location.href = `${location.origin}${location.pathname}?${urlParams.toString()}`

    });


    $("#js-headerSearch #search-focus").on("focus , keyup", function () {
        if ($(this).val().length >= 1)
            ajaxCall = $.ajax({
                url: 'search.php',
                type: 'post',
                data: "key=" + $(this).val(),
                async: true,
                success: function (data) {
                    $(".search_results").html(data)


                }

            })
    }); //end onclick

});


$('#sname').on("keyup , focus", function () {
    var sname = $("#sname").val()
    if (sname == "" || sname.length < 4) {
        $(this).next().show().text("Please enter a valid name")
    } else {
        $(this).next().hide()
    }
});
$('#cname').on("keyup , focus", function () {
    var sname = $("#cname").val()
    if (sname == "" || sname.length < 4) {
        $(this).next().show().text("Please enter a valid name")
    } else {
        $(this).next().hide()
    }
});



$('#sphonenumber').on("keyup , focus", function () {
    var sphonenumber = $("#sphonenumber").val()

    if ( sphonenumber.startsWith('+234') || sphonenumber.startsWith('+233') || sphonenumber.startsWith('+237') ) {
                $(this).next().hide()
    } else {
        $(this).next().show().text("Please enter a phone nummber")

    }
});
$('#cphonenumber').on("keyup , focus", function () {
    var sphonenumber = $("#cphonenumber").val()

    if ( sphonenumber.startsWith('+234') || sphonenumber.startsWith('+233') || sphonenumber.startsWith('+237') ) {
                $(this).next().hide()
    } else {
        $(this).next().show().text("Please enter a phone nummber")

    }
});


function checkEmail(email) {
    filter = /^[a-z0-9][a-z0-9-_\.]+@([a-z]|[a-z0-9]?[a-z0-9-]+[a-z0-9])\.[a-z0-9]{2,10}(?:\.[a-z]{2,10})?$/i;
    if (filter.test(email)) {
        // Yay! valid
        return true;
    }
    else { return false; }
}



$('#spersonalemail').on("keyup , focus", function () {
    var spersonalemail = $("#spersonalemail").val()
 
    if (spersonalemail == "" || spersonalemail.length < 6 || !checkEmail(spersonalemail)) {
        $(this).next().show().text("Please enter a Personal email address")
    } else {
        $(this).next().hide()
    }
});

$('#cpersonalemail').on("keyup , focus", function () {
    var spersonalemail = $("#cpersonalemail").val()
 
    if (spersonalemail == "" || spersonalemail.length < 6 || !checkEmail(spersonalemail)) {
        $(this).next().show().text("Please enter a Personal email address")
    } else {
        $(this).next().hide()
    }
});

$('#lpassword').on("keyup , focus", function () {
    var password = $("#lpassword").val()
 
    if (password == "" || password.length < 6) {
        $(this).next().show().text("Please enter a password")
    } else {
        $(this).next().hide()
    }
});

$('#cpassword').on("keyup , focus", function () {
    var password = $("#cpassword").val()
 
    if (password == "" || password.length < 6) {
        $(this).next().show().text("Please enter a password")
    } else {
        $(this).next().hide()
    }
});





$('#sinstitutionemail').on("keyup , focus", function () {
    var sinstitutionemail = $("#sinstitutionemail").val()
    
 
    if (sinstitutionemail == "" || sinstitutionemail.length < 6 || !checkEmail(sinstitutionemail) || !sinstitutionemail.includes(".com")) {
        $(this).next().show().text("Please enter university or institution email")
    } else {
        $(this).next().hide()
    }
});

$('#cinstitutionemail').on("keyup , focus", function () {
    var sinstitutionemail = $("#cinstitutionemail").val()
    
 
    if (sinstitutionemail == "" || sinstitutionemail.length < 6 || !checkEmail(sinstitutionemail) || !sinstitutionemail.includes(".com")) {
        $(this).next().show().text("Please enter university or institution email")
    } else {
        $(this).next().hide()
    }
});

$('#linstitutionemail').on("keyup , focus", function () {
    var sinstitutionemail = $("#linstitutionemail").val()
    
 
    if (sinstitutionemail == "" || sinstitutionemail.length < 6 || !checkEmail(sinstitutionemail) || !sinstitutionemail.includes(".com")) {
        $(this).next().show().text("Please enter university or institution email")
    } else {
        $(this).next().hide()
    }
});


$('#finstitutionemail').on("keyup , focus", function () {
    var sinstitutionemail = $("#finstitutionemail").val()
    
 
    if (sinstitutionemail == "" || sinstitutionemail.length < 6 || !checkEmail(sinstitutionemail) || !sinstitutionemail.includes(".com")) {
        $(this).next().show().text("Please enter university or institution email")
    } else {
        $(this).next().hide()
    }
});



$('#sname , #sphonenumber, #spersonalemail, #sinstitutionemail').on("keyup , focus", () => {
    let sname = $("#sname").val()
    let sphonenumber = $("#sphonenumber").val()
    let sinstitutionemail = $("#sinstitutionemail").val()
    let spersonalemail = $("#spersonalemail").val()

    if ((sname != "" && sname.length > 4) && (sphonenumber.startsWith('+234') || sphonenumber.startsWith('+233') || sphonenumber.startsWith('+237')) 
      && (spersonalemail != "" && spersonalemail.length > 6 && checkEmail(spersonalemail)) 
      &&  sinstitutionemail != "" && sinstitutionemail.length > 6 && checkEmail(sinstitutionemail) && sinstitutionemail.includes(".com")) {

        $("#btn_signup").prop("disabled", false)

    } else {
        $("#btn_signup").prop("disabled", true)
    }
});


$('#cname , #cphonenumber, #cpersonalemail, #cinstitutionemail , #cpassword').on("keyup , focus", () => {
    let name = $("#cname").val()
    let phonenumber = $("#cphonenumber").val()
    let institutionemail = $("#cinstitutionemail").val()
    let personalemail = $("#cpersonalemail").val()

    if ((name != "" && name.length > 4) && (phonenumber.startsWith('+234') || phonenumber.startsWith('+233') || phonenumber.startsWith('+237')) 
      && (personalemail != "" && personalemail.length > 6 && checkEmail(personalemail)) 
      &&  institutionemail != "" && institutionemail.length > 6 && checkEmail(institutionemail) && institutionemail.includes(".com")) {

        $("#btn_profile").prop("disabled", false)

    } else {
        $("#btn_profile").prop("disabled", true)
    }
});

$('#finstitutionemail' ).on("keyup , focus", () => {

    let institutionemail = $("#finstitutionemail").val()


    if ( institutionemail != "" && institutionemail.length > 6 && checkEmail(institutionemail) && institutionemail.includes(".com")) {

        $("#btn_login").prop("disabled", false)

    } else {
        $("#btn_login").prop("disabled", true)
    }
});


$('#linstitutionemail , #lpassword').on("keyup , focus", () => {

    let institutionemail = $("#linstitutionemail").val()
    let password = $("#lpassword").val()

    if ( //(password != "" && password.length > 6) &&  
    institutionemail != "" && institutionemail.length > 6 && checkEmail(institutionemail) && institutionemail.includes(".com")) {

        $("#btn_login").prop("disabled", false)

    } else {
        $("#btn_login").prop("disabled", true)
    }
});





$("#signup").submit(function (e) {
    //     // custom handling here
    e.preventDefault();


        ajaxCall = $.ajax({
            url: './submit.php',
            type: 'post',
            data: $(this).serialize(),
            

            success: function (data) {
                if (data.includes("password sent to your email")) {
                    $("#serror").css("color", "green")
                    $("#serror").show().text("password sent to your email")

                } else {
                    $("#serror").css("color", "red")
                    $("#serror").show().text(data)

                }
            }

        })

}); //end onclick


$("#login").submit(function (e) {
    //     // custom handling here
    e.preventDefault();



        ajaxCall = $.ajax({
            url: './submit.php',
            type: 'post',
            data: $(this).serialize(),
            

            success: function (data) {
                if (data.includes("successfully")) {
                  window.location = "profile.php"

                } else {
                    $("#lerror").css("color", "red")
                    $("#lerror").show().text("Email Or Password  Is Not Correct")

                }
            }

        })

}); //end onclick



$("#profile").submit(function (e) {
    //     // custom handling here
    e.preventDefault();



        ajaxCall = $.ajax({
            url: './submit.php',
            type: 'post',
            data: $(this).serialize(),
            

            success: function (data) {
                if (data.includes("successfully")) {
                    $("#cerror").css("color", "green")
                    $("#cerror").show().text("successfully")
                } else {
                    $("#cerror").css("color", "red")
                    $("#cerror").show().text("something went wrong")

                }

            }

        })

}); //end onclick




$("#forgot").submit(function (e) {
    //     // custom handling here
    e.preventDefault();



        ajaxCall = $.ajax({
            url: 'submit.php',
            type: 'post',
            data: $(this).serialize(),
            

            success: function (data) {
                if (data.includes("password sent to your email")) {
                    $("#ferror").css("color", "green")
                    $("#ferror").show().text(data)

                } else {
                    $("#ferror").css("color", "red")
                    $("#ferror").show().text(data)

                }
            }

        })

}); //end onclick









$("#btncopy , #btngen").click(function (e) {
    //     // custom handling here
      $(this).prev("input").select()

      try {
        var successful = document.execCommand('copy')
        var msg = successful ? 'successfully' : 'unsuccessfully'
        console.log('text coppied ' + msg)
      } catch (err) {
        console.log('Unable to copy text')
      }

});

$("button.getNewCode").click(function (e) {
    //     // custom handling here
      $("#btngen").prev("input").val(Math.random().toString(36).substr(2, 10))
      
});
