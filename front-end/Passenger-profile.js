$(document).ready(function() {
    function getUserId() {
        // Get the user ID from the cookie
        var userId = Cookies.get("userId");
      
        // Return the user ID
        return userId;
    }
    var userId = getUserId();
    $.get('your-php-script.php', { id: userId }, function(response) {
        if(response.success) {
            // If the PHP script returns a success response, fill the table with the user's original data
            var $cardBody = $('.card-body');
            $cardBody.find('tr').each(function() {
                var $thirdTd = $(this).find('td').eq(2);
                $thirdTd.html(response.data[$(this).find('td:first').text()]);
            });
        }
    }, 'json').fail(function() {
        alert('Error: Could not fetch data from the server.');
    });

    $(".fa-pen").click(function() {
        var $cardBody = $(this).closest('.card-body');
        var originalValues = [];

        $cardBody.find('tr').each(function() {
            var $thirdTd = $(this).find('td').eq(2);
            var text = $thirdTd.text();
            originalValues.push(text);
            $thirdTd.html('<input type="text" value="' + text + '">');
        });

        $("#save").show();
        $("#cancel").show();
        $("#cancel").click(function() {
            var index = 0;
            $cardBody.find('tr').each(function() {
                var $thirdTd = $(this).find('td').eq(2);
                $thirdTd.html(originalValues[index]);
                index++;
            });
            $("#save").hide();
            $("#cancel").hide();
        });
        
        $("#save").click(function() {
            // Collect the new data and send it to your PHP script
            var data = {};
            $cardBody.find('tr').each(function() {
                var key = $(this).find('td:first').text();
                var value = $(this).find('input').val();
                data[key] = value;
            });

            // Validate the data here...

            $.post('your-php-script.php', data, function(response) {
                // Handle the response from your PHP script
                if(response.success) {
                    // If the PHP script returns a success response, update the table with the new data
                    var index = 0;
                    $cardBody.find('tr').each(function() {
                        var $thirdTd = $(this).find('td').eq(2);
                        $thirdTd.html(data[$(this).find('td:first').text()]);
                        index++;
                    });
                }
            }, 'json').fail(function() {
                alert('Error: Could not send data to the server.');
            });
        });
    });

    $(".fa-sign-out-alt").click(function() {
        window.location.href = 'register.html'; // Redirect to register.html
    });
});
