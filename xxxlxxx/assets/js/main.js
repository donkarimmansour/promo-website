$(document).ready(function () {

    $("#catyadd_type").change(function () {
        if ($(this).val() == "link") {
            $("#uselink").attr("disabled", false)

        } else {
            $("#uselink").attr("disabled", true)

        }
    })

    $("#catyedit_type").change(function () {
        if ($(this).val() == "link") {
            $("#euselink").attr("disabled", false)

        } else {
            $("#euselink").attr("disabled", true)

        }
    })

    $("#headoffadd_type").change(function () {
        if ($(this).val() == "link") {
            $("#huselink").attr("disabled", false)

        } else {
            $("#huselink").attr("disabled", true)

        }
    })

    $("#headofferedit_type").change(function () {
        if ($(this).val() == "link") {
            $("#heuselink").attr("disabled", false)

        } else {
            $("#heuselink").attr("disabled", true)

        }
    })

    $("#mainoffadd_type").change(function () {
        if ($(this).val() == "link") {
            $("#muselink").attr("disabled", false)
        } else {
            $("#muselink").attr("disabled", true)

        }
    })

    $("#mainoffedit_type").change(function () {
        if ($(this).val() == "link") {
            $("#meuselink").attr("disabled", false)
        } else {
            $("#meuselink").attr("disabled", true)

        }
    })

    $("#smalloffadd_type").change(function () {
        if ($(this).val() == "link") {
            $("#suselink").attr("disabled", false)
        } else {
            $("#suselink").attr("disabled", true)

        }
    })

    $("#smalloffedit_type").change(function () {
        if ($(this).val() == "link") {
            $("#seuselink").attr("disabled", false)
        } else {
            $("#seuselink").attr("disabled", true)

        }
    })

    
    $("#blogadd_type").change(function () {
        if ($(this).val() == "link") {
            $("#buselink").attr("disabled", false)
        } else {
            $("#buselink").attr("disabled", true)

        }
    })

    $("#blogedit_type").change(function () {
        if ($(this).val() == "link") {
            $("#beuselink").attr("disabled", false)
        } else {
            $("#beuselink").attr("disabled", true)

        }
    })

  

    $("#offeradd_type").change(function () {
        if ($(this).val() == "link") {
            $("#cuselink").attr("disabled", false)
        } else {
            $("#cuselink").attr("disabled", true)
            cuselink
        }
    })

    $("#catyadd_place").change(function () {
        if ($(this).val() == "website") {
            $("#catyadd_parent").attr("disabled", false)

        } else {
            $("#catyadd_parent").attr("disabled", true)

        }
    })

    $("#catyedit_place").change(function () {
        if ($(this).val() == "website") {
            $("#catyedit_parent").attr("disabled", false)

        } else {
            $("#catyedit_parent").attr("disabled", true)

        }
    })

 


    $("#headoffadd_limited").change(function () {
        if ($(this).val() == "yes") {
            $("#headoffadd , #date").attr("disabled", false)
        } else {
            $("#headoffadd , #date").attr("disabled", true)

        }
    })

    $("#headofferedit_limited").change(function () {
        if ($(this).val() == "yes") {
            $("#headofferedit , #date").attr("disabled", false)
        } else {
            $("#headofferedit , #date").attr("disabled", true)

        }
    })

    $("#mainoffadd_limited").change(function () {
        if ($(this).val() == "yes") {
            $("#mainoffadd , #date").attr("disabled", false)
        } else {
            $("#mainoffadd , #date").attr("disabled", true)

        }
    })

    $("#mainoffedit_limited").change(function () {
        if ($(this).val() == "yes") {
            $("#mainoffedit , #date").attr("disabled", false)
        } else {
            $("#mainoffedit , #date").attr("disabled", true)

        }
    })

    $("#smalloffedit_limited").change(function () {
        if ($(this).val() == "yes") {
            $("#smalloffedit , #date").attr("disabled", false)
        } else {
            $("#smalloffedit , #date").attr("disabled", true)

        }
    })

    $("#smalloffadd_limited").change(function () {
        if ($(this).val() == "yes") {
            $("#smalloffadd , #date").attr("disabled", false)
        } else {
            $("#smalloffadd , #date").attr("disabled", true)

        }
    })








    $("#catyadd").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#catyadd_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#description").val() == null || $("#description").val().trim() == "") {
            $("#catyadd_description").removeClass("d-none").addClass("d-block")
            return
        } else if (($("#uselink").val() == null || $("#uselink").val().trim() == "") && !$("#uselink").is(':disabled')) {
            $("#catyadd_link").removeClass("d-none").addClass("d-block")
            return
        }

        else {


            $("#catyadd_name").removeClass("d-block").addClass("d-none")
            $("#catyadd_description").removeClass("d-block").addClass("d-none")
            $("#catyadd_link").removeClass("d-block").addClass("d-none")



            ajaxCall = $.ajax({
                url: 'submit.php',
                type: 'post',
                data: $(this).serialize(),
                

                success: function (data) {
                    if (data.includes("successfully")) {
                        $("#catyadd_msg").removeClass("d-none")
                        $("#catyadd_msg").removeClass("alert-danger").addClass("alert-success")
                        $("#catyadd_msg strong").text("successfully")
                        setTimeout(() => {
                            window.history.back();
                        }, 2000)
                    } else {
                        $("#catyadd_msg").removeClass("d-none")
                        $("#catyadd_msg").removeClass("alert-success").addClass("alert-danger")
                        $("#catyadd_msg strong").text(data)
                    }
                }

            })

        }//else
    }); //end onclick


    $("#catyedit").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#catyedit_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#description").val() == null || $("#description").val().trim() == "") {
            $("#catyedit_description").removeClass("d-none").addClass("d-block")
            return
        } else if (($("#euselink").val() == null || $("#euselink").val().trim() == "") && !$("#euselink").is(':disabled')) {
            $("#ecatyedit_link").removeClass("d-none").addClass("d-block")
            return
        }

        else {


            $("#catyedit_name").removeClass("d-block").addClass("d-none")
            $("#catyedit_description").removeClass("d-block").addClass("d-none")
            $("#ecatyedit_link").removeClass("d-block").addClass("d-none")



            ajaxCall = $.ajax({
                url: 'submit.php',
                type: 'post',
                data: $(this).serialize(),
                

                success: function (data) {
                    if (data.includes("successfully")) {
                        $("#catyedit_msg").removeClass("d-none")
                        $("#catyedit_msg").removeClass("alert-danger").addClass("alert-success")
                        $("#catyedit_msg strong").text("successfully")
                        setTimeout(() => {
                            window.history.back();
                        }, 2000)
                    } else {
                        $("#catyedit_msg").removeClass("d-none")
                        $("#catyedit_msg").removeClass("alert-success").addClass("alert-danger")
                        $("#catyedit_msg strong").text(data)
                    }
                }

            })

        }//else
    }); //end onclick


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-img").change(function () {
        readURL(this);
    });

    function readURLTWO(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file_img").change(function () {
        readURLTWO(this);
    });


    /* Ara YOU Sure */
    $(".confirm").click(function () {
        return confirm("Ara YOU Sure");
    });






    $("#headoffadd").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#headoffadd_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#description").val() == null || $("#description").val().trim() == "") {
            $("#headoffadd_description").removeClass("d-none").addClass("d-block")
            return
        } else if (($("#huselink").val() == null || $("#huselink").val().trim() == "") && !$("#huselink").is(':disabled')) {
            $("#headoffadd_link").removeClass("d-none").addClass("d-block")
            return
        }
        else if (($("#offername").val() == null || $("#offername").val().trim() == "")) {
            $("#headoffadd_offername").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#coupon").val() == null || $("#coupon").val().trim() == "")) {
            $("#headoffadd_coupon").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#date").val() == null || $("#date").val().trim() == "") && !$("#date").is(':disabled')) {
            $("#headoffadd_date").removeClass("d-none").addClass("d-block")
            return
        }

        else {


            $("#headoffadd_name").removeClass("d-block").addClass("d-none")
            $("#headoffadd_description").removeClass("d-block").addClass("d-none")
            $("#headoffadd_link").removeClass("d-block").addClass("d-none")

            $("#headoffadd_offername").removeClass("d-block").addClass("d-none")
            $("#headoffadd_coupon").removeClass("d-block").addClass("d-none")
            $("#headoffadd_date").removeClass("d-block").addClass("d-none")

            var validExtensions = ['jpg', 'png'];

            var filelogo = $("#file-img").val()
            filelogo = filelogo.substr(filelogo.lastIndexOf('.') + 1);
            var fileimage = $("#file_img").val()
            fileimage = fileimage.substr(fileimage.lastIndexOf('.') + 1);

            if ($.inArray(fileimage, validExtensions) == -1 || $.inArray(filelogo, validExtensions) == -1) {
                $("#headoffadd_msg").removeClass("d-none")
                $("#headoffadd_msg").removeClass("alert-success").addClass("alert-danger")
                $("#headoffadd_msg strong").text("Invalid file type")
            } else {

                $("#headoffadd_msg").removeClass("d-none")
                $("#headoffadd_msg").removeClass("alert-success").addClass("alert-danger")

                ajaxCall = $.ajax({
                    url: 'submit.php',
                    type: 'post',
                    data: new FormData(this),
                    
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.includes("successfully")) {
                            $("#headoffadd_msg").removeClass("d-none")
                            $("#headoffadd_msg").removeClass("alert-danger").addClass("alert-success")
                            $("#headoffadd_msg strong").text("successfully")
                            setTimeout(() => {
                                window.history.back();
                            }, 2000)
                        } else {
                            $("#headoffadd_msg").removeClass("d-none")
                            $("#headoffadd_msg").removeClass("alert-success").addClass("alert-danger")
                            $("#headoffadd_msg strong").text(data)
                        }
                    }

                })
            }

        }//else
    }); //end onclick


    $("#headofferedit").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#headofferedit_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#description").val() == null || $("#description").val().trim() == "") {
            $("#headofferedit_description").removeClass("d-none").addClass("d-block")
            return
        } else if (($("#heuselink").val() == null || $("#heuselink").val().trim() == "") && !$("#heuselink").is(':disabled')) {
            $("#eheadofferedit_link").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#offername").val() == null || $("#offername").val().trim() == "")) {
            $("#headofferedit_offername").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#coupon").val() == null || $("#coupon").val().trim() == "")) {
            $("#headofferedit_coupon").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#date").val() == null || $("#date").val().trim() == "") && !$("#date").is(':disabled')) {
            $("#headofferedit_date").removeClass("d-none").addClass("d-block")
            return
        }

        else {
            $("#headofferedit_offername").removeClass("d-block").addClass("d-none")
            $("#headofferedit_coupon").removeClass("d-block").addClass("d-none")
            $("#headofferedit_date").removeClass("d-block").addClass("d-none")

            $("#headofferedit_name").removeClass("d-block").addClass("d-none")
            $("#headofferedit_description").removeClass("d-block").addClass("d-none")
            $("#headofferedit_link").removeClass("d-block").addClass("d-none")


            ajaxCall = $.ajax({
                url: 'submit.php',
                type: 'post',
                data: new FormData(this),
                
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    if (data.includes("successfully")) {
                        $("#headofferedit_msg").removeClass("d-none")
                        $("#headofferedit_msg").removeClass("alert-danger").addClass("alert-success")
                        $("#headofferedit_msg strong").text("successfully")
                        setTimeout(() => {
                            window.history.back();
                        }, 2000)
                    } else {
                        $("#headofferedit_msg").removeClass("d-none")
                        $("#headofferedit_msg").removeClass("alert-success").addClass("alert-danger")
                        $("#headofferedit_msg strong").text(data)
                    }
                }

            })

        }//else
    }); //end onclick



    $("#mainoffadd").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#mainoffadd_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#description").val() == null || $("#description").val().trim() == "") {
            $("#mainoffadd_description").removeClass("d-none").addClass("d-block")
            return
        } else if (($("#muselink").val() == null || $("#muselink").val().trim() == "") && !$("#muselink").is(':disabled')) {
            $("#mainoffadd_link").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#offername").val() == null || $("#offername").val().trim() == "")) {
            $("#mainoffadd_offername").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#coupon").val() == null || $("#coupon").val().trim() == "")) {
            $("#mainoffadd_coupon").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#date").val() == null || $("#date").val().trim() == "") && !$("#date").is(':disabled')) {
            $("#mainoffadd_date").removeClass("d-none").addClass("d-block")
            return
        }


        else {


            $("#mainoffadd_offername").removeClass("d-block").addClass("d-none")
            $("#mainoffadd_coupon").removeClass("d-block").addClass("d-none")
            $("#mainoffadd_date").removeClass("d-block").addClass("d-none")

            $("#mainoffadd_name").removeClass("d-block").addClass("d-none")
            $("#mainoffadd_description").removeClass("d-block").addClass("d-none")
            $("#mainoffadd_link").removeClass("d-block").addClass("d-none")

            var validExtensions = ['jpg', 'png'];

            var filelogo = $("#file-img").val()
            filelogo = filelogo.substr(filelogo.lastIndexOf('.') + 1);
            var fileimage = $("#file_img").val()
            fileimage = fileimage.substr(fileimage.lastIndexOf('.') + 1);

            if ($.inArray(fileimage, validExtensions) == -1 || $.inArray(filelogo, validExtensions) == -1) {
                $("#mainoffadd_msg").removeClass("d-none")
                $("#mainoffadd_msg").removeClass("alert-success").addClass("alert-danger")
                $("#mainoffadd_msg strong").text("Invalid file type")
            } else {

                $("#mainoffadd_msg").removeClass("d-none")
                $("#mainoffadd_msg").removeClass("alert-success").addClass("alert-danger")

                ajaxCall = $.ajax({
                    url: 'submit.php',
                    type: 'post',
                    data: new FormData(this),
                    
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.includes("successfully")) {
                            $("#mainoffadd_msg").removeClass("d-none")
                            $("#mainoffadd_msg").removeClass("alert-danger").addClass("alert-success")
                            $("#mainoffadd_msg strong").text("successfully")
                            setTimeout(() => {
                                window.history.back();
                            }, 2000)
                        } else {
                            $("#mainoffadd_msg").removeClass("d-none")
                            $("#mainoffadd_msg").removeClass("alert-success").addClass("alert-danger")
                            $("#mainoffadd_msg strong").text(data)
                        }
                    }

                })
            }

        }//else
    }); //end onclick


    $("#mainoffedit").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#mainoffedit_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#description").val() == null || $("#description").val().trim() == "") {
            $("#mainoffedit_description").removeClass("d-none").addClass("d-block")
          
            return
        } else if (($("#meuselink").val() == null || $("#meuselink").val().trim() == "") && !$("#meuselink").is(':disabled')) {
            $("#mainoffedit_link").removeClass("d-none").addClass("d-block")
            
            return
        }else if (($("#offername").val() == null || $("#offername").val().trim() == "")) {
            $("#mainoffedit_offername").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#coupon").val() == null || $("#coupon").val().trim() == "")) {
            $("#mainoffedit_coupon").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#date").val() == null || $("#date").val().trim() == "") && !$("#date").is(':disabled')) {
            $("#mainoffedit_date").removeClass("d-none").addClass("d-block")
            return
        }


        else { 

            $("#mainoffedit_offername").removeClass("d-block").addClass("d-none")
            $("#mainoffedit_coupon").removeClass("d-block").addClass("d-none")
            $("#mainoffedit_date").removeClass("d-block").addClass("d-none")


            $("#mainoffedit_name").removeClass("d-block").addClass("d-none")
            $("#mainoffedit_description").removeClass("d-block").addClass("d-none")
            $("#mainoffedit_link").removeClass("d-block").addClass("d-none")


            ajaxCall = $.ajax({
                url: 'submit.php',
                type: 'post',
                data: new FormData(this),
                
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    if (data.includes("successfully")) {
                        $("#mainoffedit_msg").removeClass("d-none")
                        $("#mainoffedit_msg").removeClass("alert-danger").addClass("alert-success")
                        $("#mainoffedit_msg strong").text("successfully")
                        setTimeout(() => {
                            window.history.back();
                        }, 2000)
                    } else {
                        $("#mainoffedit_msg").removeClass("d-none")
                        $("#mainoffedit_msg").removeClass("alert-success").addClass("alert-danger")
                        $("#mainoffedit_msg strong").text(data)
                    }
                }

            })

        }//else
    }); //end onclick



    $("#smalloffadd").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#smalloffadd_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#description").val() == null || $("#description").val().trim() == "") {
            $("#smalloffadd_description").removeClass("d-none").addClass("d-block")
            return
        } else if (($("#suselink").val() == null || $("#suselink").val().trim() == "") && !$("#suselink").is(':disabled')) {
            $("#smalloffadd_link").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#offername").val() == null || $("#offername").val().trim() == "")) {
            $("#smalloffadd_offername").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#coupon").val() == null || $("#coupon").val().trim() == "")) {
            $("#smalloffadd_coupon").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#date").val() == null || $("#date").val().trim() == "") && !$("#date").is(':disabled')) {
            $("#smalloffadd_date").removeClass("d-none").addClass("d-block")
            return
        }


        else {


            $("#smalloffadd_offername").removeClass("d-block").addClass("d-none")
            $("#smalloffadd_coupon").removeClass("d-block").addClass("d-none")
            $("#smalloffadd_date").removeClass("d-block").addClass("d-none")

            $("#smalloffadd_name").removeClass("d-block").addClass("d-none")
            $("#smalloffadd_description").removeClass("d-block").addClass("d-none")
            $("#smalloffadd_link").removeClass("d-block").addClass("d-none")

            var validExtensions = ['jpg', 'png'];

            var filelogo = $("#file-img").val()
            filelogo = filelogo.substr(filelogo.lastIndexOf('.') + 1);
            var fileimage = $("#file_img").val()
            fileimage = fileimage.substr(fileimage.lastIndexOf('.') + 1);

            if ($.inArray(fileimage, validExtensions) == -1 || $.inArray(filelogo, validExtensions) == -1) {
                $("#smalloffadd_msg").removeClass("d-none")
                $("#smalloffadd_msg").removeClass("alert-success").addClass("alert-danger")
                $("#smalloffadd_msg strong").text("Invalid file type")
            } else {

                $("#smalloffadd_msg").removeClass("d-none")
                $("#smalloffadd_msg").removeClass("alert-success").addClass("alert-danger")

                ajaxCall = $.ajax({
                    url: 'submit.php',
                    type: 'post',
                    data: new FormData(this),
                    
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.includes("successfully")) {
                            $("#smalloffadd_msg").removeClass("d-none")
                            $("#smalloffadd_msg").removeClass("alert-danger").addClass("alert-success")
                            $("#smalloffadd_msg strong").text("successfully")
                            setTimeout(() => {
                                window.history.back();
                            }, 2000)
                        } else {
                            $("#smalloffadd_msg").removeClass("d-none")
                            $("#smalloffadd_msg").removeClass("alert-success").addClass("alert-danger")
                            $("#smalloffadd_msg strong").text(data)
                        }
                    }

                })
            }

        }//else
    }); //end onclick


    $("#smalloffedit").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#smalloffedit_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#description").val() == null || $("#description").val().trim() == "") {
            $("#smalloffedit_description").removeClass("d-none").addClass("d-block")
            return
        } else if (($("#seuselink").val() == null || $("#seuselink").val().trim() == "") && !$("#seuselink").is(':disabled')) {
            $("#smalloffedit_link").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#offername").val() == null || $("#offername").val().trim() == "")) {
            $("#smalloffedit_offername").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#coupon").val() == null || $("#coupon").val().trim() == "")) {
            $("#smalloffedit_coupon").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#date").val() == null || $("#date").val().trim() == "") && !$("#date").is(':disabled')) {
            $("#smalloffedit_date").removeClass("d-none").addClass("d-block")
            return
        }


        else {

            $("#smalloffedit_offername").removeClass("d-block").addClass("d-none")
            $("#smalloffedit_coupon").removeClass("d-block").addClass("d-none")
            $("#smalloffedit_date").removeClass("d-block").addClass("d-none")

            $("#smalloffedit_name").removeClass("d-block").addClass("d-none")
            $("#smalloffedit_description").removeClass("d-block").addClass("d-none")
            $("#smalloffedit_link").removeClass("d-block").addClass("d-none")


            ajaxCall = $.ajax({
                url: 'submit.php',
                type: 'post',
                data: new FormData(this),
                
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {

                    if (data.includes("successfully")) {
                        $("#smalloffedit_msg").removeClass("d-none")
                        $("#smalloffedit_msg").removeClass("alert-danger").addClass("alert-success")
                        $("#smalloffedit_msg strong").text("successfully")
                        setTimeout(() => {
                            window.history.back();
                        }, 2000)
                    } else {
                        $("#smalloffedit_msg").removeClass("d-none")
                        $("#smalloffedit_msg").removeClass("alert-success").addClass("alert-danger")
                        $("#smalloffedit_msg strong").text(data)
                    }
                }

            })

        }//else
    }); //end onclick




    $("#linkadd").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

         if (($("#uselink").val() == null || $("#uselink").val().trim() == "")) {
            $("#linkadd_link").removeClass("d-none").addClass("d-block")
            return
        }

        else {



            $("#linkadd_link").removeClass("d-block").addClass("d-none")

            var validExtensions = ['jpg', 'png'];

            var filelogo = $("#file-img").val()
            filelogo = filelogo.substr(filelogo.lastIndexOf('.') + 1);

            if ($.inArray(filelogo, validExtensions) == -1) {
                $("#linkadd_msg").removeClass("d-none")
                $("#linkadd_msg").removeClass("alert-success").addClass("alert-danger")
                $("#linkadd_msg strong").text("Invalid file type")
            } else {

                $("#linkadd_msg").removeClass("d-none")
                $("#linkadd_msg").removeClass("alert-success").addClass("alert-danger")

                ajaxCall = $.ajax({
                    url: 'submit.php',
                    type: 'post',
                    data: new FormData(this),
                    
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.includes("successfully")) {
                            $("#linkadd_msg").removeClass("d-none")
                            $("#linkadd_msg").removeClass("alert-danger").addClass("alert-success")
                            $("#linkadd_msg strong").text("successfully")
                            setTimeout(() => {
                                window.history.back();
                            }, 2000)
                        } else {
                            $("#linkadd_msg").removeClass("d-none")
                            $("#linkadd_msg").removeClass("alert-success").addClass("alert-danger")
                            $("#linkadd_msg strong").text(data)
                        }
                    }

                })
            }

        }//else
    }); //end onclick


    $("#linkedit").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if (($("#euselink").val() == null || $("#euselink").val().trim() == "")) {
            $("#linkedit_link").removeClass("d-none").addClass("d-block")
            return
        }

        else {

            $("#linkedit_link").removeClass("d-block").addClass("d-none")


            ajaxCall = $.ajax({
                url: 'submit.php',
                type: 'post',
                data: new FormData(this),
                
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    if (data.includes("successfully")) {
                        $("#linkedit_msg").removeClass("d-none")
                        $("#linkedit_msg").removeClass("alert-danger").addClass("alert-success")
                        $("#linkedit_msg strong").text("successfully")
                        setTimeout(() => {
                            window.history.back();
                        }, 2000)
                    } else {
                        $("#linkedit_msg").removeClass("d-none")
                        $("#linkedit_msg").removeClass("alert-success").addClass("alert-danger")
                        $("#linkedit_msg strong").text(data)
                    }
                }

            })

        }//else
    }); //end onclick


    $("#useradd").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

         

        // audio.play();

         if (($("#name").val() == null || $("#name").val().trim() == "")) {
            $("#useradd_name").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#pass").val() == null || $("#pass").val().trim() == "")) {
            $("#useradd_pass").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#email").val() == null || $("#email").val().trim() == "")) {
            $("#useradd_email").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#personal").val() == null || $("#personal").val().trim() == "")) {
            $("#useradd_personal").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#phone").val() == null || $("#phone").val().trim() == "")) {
            $("#useradd_email").removeClass("d-none").addClass("d-block")
            return
        }

        else {


            $("#useradd_name").removeClass("d-block").addClass("d-none")
            $("#useradd_pass").removeClass("d-block").addClass("d-none")
            $("#useradd_email").removeClass("d-block").addClass("d-none")
            $("#useradd_personal").removeClass("d-block").addClass("d-none")
            $("#useradd_phone").removeClass("d-block").addClass("d-none")

                ajaxCall = $.ajax({
                    url: 'submit.php',
                    type: 'post',
                    data: new FormData(this),
                    
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.includes("successfully")) {
                            $("#useradd_msg").removeClass("d-none")
                            $("#useradd_msg").removeClass("alert-danger").addClass("alert-success")
                            $("#useradd_msg strong").text("successfully")
                            setTimeout(() => {
                                window.history.back();
                            }, 2000)
                        } else {
                            $("#useradd_msg").removeClass("d-none")
                            $("#useradd_msg").removeClass("alert-success").addClass("alert-danger")
                            $("#useradd_msg strong").text(data)
                        }
                    }

                })


        }//else
    }); //end onclick


    $("#useredit").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

         if (($("#name").val() == null || $("#name").val().trim() == "")) {
            $("#useredit_name").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#email").val() == null || $("#email").val().trim() == "")) {
            $("#useredit_email").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#personal").val() == null || $("#personal").val().trim() == "")) {
            $("#useredit_personal").removeClass("d-none").addClass("d-block")
            return
        }else if (($("#phone").val() == null || $("#phone").val().trim() == "")) {
            $("#useredit_phone").removeClass("d-none").addClass("d-block")
            return
        }

        else {



            $("#useredit_name").removeClass("d-block").addClass("d-none")
            $("#useredit_email").removeClass("d-block").addClass("d-none")
            $("#useredit_personal").removeClass("d-block").addClass("d-none")
            $("#useredit_phone").removeClass("d-block").addClass("d-none")


                ajaxCall = $.ajax({
                    url: 'submit.php',
                    type: 'post',
                    data: new FormData(this),
                    
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.includes("successfully")) {
                            $("#useredit_msg").removeClass("d-none")
                            $("#useredit_msg").removeClass("alert-danger").addClass("alert-success")
                            $("#useredit_msg strong").text("successfully")
                            setTimeout(() => {
                                window.history.back();
                            }, 2000)
                        } else {
                            $("#useredit_msg").removeClass("d-none")
                            $("#useredit_msg").removeClass("alert-success").addClass("alert-danger")
                            $("#useredit_msg strong").text(data)
                        }
                    }

                })


        }//else
    }); //end onclick



    // $("#offeradd").submit(function (e) {
    //     //     // custom handling here
    //     e.preventDefault();

    //     // audio.play();

    //      if (($("#name").val() == null || $("#name").val().trim() == "")) {
    //         $("#offeradd_name").removeClass("d-none").addClass("d-block")
    //         return
    //     }else if (($("#cuselink").val() == null || $("#cuselink").val().trim() == "") && !$("#cuselink").is(':disabled')) {
    //         $("#offeradd_link").removeClass("d-none").addClass("d-block")
    //         return
    //     }else if (($("#coupon").val() == null || $("#coupon").val().trim() == "")) {
    //         $("#offeradd_coupon").removeClass("d-none").addClass("d-block")
    //         return
    //     }

    //     else {


    //         $("#offeradd_name").removeClass("d-block").addClass("d-none")
    //         $("#offeradd_link").removeClass("d-block").addClass("d-none")
    //         $("#offeradd_coupon").removeClass("d-block").addClass("d-none")

    //             ajaxCall = $.ajax({
    //                 url: 'submit.php',
    //                 type: 'post',
    //                 data: new FormData(this),
                    
    //                 contentType: false,
    //                 cache: false,
    //                 processData: false,
    //                 success: function (data) {
    //                     if (data.includes("successfully")) {
    //                         $("#offeradd_msg").removeClass("d-none")
    //                         $("#offeradd_msg").removeClass("alert-danger").addClass("alert-success")
    //                         $("#offeradd_msg strong").text("successfully")
    //                         setTimeout(() => {
    //                             window.history.back();
    //                         }, 2000)
    //                     } else {
    //                         $("#offeradd_msg").removeClass("d-none")
    //                         $("#offeradd_msg").removeClass("alert-success").addClass("alert-danger")
    //                         $("#offeradd_msg strong").text(data)
    //                     }
    //                 }

    //             })


    //     }//else
    // }); //end onclick




    // $("#offeredit").submit(function (e) {
    //     //     // custom handling here
    //     e.preventDefault();

    //     // audio.play();

    //      if (($("#name").val() == null || $("#name").val().trim() == "")) {
    //         $("#offeredit_name").removeClass("d-none").addClass("d-block")
    //         return
    //     }else if (($("#ucuselink").val() == null || $("#ucuselink").val().trim() == "")  && !$("#ucuselink").is(':disabled')) {
    //         $("#offeredit_link").removeClass("d-none").addClass("d-block")
    //         return
    //     }else if (($("#coupon").val() == null || $("#coupon").val().trim() == "")) {
    //         $("#offeredit_coupon").removeClass("d-none").addClass("d-block")
    //         return
    //     }

    //     else {



    //         $("#offeredit_name").removeClass("d-block").addClass("d-none")
    //         $("#offeredit_link").removeClass("d-block").addClass("d-none")
    //         $("#offeredit_coupon").removeClass("d-block").addClass("d-none")

    //             ajaxCall = $.ajax({
    //                 url: 'submit.php',
    //                 type: 'post',
    //                 data: new FormData(this),
                    
    //                 contentType: false,
    //                 cache: false,
    //                 processData: false,
    //                 success: function (data) {
    //                     if (data.includes("successfully")) {
    //                         $("#offeredit_msg").removeClass("d-none")
    //                         $("#offeredit_msg").removeClass("alert-danger").addClass("alert-success")
    //                         $("#offeredit_msg strong").text("successfully")
    //                         setTimeout(() => {
    //                             window.history.back();
    //                         }, 2000)
    //                     } else {
    //                         $("#offeredit_msg").removeClass("d-none")
    //                         $("#offeredit_msg").removeClass("alert-success").addClass("alert-danger")
    //                         $("#offeredit_msg strong").text(data)
    //                     }
    //                 }

    //             })


    //     }//else
    // }); //end onclick






    $("#blogadd").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#blogadd_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#blogadd_text").val() == null || $("#blogadd_text").val().trim() == "") {
            $("#blogadd_textt").removeClass("d-none").addClass("d-block")
            return
        } else if (($("#buselink").val() == null || $("#buselink").val().trim() == "") && !$("#buselink").is(':disabled')) {
            $("#blogadd_link").removeClass("d-none").addClass("d-block")
            return
        }

        else {


            $("#blogadd_name").removeClass("d-block").addClass("d-none")
            $("#blogadd_textt").removeClass("d-block").addClass("d-none")
            $("#blogadd_link").removeClass("d-block").addClass("d-none")

            var validExtensions = ['jpg', 'png'];

            var fileimage = $("#file_img").val()
            fileimage = fileimage.substr(fileimage.lastIndexOf('.') + 1);

            if ($.inArray(fileimage, validExtensions) == -1) {
                $("#blogadd_msg").removeClass("d-none")
                $("#blogadd_msg").removeClass("alert-success").addClass("alert-danger")
                $("#blogadd_msg strong").text("Invalid file type")
            } else {

                $("#blogadd_msg").removeClass("d-none")
                $("#blogadd_msg").removeClass("alert-success").addClass("alert-danger")

                ajaxCall = $.ajax({
                    url: 'submit.php',
                    type: 'post',
                    data: new FormData(this),
                    
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data.includes("successfully")) {
                            $("#blogadd_msg").removeClass("d-none")
                            $("#blogadd_msg").removeClass("alert-danger").addClass("alert-success")
                            $("#blogadd_msg strong").text("successfully")
                            setTimeout(() => {
                                window.history.back();
                            }, 2000)
                        } else {
                            $("#blogadd_msg").removeClass("d-none")
                            $("#blogadd_msg").removeClass("alert-success").addClass("alert-danger")
                            $("#blogadd_msg strong").text(data)
                        }
                    }

                })
            }

        }//else
    }); //end onclick


    $("#blogedit").submit(function (e) {
        //     // custom handling here
        e.preventDefault();

        // audio.play();

        if ($("#name").val() == null || $("#name").val().trim() == "") {
            $("#blogedit_name").removeClass("d-none").addClass("d-block")
            return
        } else if ($("#eblogedit_text").val() == null || $("#eblogedit_text").val().trim() == "") {
            $("#blogedit_textt").removeClass("d-none").addClass("d-block")
            return
        } else if (($("#beuselink").val() == null || $("#beuselink").val().trim() == "") && !$("#beuselink").is(':disabled')) {
            $("#blogedit_link").removeClass("d-none").addClass("d-block")
            return
        }

        else {


            $("#blogedit_name").removeClass("d-block").addClass("d-none")
            $("#blogedit_textt").removeClass("d-block").addClass("d-none")
            $("#blogedit_link").removeClass("d-block").addClass("d-none")


            ajaxCall = $.ajax({
                url: 'submit.php',
                type: 'post',
                data: new FormData(this),
                
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    if (data.includes("successfully")) {
                        $("#blogedit_msg").removeClass("d-none")
                        $("#blogedit_msg").removeClass("alert-danger").addClass("alert-success")
                        $("#blogedit_msg strong").text("successfully")
                        setTimeout(() => {
                            window.history.back();
                        }, 2000)
                    } else {
                        $("#blogedit_msg").removeClass("d-none")
                        $("#blogedit_msg").removeClass("alert-success").addClass("alert-danger")
                        $("#blogedit_msg strong").text(data)
                    }
                }

            })

        }//else
    }); //end onclick

});