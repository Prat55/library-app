// $(document).ready(function () {
//     $(".quick-view-btn").click(function () {
//         var id = $(this).val();

//         $.ajax({
//             type: "GET",
//             url: "/quick-view/" + id,
//             success: function (response) {
//                 if (response.status == 404) {
//                     $("#megaError").addClass("alert alert-danger");
//                     $("#megaError").append("<p>" + response.message + "</p>");
//                 } else {
//                     $("#quickview").modal("show");
//                     $(".book-title").html("Title: " + response.book.book_name);
//                     $(".author").html("Author: " + response.book.author);
//                     $(".description").html(
//                         "Description: " + response.book.description
//                     );
//                     $(".isbnNo").html("ISBN: " + response.book.isbnNo);
//                     $(".category").html("Category: " + response.book.category);
//                     $(".quantity").html(
//                         "Quantity: " + response.book.book_quantity
//                     );
//                     $(".bookimg").attr(
//                         "src",
//                         "/books/" + response.book.book_img
//                     );
//                 }
//             },
//         });
//     });
// });

// $(document).ready(function () {
//     $(".edit-btn").click(function () {
//         var id = $(this).val();
//         console.log(id);

//         $.ajax({
//             type: "POST",
//             url: "/quick-view/" + id,
//             success: function (response) {
//                 if (response.status == 404) {
//                     $("#megaError").addClass("alert alert-danger");
//                     $("#megaError").append("<p>" + response.message + "</p>");
//                 } else {
//                     $("#editBook").modal("show");
//                     $(".form").attr(
//                         "action",
//                         "/update/book/" + response.book.id
//                     );
//                     $("#book_title").val(response.book.book_name);
//                     $("#author").val(response.book.book_author);
//                     $("#description").html(response.book.book_description);
//                     $("#isbnNo").val(response.book.book_serial_number);
//                     $("#quantity").val(response.book.book_quantity);
//                     $("#bookCover").val(response.book.book_image_path);
//                 }
//             },
//         });
//     });
// });

$("#book_image").change(function () {
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#image-preview").attr("src", e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    }
});
