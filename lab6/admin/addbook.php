<?php
include("config.php");
$title = "Add new book";
include("adminHeader.php");
?>

<?php
if (isset($_POST['newbooktitle'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newbooktitle = trim($_POST['newbooktitle']);
    $newbookISBN = trim($_POST['newbookISBN']);
    $newbookauthor = trim($_POST['newbookauthor']);

    if (!$newbooktitle || !$newbookauthor || !$newbookISBN) {
        printf("You must specify both a title and an author");
        printf("<br><a href=addbook.php>Try again</a>");
        exit();
    }

    $newbooktitle = addslashes($newbooktitle);
    $newbookISBN = addslashes($newbookISBN);
    $newbookauthor = addslashes($newbookauthor);

    # Open the database using the "librarian" account
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an insert statement and execute it
    $stmt = $db->prepare("insert into Book values (?, ?, '', '', '', '', ?, '')");
    $stmt->bind_param('sss', $newbooktitle, $newbookISBN, $newbookauthor);
    $stmt->execute();
    printf("<br>Book Added!");
    printf("<br><a href=addbook.php>Add another</a>");
    include("../footer.php");
    exit;
}

// Not a postback, so present the book entry form
?>

<h3>Add a new book</h3>

<form action="addbook.php" method="POST">
    <table bgcolor="#eeeeee" cellpadding="6">
        <tbody>
            <tr>
                <td>Title</td>
                <td><INPUT type="text" name="newbooktitle"></td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td><INPUT type="text" name="newbookISBN"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><INPUT type="text" name="newbookauthor"></td>
            </tr>
            <tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Add Book"></td>
            </tr>
        </tbody>
    </table>
    <br>
</form>
<?php include("../footer.php"); ?>