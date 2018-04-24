// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 300, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
        });
      }
    }
  });


var frmvalidator = new Validator("contactform");frmvalidator.addValidation("fname", "req", "Please provide your first name");frmvalidator.addValidation("lname", "req", "Please provide your last name");frmvalidator.addValidation("email", "req", "Please provide your email");frmvalidator.addValidation("phone", "req", "Please provide your phone number");frmvalidator.addValidation("email", "email", "Please enter a valid email address");
