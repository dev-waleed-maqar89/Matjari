$(document).on("click", ".dashboard-size-name", function () {
    let colorsDivs = ".dashboard-product-colors-container"
    let divId = "colorsForSize" + $(this).data("size")
    $(colorsDivs).each(function (index, element) {

        if (element.id.indexOf(divId) == -1) {
            $(element).hide(400)
        }
    });
    $(this).toggleClass("active")
    $("#" + divId).toggle(400);
    $(".dashboard-size-name").not(this).removeClass("active")
})
$(document).on("click", ".dashboard-color-name", function () {
    let colorsDiv = "#detailsForColor" + $(this).data("color")
    $(colorsDiv).toggle("1000");
})
$(document).on("click", ".dashboard-links", function (e) {
    e.preventDefault();
    $("aside").toggle(200)
})
$(document).on("click", ".Product-single-size-name ", function () {
    $(".Product-single-size-name.active").removeClass("active")
    $(this).addClass("active")
})
$(document).on("click", ".close-add-address", function () {
    $(".alert-add-address").hide()
})
