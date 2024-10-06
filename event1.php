<?php

    require_once('function.php');

    $navbar = navbar();
    $headerImage = generateBackgroundImage();
    $footer = footer();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Page</title>

    <!-- STYLE SHEETS FOR FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php echo $navbar ?>

    <span class="body-container-events">
        <h1 class="header-text header-text-event">EVENTS</h1>

        <!-- Bento box style grid -->
        <div class="bento-grid">
            <!-- Event 1 -->
            <div class="bento-item large">
                <img src="photos/bento_box_images/photo1.jpg" alt="Event 1" class="event-image">
                <div class="bento-content">
                    <h3>Visible Thugs</h3>
                    <p>Event 1 description. Something about the event.</p>
                </div>
            </div>

            <!-- Event 2 -->
            <div class="bento-item medium">
                <img src="photos/bento_box_images/photo2.jpg" alt="Event 2" class="event-image">
                <div class="bento-content">
                    <h3>Wayne Dickson</h3>
                    <p>Event 2 description. Something about the event.</p>
                </div>
            </div>

            <!-- Event 3 -->
            <div class="bento-item small">
                <img src="photos/bento_box_images/photo3.jpg" alt="Event 3" class="event-image">
                <div class="bento-content">
                    <h3>Lani O'Heal</h3>
                    <p>Dumfries' scrappiest DJ healing you through soulful records.</p>
                </div>
            </div>

            <!-- Event 4 -->
            <div class="bento-item wide">
                <img src="photos/bento_box_images/photo4.jpg" alt="Event 4" class="event-image">
                <div class="bento-content">
                    <h3>Monday Folk Jam</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quaerat eos.</p>
                </div>
            </div>

            <!-- Event 5 -->
            <div class="bento-item tall">
                <img src="photos/bento_box_images/photo5.jpg" alt="Event 5" class="event-image">
                <div class="bento-content">
                    <h3>Special DJ Night</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam blanditiis!</p>
                </div>
            </div>
        </div>
    </span>

    <?php echo $footer; ?>

    <script src="/dougie/assets/js/general.js"></script>
</body>
</html>
