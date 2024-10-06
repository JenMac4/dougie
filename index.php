<?php

    require_once('function.php');

    $navBar = navbar();
    $footer = footer();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dumfries' Pub</title>

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

    <?php echo $navBar ?>

    <span class="body-container">

        <!-- <div class="banner-home banner"></div> -->

        <h1 class="header-text header-text-home">The   Dougie   Arms</h1>


        <div class="text-container-home">

            <!-- WE NEED TO MAKE THIS A H1 BUT THEN SCALE THE SIZE DOWN FOR OPTIMIZING SEO -->
            
            <h1 class="sub-title">Dumfries' Favourite Pub</h1>
            <p class="site-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis facilis amet veritatis, blanditiis deserunt molestias maiores minima nemo facere possimus. Aperiam fuga minima, ex sequi voluptatum laborum accusamus? Esse nobis eos laudantium culpa perferendis hic laborum sunt ut, reprehenderit, odit sapiente nam! Repudiandae exercitationem incidunt labore dolor illum! Ullam, dolorum.</p>


            <!-- THIS IS GPT CODE SO BE CAREFUL -->

            <!-- openning times title -->

            


            <!-- PHOTO GALLERY -->
    <div class="main">

        <div class="gallery">
			<div class="img">
				<img src="photos/jenRobJames.jpg" />
			</div>
			<div class="img">
				<img src="photos/meg.jpg" />
			</div>
			<div class="img">
				<img src="photos/newYear.jpg" />
			</div>
			<div class="img">
				<img src="photos/placeHolderDougie.png" />
			</div>
			<div class="img">
				<img src="photos/dougieStaff.jpg" />
			</div>
			<div class="img img-hide">
				<img src="photos/blogPhotos/devine.jpg" />
			</div>
			<div class="img img-hide">
				<img src="photos/ny.jpg" />
			</div>
			<div class="img img-hide">
				<img src="photos/blogPhotos/jamesRobJen.jpg" />
			</div>
			<div class="img img-hide">
				<img src="photos/blogPhotos/jamesRobJen.jpg" />
			</div>
	
		</div>
    </div>


            


    <!-- <div class="opening-times-title-container">
        <h3 class="opening-times-title">Opening Times</h3>

    </div> -->
    
    <div class="week-days">
      <div class="day monday">Monday<br>5 PM - 11 PM</div>
      <div class="day tuesday">Tuesday<br>3 PM - 11 PM</div>
      <div class="day wednesday">Wednesday<br>3 PM - 12 PM</div>
      <div class="day thursday">Thursday<br>3 PM - 1 AM</div>
      <div class="day friday">Friday<br>1 PM - 1 AM</div>
      <div class="day saturday">Saturday<br>1 PM - 1 AM</div>
      <div class="day sunday">Sunday<br>1 PM - 11 PM</div>
    </div>

            <div class="location-reviews-section">
                <div class="reviews">
                    <h3>What the Punters Say</h3>
                    <p>"Great experience, very insightful!" - Jane Doe</p>
                    <p>"Loved the staff and the service was excellent." - John Smith</p>
                    <p>"Perfect place for families." - Mary Johnson</p>
        <!-- Add more reviews as needed -->
                </div>
                <div class="map">
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.9173047708357!2d-122.084249384691!3d37.42206597982068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb0ca6b685b17%3A0x7057c9bec28e659!2sGoogleplex!5e0!3m2!1sen!2sus!4v1615449356712!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2284.495415299919!2d-3.6168547231614814!3d55.069574522838906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4862ca13390f393f%3A0x105aecb1d3a20545!2sThe%20Dougie%20Arms!5e0!3m2!1sen!2suk!4v1713769413764!5m2!1sen!2suk" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

                    



            <!-- BENTO BOX -->

            <!-- <div class="bento-box">
              <div class="grid-item item1">
                <img class="logo-images" src="photos/logos/Tennents-logo.png" alt="">
                <img class="logo-images" src="photos/logos/Staropramen_logo.svg" alt="">
                <img class="logo-images" src="photos/logos/aspall.png" alt="">
              </div>

              <div class="grid-item item2">
                <iframe class="map-grid" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2284.495415299919!2d-3.6168547231614814!3d55.069574522838906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4862ca13390f393f%3A0x105aecb1d3a20545!2sThe%20Dougie%20Arms!5e0!3m2!1sen!2suk!4v1713769413764!5m2!1sen!2suk" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>

              <div class="grid-item item3">Item 3</div>
              <div class="grid-item item4">
                <p class="bento-review">Great bar. Mega friendly staff and great music.</p>
              </div>
              
            </div> -->






            

            

    </span>


    
</div>

<?php echo $footer ?>
    

  <!-- <script src="script.js"></script>   -->
  <script src="/dougie/assets/js/general.js"></script>

</body>
</html>