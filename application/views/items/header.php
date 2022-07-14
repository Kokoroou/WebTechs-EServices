<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">

    <title>Booklist</title>
    <meta name="description" content="List of books">
    <meta name="author" content="Team 20">

    <meta property="og:title" content="Simple E-Library">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://e-library.me/WebTechs-EServices/booklists">
    <meta property="og:description" content="List of book">

    <link rel="stylesheet" href="./../public/css/styles.css" type="text/css">
</head>

<body>
	
    <header>
		<div class="container">
			<span class="left">
				<h1>E-library</h1>
			</span>

			<img src="./../public/img/user/default.png" alt="User's Avatar" class="right avatar">

			<span class="right">
				<form action="./../searching/search" method="post">
					<input type="text" value="Book's name or author..." onclick="this.value=''" name="library"> <input type="submit" value="🔍">
				</form>
			</span>
		</div>
    </header>

	<article>
    
