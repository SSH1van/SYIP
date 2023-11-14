$('.btn').click(function () {
  $('.menu').toggleClass('close');
  $('.all-contetn-inner').toggleClass('close');
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

$("#FileInput").on('change', function (e) {
  var labelVal = $(".filelabel-title").text();
  var oldfileName = $(this).val();
  fileName = e.target.value.split('\\').pop();

  if (oldfileName == fileName) { return false; }
  var extension = fileName.split('.').pop();

  if (extension == 'doc' || extension == 'docx' || extension == 'pdf') {
    $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
    $(".filelabel i, .filelabel .filelabel-title").css({ 'color': '#2388df' });
    $(".filelabel").css({ 'border': ' 2px solid #2388df' });

    if (fileName) {
      if (fileName.length > 10) {
        $(".filelabel .filelabel-title").text(fileName.slice(0, 4) + '...' + extension);
      }
      else {
        $(".filelabel .filelabel-title").text(fileName);
      }
    }
    else {
      $(".filelabel .filelabel-title").text(labelVal);
    }
  }
  else {
    $(".filelabel i").removeClass().addClass('fa fa-file-o');
    $(".filelabel i, .filelabel .filelabel-title").css({ 'color': 'red' });
    $(".filelabel").css({ 'border': ' 2px solid red' });

    $(".filelabel .filelabel-title").text("Ошибка!");
  }
});