<?php 
include("config.php"); 
?>

<!----- main login ------>

<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:../index.php");
}
?>

<?php if(isset($_POST) && !empty($_POST)) : ?>

<?php 
	$myusername =  stripslashes($_POST['username']);
	$mypassword =  stripslashes($_POST['hash']);
	
	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		exit();
	}

	$stmt = $db->prepare("SELECT username, hash FROM users WHERE username = ?");
	$stmt->bind_param('s', $myusername);
	$stmt->execute();
	
    $stmt->bind_result($username, $password);

    while ($stmt->fetch()) {
        if (sha1($mypassword) == $password)
		{
			$_SESSION['username'] = $myusername;
			header("location:index.php");
			exit();
		}
    }

?>

<?php endif;?>


<!---------- admin login ---------->

<?php

@ $db = new mysqli('localhost', 'root', '', 'library');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

    #the mysqli_real_espace_string function helps us solve the SQL Injection
    #it adds forward-slashes in front of chars that we can't store in the username/pass
    #in order to excecute a SQL Injection you need to use a ' (apostrophe)
    #Basically we want to output something like \' in front, so it is ignored by code and processed as text

if (isset($_POST['username'], $_POST['userpass'])) {
    #with statement under we're making it SQL Injection-proof
    $uname = htmlentities($_POST['username']);
    $uname = mysqli_real_escape_string($db, $_POST['username']);
    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
    
    $upass = sha1($_POST['userpass']);
    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    
    //echo "SELECT * FROM users WHERE username = '{$uname}' AND hash = '{$upass}'";
    
    $query = ("SELECT * FROM users WHERE username = '{$uname}' "." AND hash = '{$upass}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
    
    
    
}
?>

<!----- form ------>

<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } else {
                echo '<h2>Welcome! Correct password.</h2>';
                header('Location: admin.php');
            }
        }
        ?>
        <h3>Log in</h3>

        <form method="POST" action="">
            <label>Username</label>
            <input type="text" name="username">
            
            <label>Password</label>
            <input type="password" name="userpass">
            
            <input type="submit" value="Sign in">
        </form>
  
    

<br>
