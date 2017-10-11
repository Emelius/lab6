<?php
    include("config.php");
    include("header.php");
?>
        
    <body>
        <div id="content">
        
        

        <main>
            <h3>
                Contact us
            </h3>
            
            <form>
                  Name:<br>
                  <input type="text" name="Title" value=""><br>
                  Email:<br>
                  <input type="text" name="Author" value=""><br>
                Message:<br>
                <textarea id="message" class="input" name="message" row="20" cols="50"></textarea>
                <br>
                  <input type="submit" value="Submit">
                </form>
        </main>
            
        <br>
        
        <?php
            include("footer.php");
        ?>
            
    </div>
</body>
