//Alerts before deleting a post
$('.delete-post-btn').on('click', function () {
  if (confirm('Are you sure you want to delete this post?')) {
    return true;
  } else {
    return false;
  }
})

//Toggles show and hide password
$(".toggle-password").click(function () {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

//enables the "Signup" button if checkbox is checked
let checker = document.getElementById("18");
let sub = document.getElementById("signup");

function enable() {
  checker.checked ? sub.disabled = false : sub.disabled = true;
};

// Check distance to top and display back-to-top.
$(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
    $('.back-to-top').addClass('show-back-to-top');
  } else {
    $('.back-to-top').removeClass('show-back-to-top');
  }
});

// Click event to scroll to top.
$('.back-to-top').click(function () {
  $('html, body').animate({
    scrollTop: 0
  }, 100, 'swing');
  return false;
});

//Shows image's file name in input box before uploading it
$('#image').change(function () {
  var i = $(this).prev('label').clone();
  var file = $('#image')[0].files[0].name;
  $(this).prev('label').text(file);
});

//Image gallery scroll reveal
ScrollReveal().reveal('#reveal', {
  delay: 275,
  duration: 500,
  reset: false,
  mobile: false,
  interval: 600,
  distance: '80px',
  origin: 'bottom'
});