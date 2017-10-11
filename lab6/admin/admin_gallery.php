<?php
    include("config.php");
    include("adminHeader.php");
?>

<div class="gallery">

<!--- reference: Juliver Galleto at https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them ---!>
   
<?php

    session_start();
    if (!isset($_SESSION['username'])) {
        header("main_login.php");
    }

    include("fileUpload.php");
    
    
?>
    
</div>

<?php
    include("../footer.php");
?>
