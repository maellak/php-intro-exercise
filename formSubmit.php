<?php
/*
 * formSubmit.php
 * 
 * Copyright 2014 giannis <giannis@giannis64>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Ταινίες αποτέλεσμα</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
</head>

<body>
	<?php 
	$movies = [
	"comedy" => ["The Hangover","Knocked Up","Due Date"],
	"drama" => ["The Shawshank Redemption","The Green Mile","Requiem for a Dream"],
	"horror" => ["Halloween","The Conjuring","The Shining"]
	];
	
	$movieSearch = $_POST['movieΝame'];
	$movieCategories = $_POST['movieCategories'];
	
	foreach ($movies as $key=>$value)
	{
		if($key===$movieCategories) {
			$i=1;
			foreach ($value as $movieValue) {
				if(strpos($movieValue,$movieSearch)!==false)
					echo $i++ .'. '. $movieValue.'</br>';
			}
		}
	}
	?>
	


</body>

</html>
