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
    <title>Document</title>
    
    <!-- STYLE SHEETS FOR FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    

    <?php echo $navbar ?>


    <!-- CONTENT CONTAINER -->
    
    <span class="body-container-events">
        <!-- <div class="banner"> -->
        <!-- </div> -->

        <?php echo $headerImage ?>

        <!-- CARD CONTAINER -->

        <div class="card-container">

    <div class="card">
        <!-- <img src="eventPhotos/generic_dj_photo.jpg" alt="Event 1 Image" class="card-image"> -->
        <div class="date-container">
            <h2>14th</h2>
        </div>
        
        <div class="card-content">
            <h3>Visible Thugs</h3>
            <p>Event 1 description. Something about the event.</p>
            <!-- <a href="#" class="btn">Learn More</a> -->
        </div>
    </div>
    <div class="card">
        <!-- <img src="eventPhotos/generic_dj_photo.jpg" alt="Event 1 Image" class="card-image"> -->
        <div class="date-container">
            <h2>15th</h2>
        </div>
        
        <div class="card-content">
            <h3>Wayne Dickson</h3>
            <p>Event 1 description. Something about the event.</p>
            <!-- <a href="#" class="btn">Learn More</a> -->
        </div>
    </div>
    <div class="card">
        <!-- <img src="eventPhotos/generic_dj_photo.jpg" alt="Event 1 Image" class="card-image"> -->
        <div class="date-container">
            <h2>21st</h2>
        </div>
        
        <div class="card-content">
            <h3>Lani O'Heal</h3>
            <p>Dumfries' scrappiest DJ healing you through a selection of soulful records.</p>
            <!-- <a href="#" class="btn">Learn More</a> -->
        </div>
    </div>
    



    
    <!-- Add more cards as needed -->
</div>


        <!-- long cards for bento layout -->
    <div class="long-card">
        <h2 class="sub-title sub-title-event">Regular DJs</h2>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quaerat eos, consequuntur quos nisi ullam? Illo magnam nobis dicta hic corporis mollitia modi assumenda, distinctio culpa dolor repudiandae nam architecto minima laudantium cupiditate dolore quia dignissimos, est provident, laboriosam blanditiis!</p>


    </div>


    </span>

    <div class="text-container-home">
        </div>

        <?php echo $footer; ?>

    
    

</body>
</html>