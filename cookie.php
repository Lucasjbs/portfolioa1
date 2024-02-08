<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Button Example</title>
</head>
<body>

    <?php
    // Check if the button has been clicked by checking the cookie
    $buttonClicked = isset($_COOKIE['button_clicked']);
    ?>

    <!-- Display the button if it hasn't been clicked -->
    <?php if (!$buttonClicked): ?>
        <button onclick="handleButtonClick()">Click Me</button>
    <?php endif; ?>

    <!-- Main content container -->
    <div id="mainContent">
        <!-- AJAX response will be inserted here -->
    </div>

    <script>
        // Function to handle button click event
        function handleButtonClick() {
            // Make an AJAX request to set the cookie and retrieve the main content
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        // Update the main content container with the response
                        document.getElementById('mainContent').innerHTML = xhr.responseText;
                    } else {
                        console.error('AJAX request failed: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', 'set_cookie.php', true);
            xhr.send();
        }

        // Function to handle page unload event (when the user leaves the page)
        window.addEventListener('beforeunload', function() {
            // Remove the cookie when the user leaves the page
            document.cookie = "button_clicked=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        });
    </script>

</body>
</html>
