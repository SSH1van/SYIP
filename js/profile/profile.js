$('.btn').click(function () {
  $('.menu').toggleClass('close');
});




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