<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Library">
        
        <link rel="stylesheet" href="../main.css">
        
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
                	<a class="<?php echo ($current_page == '../index.php') ? 'active' : NULL ?>"href="../index.php">Return to User view</a>
                </li>
                <li>
                	<a class="<?php echo ($current_page == 'admin.php' || $current_page == '') ? 'active' : NULL ?>"href="admin.php">Admin</a>
                </li>
            	<li>
                	<a class="<?php echo ($current_page == 'addbook.php') ? 'active' : NULL ?>"href="addbook.php">Add books</a>
                </li>
            	<li>
                	<a class="<?php echo ($current_page == 'browse.php') ? 'active' : NULL ?>"href="browse.php">Delete books</a>
                </li>
                <li>
                    <a class="<?php echo ($current_page == 'admin_gallery.php') ? 'active' : NULL ?>"href="admin_gallery.php">Upload images</a>
                </li>
                
                <li class="login">
                    <a class="<?php echo ($current_page == 'logout.php') ? 'active' : NULL ?>"href="logout.php">Log out</a>
                </li>
                
                
            </ul>
            </div>
        </nav> 
    
        
</header>