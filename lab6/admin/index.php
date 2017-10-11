 <?php
    include ("config.php");
?>

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
                	<a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>"href="index.php">Admin</a>
                </li>
                <li>
                	<a class="<?php echo ($current_page == '../index.php') ? 'active' : NULL ?>"href="../index.php">Go back to User Home</a>
                </li>
                
            </ul>
            </div>
        </nav> 
    
        
</header>
    
    
<?php
    include("admin_loginpage.php");
    include ("../footer.php");
?>