
import $ from 'jquery';
// Show and hide dashboard navbar
$(document).on("click", ".dashboard-links", function (e) {
    e.preventDefault();
    $("aside").toggle(200)
})
$(document).on("click", ".close-form-errors", function () {
    $(".form-errors-container").hide()
})

$(document).on("click", ".single-product-add-details-button", function (e) {
    let size = $(this).data("size")
    let chooseSize = $("#addColorForSize")
    if (size) {
        chooseSize.val(size)
    }
})

$(document).on("click", ".add-discount", function (e) {
    let color = $(this).data("color")
    let chooseColor = $("#addDiscountforColor")
    if (color) {
        chooseColor.val(color)
    }
})
$(document).on("click", ".add-images", function (e) {
    let color = $(this).data("color")
    let chooseColor = $("#addImagesForColor")
    if (color) {
        chooseColor.val(color)
    }
})


