$(document).ready(function () {
  $(".results").hide();
  // Fetch available countries from the PHP backend
  $.get("getAvailableCountries.php", function (data) {
    var countries = JSON.parse(data);
    countries.forEach(function (country) {
      $("#departure, #destination").append(
        $("<option>", {
          value: country,
          text: country,
        })
      );
    });
  });
  $("#departure, #destination").change(function () {
    var selectedCountry = $(this).val();
    var otherSelect = $(this).is("#departure") ? "#destination" : "#departure";
    $(otherSelect + " option[value='" + selectedCountry + "']").remove();
  });
  // Handle form submission
  $("form").on("submit", function (e) {
    e.preventDefault();
    var departure = $("#departure").val();
    var destination = $("#destination").val();

    // Send selected countries to the PHP backend to get flights
    $.post(
      "getFlights.php",
      { departure: departure, destination: destination },
      function (data) {
        var flights = JSON.parse(data);
        $(".results").empty();

        if (flights.length > 0) {
          flights.forEach(function (flight) {
            var row =
              '<div class="flight-row" data-id="' +
              flight.id +
              '">' +
              '<div class="departure">' +
              '<div class="time departure-time">' +
              flight.departureTime +
              "</div>" +
              '<div class="city">' +
              flight.departureCity +
              "</div>" +
              "</div>" +
              '<div class="logo">' +
              '<img src="Imgs/company-logo.png" alt="Flight Logo">' +
              "</div>" +
              '<div class="arrival">' +
              '<div class="time arrival-time">' +
              flight.arrivalTime +
              "</div>" +
              '<div class="city">' +
              flight.arrivalCity +
              "</div>" +
              "</div>" +
              "</div>";
            $(".results").append(row);
          });
        } else {
          $(".results").append("<p> No flights found. </p>");
        }

        $(".results").show();
      }
    );
  });

  // Handle click on a flight row
  $(document).on("click", ".flight-row", function () {
    var flightId = $(this).data("id");

    // Send flight ID to the PHP backend to get flight info
    $.get("getFlightInfo.php", { flightId: flightId }, function (data) {
      // Assuming the PHP script returns a URL to the Flight-info.html page
      window.location.href = data;
    });
  });
});
