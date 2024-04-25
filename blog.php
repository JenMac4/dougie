<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'function.php';

$conn = connect();
$navBar = navbar();
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
    <?php echo $navBar ?>

    <?php 
        $sql = "SELECT blogID, title, text FROM blogPosts";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["blogID"] . " - Name: " . $row["title"] . " " . "<br>";
            }
        } else {
            echo "0 results";
        }
        
        // Close connection
        $conn->close();

    ?>

    <section class="body-container">

        
        
        <?php echo $headerImage ?>
        
        
        <h1 class="sub-title">Blog</h1>

        <section class="blog-grid">
    
        <div class="main-article">
            <img src="photos/blogPhotos/devine.jpg" alt="" class="blog-image">
    
            <div class="blog-card-text">
                <h1 class="blog-card-title">Queens in the Douglas</h1>
                <p class="blog-card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi delectus alias praesentium. Exercitationem eum eaque ad, iste debitis at enim.</p>
            </div>
        </div>

        <!-- regulat cards -->
    
        <div class="blog-card">
            <img src="photos/blogPhotos/jamesRobJen1.jpg" alt="" class="blog-image">
    
            <div class="blog-card-text">
                <h3 class="blog-card-title">blog piece</h3>
                <!-- <p class="blog-card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi delectus alias praesentium. Exercitationem eum eaque ad, iste debitis at enim.</p> -->
                <a href="#" class="button">Click Me!</a>
                
            </div>
        </div>
        
        <div class="blog-card">
            <img src="photos/blogPhotos/jamesRobJen1.jpg" alt="" class="blog-image">
            
            <div class="blog-card-text">
                <h3 class="blog-card-title">blog piece</h3>
                <a href="#" class="button">Click Me!</a>
                <!-- <p class="blog-card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi delectus alias praesentium. Exercitationem eum eaque ad, iste debitis at enim.</p> -->
            </div>
        </div>
        
        <div class="blog-card">
            <img src="photos/blogPhotos/jamesRobJen1.jpg" alt="" class="blog-image">
            
            <div class="blog-card-text">
                <h3 class="blog-card-title">blog piece</h3>
                <a href="#" class="button">Click Me!</a>
                <!-- <p class="blog-card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi delectus alias praesentium. Exercitationem eum eaque ad, iste debitis at enim.</p> -->
            </div>
        </div>
        
        <div class="blog-card">
            <img src="photos/blogPhotos/jamesRobJen1.jpg" alt="" class="blog-image">
            
            <div class="blog-card-text">
                <h3 class="blog-card-title">blog piece</h3>
                <a href="#" class="button">Click Me!</a>
                <!-- <p class="blog-card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi delectus alias praesentium. Exercitationem eum eaque ad, iste debitis at enim.</p> -->
            </div>
        </div>
        
        
        
    </section>
</section>


    <?php echo $footer ?>
    
</body>
</html>