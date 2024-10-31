$(document).ready(function(){
    $("form").on("submit", function(event){
        event.preventDefault();
        
        var formData = $(this).serialize();
        
        $.ajax({
            url: "phpfile.php",
            type: "POST",
            data: formData,
            success: function(response){
                $("#message").text(response.message).css({"color":"#4bdd95"});
                
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown){
                $("#message").text(response.message).css({"color":"#ba261b"});
                console.log(textStatus, errorThrown);
            }
        });
    });
});
