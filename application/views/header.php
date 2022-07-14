<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">

    <title></title>
    <meta name="description" content="">
    <meta name="author" content="Team 20">

    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta property="og:url" content=<?php print (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
                                    . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>>

    <script type="text/javascript">
        function set_title(title) {
          document.getElementsByTagName("title")[0].innerHTML = title;
          document.querySelector('[property="og:title"]').content = title;
        }

        function set_description(description) {
          document.querySelector('[name="description"]').content = description;
          document.querySelector('[property="og:description"]').content = description;
        }

        set_title("E-library");
        set_description("A place where you find some of your favorite books");
    </script>

    <link rel="stylesheet" href="./public/css/styles.css" type="text/css">
</head>

<body>
	
  <header>
		<div class="container">
			<span class="left">
				<h1>E-library</h1>
			</span>

			<img src="./public/img/user/default.png" alt="User's Avatar" class="right avatar">

			<span class="right">
				<form action="./searching/search" method="post">
					<input type="text" value="Book's name or author..." onclick="this.value=''" name="library"> <input type="submit" value="🔍">
				</form>
			</span>
		</div>
  </header>

  <nav></nav>

	<article>
    <section></section>
    <section></section>
