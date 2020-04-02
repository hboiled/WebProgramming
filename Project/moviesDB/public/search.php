<?php
    include "../shared/header.php";
?>
<h1>Search Movie</h1>

<p>
    You can search movies by title, genre, rating, year, or using a combination of these queries.</br>
</p>

<!-- form using POST, handle the submission on display.php -->
<form action="display.php" method="POST">
    <label for="title">Title:</label>
    <input type="text" name="title">
    <label for="genre">Genre:</label>
    <input type="text" name="genre">
    </br>
    <label for="rating">Rating:</label>
    <input type="text" name="rating">
    <label for="year">Year:</label>
    <input type="text" name="year">
    </br>
    <input type="submit" name="SubmitButton"/>
</form>

<?php
    include "../shared/footer.php";
?>