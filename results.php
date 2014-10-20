<?php

require_once("movie_search.html");

$filmdata= array("The Shawshank Redemption"=>"Drama","The Green Mile"=>"Drama","Requiem for a Dream"=>"Drama","The Hangover"=>"Comedy","Knocked Up"=>"Comedy","Due Date"=>"Comedy","Halloween"=>"Horror","The Conjuring"=>"Horror","The Shining"=>"Horror");

if ($_REQUEST['searchfield'] && $_REQUEST['searchtype']){
	$mysrc=$_REQUEST['searchfield'];
	$mytype=$_REQUEST['searchtype'];

	echo "<br/><i>Results for '".$mysrc."' - category: ".$mytype."</i><br/><br/>";
	$foundrslts=0;
	foreach($filmdata as $movie_title=>$movie_gen){
		if ($mytype==$movie_gen){
			$findst= strpos(strtolower($movie_title),strtolower($mysrc));
			if ($findst!==false){
				echo "&bull; ".$movie_title."<br/>";
				$foundrslts++;
			}
		}
	}
	if ($foundrslts==0){
		echo "Oops, nothing found";
	}
}else{
	echo "<span style=\"color:#fc0000;\">Please notice that all fields above are required.</span>";
}


?>