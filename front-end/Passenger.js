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

$.ajax({
  url: "", // The URL of PHP script which handle fetch of passenger user data
  type: "get",
  success: function (response) {
    // the response is a JSON object containing the user's data
    var data = JSON.parse(response);

    // Update the HTML elements with the data from the response
    $(".profile img").attr("src", data.image);
    $(".profile p:eq(0) .passenger-info").text(data.email);
    $(".profile p:eq(1) .passenger-info").text(data.phone);

    // each flight inside flights array contain (airline,number,origin,destination,departure_time,arrival_time)
    // Function to add a flight to a table
    function addFlight(flight, tableClass) {
      var row = $("<tr>");
      row.append($("<td>").text(flight.airline));
      row.append($("<td>").text(flight.number));
      row.append($("<td>").text(flight.origin));
      row.append($("<td>").text(flight.destination));
      row.append($("<td>").text(flight.departure_time));
      row.append($("<td>").text(flight.arrival_time));
      $(tableClass + " .flight-list").append(row);
    }

    // Add each completed flight to the completed flights table
    for (var i = 0; i < data.completedFlights.length; i++) {
      addFlight(data.completedFlights[i], ".completed-flights");
    }

    // Add each current flight to the current flights table
    for (var i = 0; i < data.currentFlights.length; i++) {
      addFlight(data.currentFlights[i], ".current-flights");
    }
  },
  error: function (jqXHR, textStatus, errorThrown) {
    console.error("Error: " + textStatus, errorThrown);
  },
});
