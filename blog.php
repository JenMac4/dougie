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

    

    <section class="body-container">

        
        
        <!-- <?php echo $headerImage ?> -->

        <h1 class="header-text-blog header-text">BLOGS</h1>

        <!-- <h1 class="banner-text">blog</h1> -->
        
        
        <!-- <h1 class="sub-title">Blog</h1> -->

        <section class="blog-grid">
    
        <?php

$sql = "SELECT blogID, title, text, photo FROM blogPosts";
$result = $conn->query($sql);
$first = true;

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        if ($first) {
            echo '<div class="main-article">';
            // echo '<img src="photos/blogPhotos/devine.jpg" alt="" class="blog-image">';
            echo '<img src="' .htmlspecialchars($row["photo"]) . '" alt="" class="blog-image">'; 
            echo '<div class="blog-card-text">';
            echo '<h1 class="blog-card-title-main">' . htmlspecialchars($row["title"]) . '</h1>';
            echo '<p class="blog-card-text">' . htmlspecialchars($row["text"]) . '</p>';
            // why HAS THIS MADE ALL OF THE OTHER TITLES GO BLUE?
            echo '<button class="read-more-button"><a href=blog-page.php?blogID=' . htmlspecialchars($row['blogID']) . '>readmore</a></button>';
            echo '</div>';
            echo '</div>';
            $first = false;
        } else {
            echo '<div class="blog-card">';
            // echo '<img src="photos/blogPhotos/default.jpg" alt="" class="blog-image">'; // Adjust or use a dynamic src if available
            echo '<img src="' .htmlspecialchars($row["photo"]) . '" alt="" class="blog-image">'; // Adjust or use a dynamic src if available
            echo '<div class="blog-card-text">';
            echo '<h3 class="blog-card-title"><a href="blog-page.php?blogID=' . htmlspecialchars($row['blogID']) . '">' . htmlspecialchars($row["title"]) . '</a></h3>';
            // echo '<p class="blog-card-text">' . htmlspecialchars($row["text"]) . '</p>';
            echo '</div>';
            echo '</div>';
            }
        }
    } else {
    echo '<p>No blog posts found.</p>';
}
// Close connection
    $conn->close(); 

        ?>
        
        
        
    </section>
</section>


    <?php echo $footer ?>
    
    <script src="/dougie/assets/js/general.js"></script>
</body>
</html>