let header = $("#header");

let intro = $("#intro");
let whom = $("#whom");
let timeline = $("#timeline");
let info = $("#info");
let content = $("#content");

let scrollPosLast = $(window).scrollTop();
let scrollPos = $(window).scrollTop();

let nav1 = $("#nav1");
let nav2 = $("#nav2");
let nav3 = $("#nav3");
let nav4 = $("#nav4");
let nav5 = $("#nav5");

checkScroll(scrollPosLast, scrollPos);
chekScrollPos(scrollPos);

$("#headerHover").hover(function () {
    header.removeClass("fixed");
});

nav1.mouseenter(function () {
    let active = $(".nav.active");
    active.removeClass("active");
});
nav1.mouseout(function () {
    chekScrollPos(scrollPos);
});

nav2.mouseenter(function () {
    let active = $(".nav.active");
    active.removeClass("active");
});
nav2.mouseout(function () {
    chekScrollPos(scrollPos);
});

nav3.mouseenter(function () {
    let active = $(".nav.active");
    active.removeClass("active");
});
nav3.mouseout(function () {
    chekScrollPos(scrollPos);
});

nav4.mouseenter(function () {
    let active = $(".nav.active");
    active.removeClass("active");
});
nav4.mouseout(function () {
    chekScrollPos(scrollPos);
});

nav5.mouseenter(function () {
    let active = $(".nav.active");
    active.removeClass("active");
});
nav5.mouseout(function () {
    chekScrollPos(scrollPos);
});


$(window).on("scroll resize", function () {
    scrollPosLast = scrollPos;
    scrollPos = $(this).scrollTop();

    chekScrollPos(scrollPos);
    checkScroll(scrollPosLast, scrollPos);
});

function checkScroll(scrollPosLast, scrollPos) {
    if (scrollPos > scrollPosLast) {
        header.addClass("fixed");
    } else if (scrollPos < scrollPosLast || scrollPos == 0) {
        header.removeClass("fixed");
    }
}

function chekScrollPos(scrollPos) {
    let active = $(".nav.active");

    if (scrollPos < whom.offset().top - 200) {
        active.removeClass("active");
        nav1.addClass("active");
    } else if (scrollPos > whom.offset().top - 200 && scrollPos < timeline.offset().top - 200) {
        active.removeClass("active");
        nav2.addClass("active");
    } else if (scrollPos > timeline.offset().top - 200  && scrollPos < info.offset().top - 200) {
        active.removeClass("active");
        nav3.addClass("active");
    } else if (scrollPos > info.offset().top - 200  && scrollPos < content.offset().top - 500) {
        active.removeClass("active");
        nav4.addClass("active");
    } else if (scrollPos > content.offset().top - 500) {
        active.removeClass("active");
        nav5.addClass("active");
    } 
}


/* Smooth scroll */
let elementId;
let elementOffset;

$("[data-scroll]").on("click", function (eventImportant) {
    console.log($(this)[0]);
    elementId = $(this).data("scroll");
    elementOffset = $(elementId).offset().top;

    $("html, body").animate({
        scrollTop: elementOffset - 40   
    }, 700);
});