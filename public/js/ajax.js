$(document).on("change", ".choose-category", function () {
    let cat = $(this).data("cat")
    let product = $(this).data("product")
    let url = "/ajax/product/addCat"
    let data = {
        product: product,
        category: cat,
        _token: $("#csrf").val()
    };
    if ($(this).is(":checked")) {
        $.ajax({
            method: "POST",
            url: url,
            data: data,
            success: function (response) {
                $("#productCategory").html(response)
            }
        }).fail(function (response) {
            console.log(response)
        });
    }
})
$(document).on("submit", ".unchoose-category", function (e) {
    e.preventDefault()
    let url = "/ajax/product/removeCat"
    let data = $(this).serialize()
    $.ajax({
        method: "get",
        url: url,
        data: data,
        success: function (response) {
            $("#productCategory").html(response)
        }
    }).fail(function (response) {
        console.log(response)
    });
})
/**
 *
 */
$(document).on("submit", "#addSizeForm", function (e) {
    e.preventDefault();
    let data = new FormData(this)
    let url = "/ajax/product/addSize"
    $.ajax({
        type: "post",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#productSizes").html(response)
        }
    });
})
$(document).on("submit", ".addColorForm", function (e) {
    e.preventDefault();
    let data = new FormData(this)
    let url = "/ajax/product/AddColor"
    let sizeDev = "#colorsForSize" + $(this).data("size")
    $.ajax({
        type: "post",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#productSizes").html(response)
            $(sizeDev).show()
        }
    });
})
$(document).on("submit", ".makeMainColor", function (e) {
    e.preventDefault();
    let data = new FormData(this)
    let url = "/ajax/product/makeMainColor"
    let sizeDev = "#colorsForSize" + $(this).data("size")
    let colorDev = "#colorsForSize" + $(this).data("color")
    $.ajax({
        type: "post",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#productSizes").html(response)
            $(sizeDev).show()
            $(colorDev).show()
        }
    });
})
$(document).on("submit", ".addImagesForm", function (e) {
    e.preventDefault();
    let data = new FormData(this)

    let url = "/ajax/product/addImages"
    let sizeDev = "#colorsForSize" + $(this).data("size")
    let coloDev = "#detailsForColor" + $(this).data("color")
    $.ajax({
        type: "post",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#productSizes").html(response)
            $(sizeDev).show()
            $(coloDev).show()
        }
    });
})
$(document).on("submit", ".addDiscountForm", function (e) {
    e.preventDefault();
    let data = new FormData(this)

    let url = "/ajax/product/addDiscount"
    let sizeDev = "#colorsForSize" + $(this).data("size")
    let coloDev = "#detailsForColor" + $(this).data("color")
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#productSizes").html(response)
            $(sizeDev).show()
            $(coloDev).show()
        }
    });
})
/**
 * User
 */

$(document).on("submit", ".userMakeAdmin", function (e) {
    e.preventDefault();
    let data = new FormData(this)
    let url = "/ajax/user/makeAdmin"
    let userRow = "#detailsForUser" + $(this).data("user")
    $.ajax({
        type: "post",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $(userRow).html(response)
        }
    });
})
$(document).on("submit", ".userChangeRole", function (e) {
    e.preventDefault();
    let data = $(this).serialize()
    let url = "/ajax/user/changeRole"
    let userRow = "#detailsForUser" + $(this).data("user")
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "get",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $(userRow).html(response)
        }
    }).fail(function (response) {
        console.log(response)
    });
})
$(document).on("click", ".Product-single-size-name", function (e) {
    e.preventDefault();
    let size = $(this).data("size")
    let url = "/ajax/showSize/" + size
    let div = ".single-product-size-show"
    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            $(div).html(response)
        }
    });
})
$(document).on("click", ".choose-main-color", function (e) {
    e.preventDefault();
    let size = $(this).data("size")
    let color = $(this).data("color")
    let url = "/ajax/showMainColor/" + size + "/" + color
    let div = ".single-product-main-color"
    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            $(div).html(response)
        }
    });
})
// $(document).on("click", ".change-cart-state", function (e) {
//     e.preventDefault();
//     let cart = $(this).data("cart")
//     let state = $(this).data("state")
//     let url = "/ajax/approveCart/" + cart
//     let div = ".cart-state"
//     if (state == "approved") {
//         $.ajax({
//             type: "get",
//             url: url,
//             success: function (response) {
//                 $(div).html(response)
//             }
//         });
//     }
// })
$(document).on("change", "#ProductSearch", function () {

    let keyWord = $(this).val()
    console.log(keyWord)
    let url = "/ajax/productSearch/" + keyWord
    let div = ".products-container"
    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            $(div).html(response)
        }
    });
})
$(document).ready(function () {
    $("#ProductSearch").keyup(function () {
        let keyWord = $(this).val()

        let url = "/ajax/productSearch/" + keyWord
        let div = ".products-container"
        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                $(div).html(response)
            }
        });
    })
})

// Category pagination
$(document).on("click", ".pagination a", function (e) {
    e.preventDefault()
    let page = $(this).attr("href").split("page=")[1]
    div = "#categoriesContainer"
    product = $(div).data("product")
    let url = "/ajax/getCategories/" + product + "?page=" + page
    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            $(div).html(response)
        }
    });

})
