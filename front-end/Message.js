$(document).ready(function() {
    $("form").on("submit", function(event) {
        event.preventDefault();

        var message = $("#message").val(); 

        if(message) { // If the message is not empty
            $.ajax({
                url: 'yourfile.php', // The URL of the PHP file
                type: 'POST', 
                data: { 'message': message }, 
                success: function(response) { 
                    alert('Message sent: ' + response);
                },
                error: function(jqXHR, textStatus, errorThrown) { 
                    console.log(textStatus, errorThrown);
                    alert('Error sending message');
                }
            });
            $("#message").val(''); 
        } else {
            alert("Please enter a message."); 
        }
    });
});
