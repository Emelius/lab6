<?php
    include("config.php");
    include("header.php");
?>

<div class="gallery">

<!--- reference: Juliver Galleto at https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them ---!>
   
<?php

    session_start();
    if (!isset($_SESSION['username'])) {
        header("main_login.php");
    }
    
    $directory = "uploadedfiles";
    $images = scandir($directory);
    $ignore = Array(".", "..", ".DS_Store");

    foreach($images as $currentimg){
        if(!in_array($currentimg, $ignore)) {
            echo "<div class='imageContainer'>";
            echo "<div class='imageInner'>";
            echo "<img src='uploadedfiles/$currentimg' /><br>\n";
            echo "</div></div>";
        };
    }
    
?>
    
</div>

<?php
    include("footer.php");
?>

</body>