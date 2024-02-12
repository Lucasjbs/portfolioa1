<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Click Interaction Challenge</title>
    <link rel="icon" href="./assets/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto" id="clickVerification">
                <img class="mb-4" src="./assets/generic_img.png" width="150">
                <h1 class="mb-3" style="font-size: 1.21rem; color: white;">Please complete the following CAPTCHA security challenge to continue!</h1>

                <div class="mb-4" id="clickCaptcha">
                    <form method="POST" action="" id="verifyForm">
                        <button type="submit" class="main-button">I am not a bot</button>
                    </form>
                </div>

                <p style="font-size: 14px; font-weight: bold; margin-bottom: 2px;" class="highlight">Why do I see CAPTCHA challenges?</p>
                <p style="font-size: 12px;" class="std-text mb-3">Due to current firewall security rules, you need to complete the CAPTCHA security challenge to continue access!</p>
                <hr style="  border: 1px solid white;">
                <p style="font-size: 12px;" class="std-text mb-3">Event ID: 2da61e70f93b415 • Your IP: 179.222.242.55</p>
            </div>

            <div class="col-md-auto" id="mainContent">
                <!-- AJAX response will be inserted here -->
            </div>
        </div>
    </div>

    <script src="/interaction_manager.js" defer></script>

    <!-- Popper.js and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>