// Contact sheet -- start

ClassicEditor.create(document.querySelector("#textarea")).catch((error) => {
  console.error(error);
});

// Contact sheet -- end

// Loader --start

$(window).on("load", function () {
  $(".loader-main").fadeOut(750);
});

// Loader -- end
