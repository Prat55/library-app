"use strict";

$(document).ready(function () {
    $("#profile-pic").change(function () {
        let reader = new FileReader();

        reader.onload = (e) => {
            $("#profile_img").attr("src", e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    });

    $("#profile-pic").on("change", function () {
        var userid = $("#userId").val();
        var formData = new FormData();

        // Append the selected image to the FormData object
        formData.append("image", $(this)[0].files[0]);

        // Sending the image using jQuery AJAX
        $.ajax({
            type: "POST",
            url: "/change-profile/" + userid,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 400) {
                    $("#errstatus").html("");
                    $("#errstatus").addClass("text-danger");
                    $.each(response.errors, function (key, err_values) {
                        $("#errstatus").append("<li>" + err_values + "</li>");
                    })
                        .delay(200)
                        .fadeOut(2000);
                } else if (response.status == 404) {
                    $("#errstatus").html("");
                    $("#sStatus").addClass("text-danger");
                    $("#sStatus").text(response.message);
                } else {
                    $("#errstatus").html("");
                    $("#sStatus").html("");
                    $("#sStatus").addClass("text-success");
                    $("#sStatus")
                        .text(response.message)
                        .delay(200)
                        .fadeOut(2000);
                }
            },
        });
    });

    $("#library_card_btn").click(function () {
        $("#library_card").click();
    });
});
