var counter = 0;
var id = 0;
var success = false;

$(document).ready(function () {
    $('#verifyForm').submit(function (event) {
        event.preventDefault();
        counter = 0;

        $.ajax({
            type: 'POST',
            url: 'set_cookie.php',
            success: function (response) {
                $('#mainContent').html(response);
                document.getElementById("clickVerification").remove();
                id = setInterval(updateContent, 1000);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});

function updateContent() {
    var requestData = { "attempts": counter };

    if (!success) {
        $.ajax({
            url: 'fetch_updated_content.php',
            data: requestData,
            success: function (response) {
                if (response.includes("Verification Failed") || response.trim() === "") {
                    success = false;
                }
                else {
                    success = true;
                }
                $('#mainContent').html(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    if (counter >= 3) {
        clearInterval(id);
    }
    counter++;
}

// Function to handle page unload event (when the user leaves the page)
window.addEventListener('beforeunload', function () {
    document.cookie = "button_clicked=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
});