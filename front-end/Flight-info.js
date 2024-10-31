function getUserId() {
  // Get the user ID from the cookie
  var userId = Cookies.get("userId");

  // Return the user ID
  return userId;
}

$(function () {
  // Fetch flight details from your PHP API
  $.ajax({
    url: "/getFlightDetails", // Replace with your API endpoint
    type: "GET",
    success: function (response) {
      var flightDetails = JSON.parse(response);

      // Update flight details
      $("#flight-id").text(flightDetails.id);
      $("#flight-name").text(flightDetails.name);
      $("#flight-itinerary").text(flightDetails.itinerary);
      $("#flight-fee").text(flightDetails.fee);
      $("#flight-start").text(
        flightDetails.startDate + "at" + flightDetails.startTime
      );
      $("#flight-end").text(
        flightDetails.EndDate + "at" + flightDetails.EndTime
      );
      $("#flight-state").text(flightDetails.state);
      $("#pending-passengers").text(flightDetails.pending);
      $("#registered-passengers").text(flightDetails.registered);
    },
  });
  $("#message").click(function () {
    // Redirect to another page for messaging
    window.location.href = "/messagePage"; // Replace with the actual URL
  });
  $("#reserve").click(function () {
    // Get the flight ID and user ID
    var flightId = $("#flight-id").text();
    var userId = getUserId();

    // Send a request to reserve the flight for the logged-in user
    if (userId) {
      $.ajax({
        url: "/reserveFlight", // Replace with your API endpoint
        type: "POST",
        data: { flightId: flightId, userId: userId },
        success: function (response) {
          // Handle the response from the server
          console.log(response);
        },
        error: function (error) {
          // Handle errors, if any
          console.error(error);
        },
      });
    } else {
      // Handle the case where user ID is not available
      console.error("User ID not available for reservation.");
    }
  });
});
