<?php
// Set a cookie to indicate that the button has been clicked
setcookie('button_clicked', 'true', strtotime('+1 year'), '/');

// Return the main content
echo '<h1>Welcome to the Main Content!</h1>';
echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>';
echo '<p>Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>';
// Add more main content here if needed
?>
