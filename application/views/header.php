<body>
	<?php
		function getAvatarPath() {
			$user_id = $_SESSION["user_id"];

			if (file_exists('./../public/img/user/' . $user_id . '.png')) {
				$path = './public/img/user/' . $user_id . '.png';
			}
			else if (file_exists('./../public/img/user/' . $user_id . '.jpg')) {
				$path = './public/img/user/' . $user_id . '.jpg';
			}
			else {
				$path = './public/img/user/default.png';
			}
			return $path;
		}
	?>
	
	<header>
		<div class="container">
			<span class="left">
				<a href="./">
			<img src="./public/img/global/logo.png" alt="Logo" height="50px">
		</a>
			</span>

		<?php
			if (isset($_SESSION["user_id"])) {
				print '
					<span class="right">
					<a href="./account/">
						<img src="' . getAvatarPath() . '" alt="User\'s Avatar" class="right avatar">
					</a>
					</span>

					<span class="right">
					<a href="./booklist/">
						<img src="./public/img/global/booklist.png" alt="Booklist" class="right avatar">
					</a>
					</span>
				';
				if ($_SESSION["user_type"] == "librarian") {
					print '
					<span class="right">
					<a href="./librarian/">
						<img src="./public/img/global/library.png" alt="Library" class="right avatar">
					</a>
					</span>
					';
				}
			}
			else {
				print '
					<span class="right">
					<a href="./login">Login</a>
					</span>
				';
			}
		?>

		<span class="center">
				<form action="./searching" method="get">
					<input type="text" placeholder="Book's name..." name="query"> <input type="submit" value="🔍">
				</form>
			</span>

			

			
		</div>
	</header>

	<nav></nav>

	<article>
