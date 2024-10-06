<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once 'function.php';

    $conn = connect();
    $navBar = navbar();
    $headerImage = generateBackgroundImage();
    $footer = footer();

    if(isset($_GET['blogID'])){
        $blogID = $_GET['blogID'];

        // if you want to use the below function you need to define it in function.php
        // $blogID = securityChecksString($blogID);
        $sql = 'SELECT * FROM `blogPosts` WHERE blogID = ?';

        //prepared statement to avoid injection via url
        //changed con to $conn
        $stmt = $conn->prepare($sql);
        $stmt-> bind_param('i', $blogID);
        $stmt-> execute();
        //I don't know if this is oop and I would really like to check that
        $result =$stmt->get_result();

    }

    if(!$result){
        echo "error, cannot find event in database";
    }
    else {
        // we shouldn't need a loop because we only need to get one row
        //unless we decide that we want to display other blog posts?!

        $row  = mysqli_fetch_assoc($result);
        //make sure the above is correct

        $title = $row['title'];
        $textContent = $row['text'];
        $author = $row['author'];
        $photo = $row['photo'];
        $uploaded = $row['dateOfUpload'];


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

    <?php echo $navBar ?>

    <span class="body-container">

        <span class="individual-blog-container">
    
            <img src="<?php echo $photo ?>" alt="" class="blog-image-individual">
    
            <div class="blog-post-individual-content">
                <h3 class="individual-blog-title"> <?php echo $title ?> </h3>
                
                <h6 class="individual-blog-info"> <?php echo $author . ' ' . $uploaded ?> </h3>
                <!-- <h6 class="individual-blog-upload"> <?php echo $uploaded ?> </h6> -->
                <p class="individual-blog-text"> <?php echo $textContent ?> </p>
                
            </div>
        </span>


    </span>
    
    <?php echo $footer ?>
    <script src="/dougie/assets/js/general.js"></script>

</body>
</html>