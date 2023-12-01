/* Burger menu */
let burger = $("#burger");
let navs = $("#navs");

burger.on("click", function () {
    navs.toggleClass("show");
});

$(window).resize(function () {
    navs.removeClass("show");
});

/* Navigation disappears when clicking on an element */
$("[data-scroll]").on("click", function (eventImportant) {
    navs.removeClass("show");
});
