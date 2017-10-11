<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:../index.php");
}
?>

<?php 
include("config.php"); 
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

