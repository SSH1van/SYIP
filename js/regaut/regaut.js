// After reload page checking position which needs to be returned
check = false;
check = JSON.parse(localStorage.getItem("myKey"));
if (check) {
  $(".container").addClass("log-in");
}

// Click on button add class for transition block
$(".info-item .btn").click(function () {
  $(".container").toggleClass("log-in");

  // Checking position users and writing in localStorage
  if ($(".container").hasClass("log-in")) {
    check = true;
    localStorage.setItem("myKey", JSON.stringify(check));
  } else {
    check = false;
    localStorage.clear();
  }
});

// Reload page
$('body').bind('beforeunload', function () {
  check = false;
});


/* Without hover for touch devices */
let touchDevices = (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch);

if (touchDevices) {
  $(".btn.another").addClass("nohover");
}