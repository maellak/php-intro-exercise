
<?php

/* The database */

/*

-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 18 Οκτ 2014 στις 01:11:05
-- Έκδοση διακομιστή: 5.6.15-log
-- Έκδοση PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Βάση δεδομένων: `php-intro-exercise-db`
--
CREATE DATABASE IF NOT EXISTS `php-intro-exercise-db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php-intro-exercise-db`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(100) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `genre` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`) VALUES
(1, 'The Shawshank Redemption', 'drama'),
(2, 'The Green Mile', 'drama'),
(3, 'Requiem for a Dream', 'drama'),
(4, 'The Hangover', 'comedy'),
(5, 'Knocked Up', 'comedy'),
(6, 'Due Date', 'comedy'),
(7, 'Halloween', 'horror'),
(8, 'The Conjuring', 'horror'),
(9, 'The Shining', 'horror');

*/


?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Εισαγωγική Άσκηση στην PHP - 2η εβδομάδα 2ου σεμιναριακού κύκλου</title>
</head>
<body>

    <form name="movie_search" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

        <input required type="search" name="search" value="" placeholder="search for a movie...">
        <select required name="genre">
            <option value="">Select Genre</option>
            <option value="drama">Drama</option>
            <option value="comedy">Comedy</option>
            <option value="horror">Horror</option>
        </select>
        <input type="submit" name="submit" value="Search">

    </form>

</body>

</html>

<?php

// Connect to the database.
$link = mysqli_connect('localhost', 'root', '5322gr5322', 'php-intro-exercise-db');
// Check if we have aby errors.
if ($link === false) {
    die('Could not connect: ' . mysqli_error());
}

// Run only if we have submitted data.
if (isset($_POST['submit']) === true) {
    $results      = array();
    $resultFound  = false;
    $genre        = $_POST['genre'];
    $search       = $_POST['search'];

    // Select the data from the table.
    $result       = mysqli_query($link, "SELECT title FROM movies WHERE genre = '$genre'");

    // Check if we have a query result, else print the error.
    if ($result === false) {
        die('Could not run query: ' . mysqli_error());
    }

    // Loop through the results.
    while($row = mysqli_fetch_row($result)) {

        // If the search string exists in the title put it in the array.
        if (strpos($row[0], $search) !== false) {
            $resultFound = true;
            $results[] = $row[0];
        }
    }
}

// Close the connection with database.
mysqli_close($link);

// If we found at least one result print a list or print error message.
if ($resultFound === true) { ?>

    <?php echo count($results).' Movies Found:'; ?>
    <ul>
        <?php
            foreach ($results as $value) {
                echo "<li>$value</li>";
            }
        ?>
    </ul>

<?php } else {

    echo 'No Movies Found!';

}

?>