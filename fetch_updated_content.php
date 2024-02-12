<?php

if (isset($_COOKIE['button_clicked'])) {
    if (file_exists('main_page.html')) {
        $htmlContent = file_get_contents('main_page.html');
        echo $htmlContent;
    } else {
        echo '<p style="font-size: 1.42rem; color: white;"> Internal Error. Try again Later!</p>';
    }
}

if (!isset($_COOKIE['button_clicked']) && $_REQUEST['attempts'] == 3) {
    echo '<p style="font-size: 1.42rem; color: white;"> Verification Failed. Try again Later!</p>';
}
