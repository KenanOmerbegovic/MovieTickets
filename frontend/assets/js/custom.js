$(document).ready(function () {
    $("main#spapp > section").height($(document).height() - 60);
  
    var app = $.spapp({ pageNotFound: "error_404" }); // initialize
  
    // define routes
    app.route({ view: "Login", load: "Login.html" });
    app.route({ view: "Register", load: "Register.html" });
    app.route({ view: "main", load: "main.html" });
    app.route({ view: "Profile", load: "Profile.html" });
    app.route({ view: "Reservation", load: "Reservation.html" });
    app.route({ view: "Movies", load: "Movies.html" });
  
    // run app
    app.run();
  });