<?php

    require_once('function.php');

    $conn = connect();
    $navbar = navbar();
    $headerImage = generateBackgroundImage();
    $footer = footer();

    function getDayWithSuffix($date) {
        $day = date('j', strtotime($date)); 
    
        if ($day == 1 || $day == 21 || $day == 31) {
            $suffix = 'st';
        } elseif ($day == 2 || $day == 22) {
            $suffix = 'nd';
        } elseif ($day == 3 || $day == 23) {
            $suffix = 'rd';
        } else {
            $suffix = 'th';
        }
    
        return $day . $suffix; 
    }

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

        <!-- <?php echo $headerImage ?> -->

        <!-- <div class="banner"></div> -->
        <h1 class="header-text header-text-event">EVENTS</h1>

        <!-- CARD CONTAINER -->

    <?php 

        
        
    ?>

 <div class="card-container">

    <span class="event-prev">&#10094;</span>

        <div class="inner-card-container" id="events-container">


        <?php

            $sql= "SELECT date, artist, description FROM event LIMIT 3";
            $result= $conn->query($sql);

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '  <div class="date-container"><h2>' . date('jS', strtotime($row['date'])) . '</h2></div>';
                    echo '  <div class="card-content">';
                    echo '    <h3>' . htmlspecialchars($row['artist']) . '</h3>';
                    echo '    <p>' . htmlspecialchars($row['description']) . '</p>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No events available at this time.</p>';
            }
            ?>

        
            <!-- <div class="card">
                <div class="date-container">
                    <h2>14th</h2>
                </div>
                
                <div class="card-content">
                    <h3>Visible Thugs</h3>
                    <p>Event 1 description. Something about the event.</p>
                </div>
            </div>
            <div class="card">
                <div class="date-container">
                    <h2>15th</h2>
                </div>
                
                <div class="card-content">
                    <h3>Wayne Dickson</h3>
                    <p>Event 1 description. Something about the event.</p>
                </div>
            </div>
            <div class="card">
                <div class="date-container">
                    <h2>21st</h2>
                </div>
                
                <div class="card-content">
                    <h3>Lani O'Heal</h3>
                    <p>Dumfries' scrappiest DJ healing you through a selection of soulful records.</p>
                </div>
            </div> -->

        </div>
    


    <span class="event-next">&#10095;</span>

    
    <!-- Add more cards as needed -->
</div>


        <!-- long cards for bento layout -->
    <div class="long-card">
        <h2 class="sub-title sub-title-event">Regular DJs</h2>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quaerat eos, consequuntur quos nisi ullam? Illo magnam nobis dicta hic corporis mollitia modi assumenda, distinctio culpa dolor repudiandae nam architecto minima laudantium cupiditate dolore quia dignissimos, est provident, laboriosam blanditiis!</p>

        
    </div>
    
    <!-- SHOULD THIS BE IN THE DIV? -->
    <button class="display-events-button"><a href="#">DJ Nights</a></button>
    <!-- FOLK NIGHT -->
    <div class="long-card">
        <h2 class="sub-title sub-title-event sub-title-folk">Monday Folk Jam</h2>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quaerat eos, consequuntur quos nisi ullam? Illo magnam nobis dicta hic corporis mollitia modi assumenda, distinctio culpa dolor repudiandae nam architecto minima laudantium cupiditate dolore quia dignissimos, est provident, laboriosam blanditiis!</p>

        <img src="" alt="" class="event-img">
    </div>

    </span>

    <div class="text-container-home">
        </div>

        <div class="bento-box-events">
            <div class="grid1"><img src="photos/bento_box_images/photo10.png" alt="" srcset=""></div>
            <div class="grid2"><img src="photos/bento_box_images/steph.jpg" alt="" srcset=""></div>
            <!-- <div class="grid3"><img src="photos/bento_box_images/photo3.jpg" alt="" srcset=""></div> -->
            <div class="grid4"><img src="photos/bento_box_images/photo4.jpg" alt="" srcset=""></div>
            <div class="grid5"><img src="photos/bento_box_images/vote.jpg" alt="" srcset=""></div>
            <div class="grid6"><img src="photos/bento_box_images/photo6.jpg" alt="" srcset=""></div>
            <div class="grid7"><img src="photos/bento_box_images/photo7.jpg" alt="" srcset=""></div>
            <div class="grid8"><img src="photos/bento_box_images/bogle.jpg" alt="" srcset=""></div>
            <div class="grid9"><img src="photos/bento_box_images/photo9.jpg" alt="" srcset=""></div>
            
        </div>


        <?php echo $footer; ?>

    
    
        <!-- <script src="script.js"></script> -->
        <script src="/dougie/assets/js/general.js"></script>

</body>
</html>