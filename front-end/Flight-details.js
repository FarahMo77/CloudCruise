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
  // Handle flight cancellation
  $("#cancel-flight").click(function () {
    // Send an AJAX request to server to cancel the flight and refund the passengers

    $.ajax({
      url: "/cancelFlight", // Replace with your API endpoint
      type: "POST",
      data: { flightId: $("#flight-id").text() },
      success: function (response) {
        // Update the dialog message
        $("#dialog-message").text(response.message);
        // Hide the flight details and show the dialog box
        $(this).closest(".flight-card").children().not(".dialog").hide();
        $(this).closest(".flight-card").find(".dialog").show();
      },
    });
  });
});
