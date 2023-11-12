$('.btn').click(function () {
  $('.menu').toggleClass('close');
  $('.contetn-inner').toggleClass('close');
});

document.addEventListener("DOMContentLoaded", () => {
  const navMain = document.getElementById("nav-main");
  const main = document.getElementById("main");
  const navProj = document.getElementById("nav-projects");
  const proj = document.getElementById("projects");

  navMain.addEventListener("click", () => {
    proj.classList.remove('open');
    main.classList.add("open")
  });
  navProj.addEventListener("click", () => {
    main.classList.remove('open');
    proj.classList.add("open")
  });
});


// $('#main').click(function () {
//   $('.main').addClass('open');
//   $('.projects').removeClass('open');
// });

// $('#projects').click(function () {
//   $('.main').removeClass('open');
//   $('.projects').addClass('open');
  
// });


// document.addEventListener("DOMContentLoaded", () => {
//   const button = document.getElementById("button");
//   const rect = document.getElementById("rect");

//   button.addEventListener("click", () => {
//     toggleTwoClasses(rect, "is-visible", "is-hidden", 500);
//   });
// });

// function toggleTwoClasses(element, first, second, timeOfAnimation) {
//   if (!element.classList.contains(first)) {
//     element.classList.add(first);
//     element.classList.remove(second);
//   } else {
//     element.classList.add(second);
//     window.setTimeout(function() {
//       element.classList.remove(first);
//     }, timeOfAnimation);
//   }
// }