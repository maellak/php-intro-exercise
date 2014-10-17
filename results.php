<style type="text/css">
  #result{
font-family: Arial;font-size: 15px; font-weight:bold;
position: relative;
  top:200px;
  vertical-align:text-top;
  transform: translateY(-50%);
text-align:center

}
</style>
<?php

$movies = array();
	$drama = array();
	array_push($drama, "The Shawshank Redemption");
	array_push($drama, "The Green Mile");
	array_push($drama, "Requiem for a Dream");
	$comedy = array();
	array_push($comedy, "The Hangover");
	array_push($comedy, "Knocked Up");
	array_push($comedy, "Due Date");
	$horror = array();
	array_push($horror, "Halloween");
	array_push($horror, "The Conjuring");
	array_push($horror, "The Shining");
           array_push($movies,$drama);
           array_push($movies,$comedy);
           array_push($movies,$horror);
       
$movie_type=$_POST['list'];
$moviestxt=$_POST['search_text'];

if($moviestxt!="")
{

	if ($movie_type =='Drama') 
	{
		for($i=0;$i<3;$i++)
			if(stristr($movies[0][$i],$moviestxt) == TRUE) 
				echo "<div id='result'>".$movies[0][$i]."</div><br>";
	}

	elseif ($movie_type == 'Comedy') 
	{
		for($i=0;$i<3;$i++)
			if(stristr($movies[1][$i], $moviestxt) == TRUE) 
				echo "<div id='result'>".$movies[1][$i]."</div><br>";
	}

	elseif ($movie_type == 'Horror') 	
	{
		for($i=0;$i<3;$i++)
			if(stristr($movies[2][$i], $moviestxt) == TRUE) 
				echo "<div id='result'>".$movies[2][$i]."</div><br>";
	}

	else echo "Movie not found!";
}

else echo "<div id='result' style='color:red'>Please insert a string</div>";

echo "<div id='result'><a href='index.html'>Return to search form</a></div>";

?>