<?php 
include('movies_db.php');
session_start();


$_SESSION['results_array'] = search($_POST['category'], $_POST['moviename']);

header('Location: /php-intro-exercise/display.php');

function search($category, $string)
{
    global $movies;
    $results = array();
    $movies_array = $movies[$category];
    for($i=0; $i<count($movies_array); $i++)
    {
        if(stristr($movies_array[$i], $string) !== false)
        {
            array_push($results, $movies_array[$i]);
        }
    }
    return $results;
}
    

?>