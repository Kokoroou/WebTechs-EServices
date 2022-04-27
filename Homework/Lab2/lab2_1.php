<?php 

	$name = $_POST["name"];
	$class = $_POST["class"];
	$university = $_POST["university"];
	$hobbies = array();

	$movies = $_POST["movies"];
	if($movies == "Yes") array_push($hobbies,"Movies");

	$cooking = $_POST["cooking"];
	if($cooking == "Yes") array_push($hobbies,"Cooking");

	$mangas = $_POST["mangas"];
	if($mangas == "Yes") array_push($hobbies,"Mangas");

	$game = $_POST["game"];
	if($game == "Yes") array_push($hobbies,"Game");

	$cycling = $_POST["cycling"];
	if($cycling == "Yes") array_push($hobbies,"Cycling");

	$swimming = $_POST["swimming"];
	if($swimming == "Yes") array_push($hobbies,"Swimming");

	$jogging = $_POST["jogging"];
	if($jogging == "Yes") array_push($hobbies,"Jogging");

	print "Hello, $name <br />";
	print "You are studing at $class, $university <br />";
	print "Your hobby is :  <br />";
	foreach ($hobbies as $i) {
		print "- $i <br />";
	}
    
 ?>
 