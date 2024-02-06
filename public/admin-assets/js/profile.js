// $(".addBook").click(function () {
//     let data = {
//         author: $("#author").val(),
//         book_name: $("#bookname").val(),
//         description: $("#description").val(),
//         book_img: $("#bookImg").val(),
//         quantity: $("#quantity").val(),
//         faculty: $("#faculty").val(),
//     };

//     $(".addBook").attr("disabled", true).val("Adding...");

//     $.ajax({
//         type: "put",
//         url: "/addbook",
//         data: data,
//         dataType: "json",
//         success: function (response) {
//             if (response.status == 400) {
//                 $("#megaError").html("");
//                 $("#megaError").addClass("alert alert-danger");
//                 $.each(response.errors, function (key, err_values) {
//                     $("#megaError")
//                         .append("<li>" + err_values + "</li>")
//                         .delay(500)
//                         .fadeOut(5000);
//                 });
//                 $(".addBook").attr("disabled", false).val("Try again!");
//             } else if (response.status == 403) {
//                 $("#message").html("");
//                 $("#message").addClass("alert alert-danger");
//                 $("#message").html(response.message).delay(500).fadeOut(5000);
//                 $(".addBook").attr("disabled", false).val("Try Again!");
//             } else {
//                 $("#message").html("");
//                 $("#message")
//                     .addClass("alert alert-success")
//                     .delay(500)
//                     .fadeOut(2000);
//                 $("#message").html(response.message).delay(500).fadeOut(5000);
//                 $(".addBook").attr("disabled", false).val("Add");
//                 $(".formSubmit").find("input").val("");
//             }
//         },
//     });
// });

// $(".profile-dropdown").click(function () {
//     $(".dropdown-profile-settings").toggleClass("d-block");
// });
