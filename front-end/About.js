$(function () {
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll == 0) {
      $("header").css("background-color", "rgb(0 0 0 / 0%)");
    } else {
      $("header").css("background-color", "rgb(90 95 109 / 70%)");
    }
  });
});
$(function () {
  $.ajax({
    url: "SERVER_URL", // Replace with server URL
    type: "GET",
    success: function (response) {
      $(".flights-cards").empty();
      // Assuming 'response' is JSON response from the server
      $.each(response, function (flight) {
        // Create a new card with the flight data
        var $newCard = $(
          '<div class="card">' +
            '<img src="' +
            flight.imageUrl +
            '" alt="country image" />' +
            '<div class="info">' +
            "<h2>" +
            flight.country +
            ", " +
            flight.city +
            "</h2>" +
            "<p>Flight Number : <span>" +
            flight.flightNumber +
            "</span></p>" +
            "<p>Airline : " +
            flight.airline +
            "</p>" +
            "</div>" +
            "</div>"
        );
        // Append the new card to the page
        $(".flights-cards").append($newCard);
      });
    },
    error: function (error) {
      console.log("Error:", error);
    },
  });
});
