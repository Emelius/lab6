<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Library">
        
        <link rel="stylesheet" href="main.css">
        
        <link href="https://fonts.googleapis.com/css?family=Lato:400,900|Open+Sans:300,400,700" rel="stylesheet">
    </head> 

<header> 
            <h1>
                BOOK-IT
            </h1>
        
        <nav>
            <div class="navigationbox">
            <ul>
            	<li>
                	<a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>"href="index.php">Home</a>
                </li>
            	<li>
                	<a class="<?php echo ($current_page == 'about.php') ? 'active' : NULL ?>"href="about.php">About Us</a>
                </li>
            	<li>
                	<a class="<?php echo ($current_page == 'browse.php') ? 'active' : NULL ?>"href="browse.php">Browse Books</a>
                </li>
            	<li>
                	<a class="<?php echo ($current_page == 'books.php') ? 'active' : NULL ?>"href="books.php">My Books</a>
                </li>
                <li>
                	<a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>"href="contact.php">Contact</a>
                </li>
                <li>
                    <a class="<?php echo ($current_page == 'gallery.php') ? 'active' : NULL ?>"href="gallery.php">Gallery</a>
                </li>
                
                <li class="login">
                    <a class="<?php echo ($current_page == 'loginpage.php') ? 'active' : NULL ?>"href="loginpage.php">Log in</a>
                </li>
                
                
            </ul>
            </div>
        </nav> 
    
        
</header>