<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


    function connect(){

        //XAMPP LOGIN DETAILS
        $HOSTNAME ='localhost';
        $USERNAME = 'root';
        $PASSWORD ='';
        $EMAIL = 'test@jentesting.com';
        $DATABASE = 'dougie';

        // IS IT CON OR CONN
        // It is CONN
        $conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

        if($conn->connect_error){
            die("connection error" . $conn->connect_error) ;
        }

        return $conn;
    }

    function navbar(){
        $navbar='<header>

        <div class="header">
    
            <div class="navbar">
                <img src="photos/cleaner-dougie-logo.png" alt="Logo" class="logo">
                <!-- <h3 class="header-logo">The Douglas Arms</h3> -->
                <div class="nav-links" id="navLinks">
                    <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
                        <i class="fa fa-bars"></i> <!-- This uses Font Awesome for the hamburger icon -->
                    </a>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="event.php">Events</a></li>
                        <li><a href="blog.php" id="final-nav-element">Blog</a></li>
                    </ul>
                </div>
            </div>
    
        </div>

    </header>';

    return $navbar;

    }
    
    function generateBackgroundImage(){
       
        $page = basename($_SERVER['PHP_SELF']);

        // Initialize the class suffix
        $classSuffix = '';

    switch ($page) {
        case 'index.php':
            $classSuffix = 'home';
            break;
        case 'about.php':
            $classSuffix = 'about';
            break;
        case 'contact.php':
            $classSuffix = 'contact';
            break;
        case 'blog.php':
            $classSuffix = 'blog';
            break;
        default:
            $classSuffix = 'default';
            break;
    }

        $header='<div class="banner-' . $classSuffix . ' banner">
        <h1 class="banner-text">blog</h1>
        </div>';

        return $header;

    }

    function footer(){
        $footer='<footer>
        <div class="footer-content">
            <div class="footer-address">
                <p>The Douglas Arms<br>
                75 Friars Vennel,<br>
                Dumfries, DG1 2RQ</p>
            </div>
            <div class="footer-social">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>';

    return $footer;
    }
    
?>