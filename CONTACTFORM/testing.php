<?php
// 1. Handle the PHP button click
$message = "";

function trigger($check){
    if($check === true){
        $messge = true;
        echo"hey";
    }else{
        $message =  false;
    }
}
if (isset($_POST['my_button'])) {
    $message = "You clicked the button! This will vanish in 5 seconds.";
    trigger(true);

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Button with Fading Message</title>
    <style>
        /* Smooth fade-out transition effect */
        #notification-box {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            margin-bottom: 15px;
            transition: opacity 0.5s ease; /* Takes 0.5 seconds to fade out smoothly */
        }
    </style>
</head>
<body>

    <!-- 2. The PHP Message Container (Only renders if a message exists) -->
    <?php if (!empty($message)): ?>
        <div id="notification-box">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- The form and button -->
    <form method="POST" action="">
        <button type="submit" name="my_button" value="clicked_value">
            Click Me
        </button>
    </form>

    <!-- 3. JavaScript to handle the 5-second countdown -->
    <script>
        // Find the notification box on the page
        const notification = document.getElementById('notification-box');

        // If the element exists (meaning PHP printed it)
        if (notification) {
            // Wait 5000 milliseconds (5 seconds), then start the fade out
            setTimeout(() => {
                notification.style.opacity = '0';
                
                // Wait an extra 500ms for the animation to finish, then remove it completely
                setTimeout(() => {
                    notification.remove();
                }, 500);
                
            }, 5000);
        }
    </script>

</body>
</html>
