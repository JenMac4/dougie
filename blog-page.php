<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once 'function.php';

    $conn = connect();
    $navBar = navbar();
    $headerImage = generateBackgroundImage();
    $footer = footer();

    if(isset($_GET['blogID'])){
        $blogID = 'blogID';

        $blogID = securityChecksString($blogID);
        $sql = 'SELECT * FROM `blogPosts` WHERE eventID = ?';

        //prepared statement to avoid injection via url
        //changed con to $conn
        $stmt = $conn->prepare($sql);
        $stmt-> bind_param('i', $event_id);
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
    
    <?php echo $footer ?>
</body>
</html>