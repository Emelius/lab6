<?php
include("config.php");
$title = "Search Book";
include("header.php");
?>

<h3>Search the Book Catalog</h3>

<form action="reservedbooks.php" method="POST">
    <table cellpadding="6">
        <tbody>
            <tr>
                <td>Title</td>
                <td><INPUT type="text" name="searchtitle"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><INPUT type="text" name="searchauthor"></td>
            </tr>
            <tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Submit"></td>
            </tr>
        </tbody>
    </table>
</form>

<h3>Book List</h3>
<?php

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

# This is the mysqli version

$searchtitle = "";
$searchauthor = "";


if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}

//	if (!$searchtitle && !$searchauthor) {
//	  echo "You must specify either a title or an author";
//	  exit();
//	}

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);

//XSS

$searchtitle = htmlentities($searchtitle);
$searchauthor = htmlentities($searchauthor);
$searchtitle = mysqli_real_escape_string($db, $searchtitle);
$searchauthor = mysqli_real_escape_string($db, $searchauthor);

# Build the query. Users are allowed to search on title, author, or both

$query = " select ISBN, Title, Author from Book WHERE Reserved is true";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " and Title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " and Author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " and Title like '%" . $searchtitle . "%' and Author like '%" . $searchauthor . "%'"; // unfinished
}

//echo "Running the query: $query <br/>"; # For debugging


  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table border=1>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($ISBN, $Title, $Author);
    $stmt->execute();

    echo '<table bgcolor="#dddddd" cellpadding="6">';
    echo '<tr><b><td>ISBN</td> <td>Title</td> <td>Author</td><td>Return</td> </b> </tr>';
    while ($stmt->fetch()) {
        echo "<tr>";
        echo "<td> $ISBN </td><td> $Title </td><td> $Author </td>";
        echo '<td><a href="returnBook.php?ISBN=' . urlencode($ISBN) . '"> Return </a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
<br>

<?php
    include("footer.php");
?>