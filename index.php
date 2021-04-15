<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Vijesti</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="wrapper">
		<header>
			<h1>Vijesti.tvz</h1>
			<img src="logo.jpg"/>
			<div class="clear"></div>
			<nav>
				<ul>
					<li class="zaobljeno1"><a href="#">Početna</a></li>
					<li><a href="onama.html">O nama</a></li>
					<li><a href="https://moj.tvz.hr/" target="_blank">Moj TVZ</a></li>
					<li><a href="unos.html">UNOS</a></li>
					<li><a href="administracija.php">ADMINISTRACIJA</a></li>
					<li><a href="registracija.html">Registracija</a></li>
					<li class="zaobljeno2"><a href="login.html">Prijavi se</a></li>
				</ul>
			</nav>
		</header>
		<main class="wrapper">
			</br></br></br></br></br>
			<?php
			$dbc=mysqli_connect('localhost', 'root', '', 'bazaZaVijesti') or die ('Error! Nije spojeno na bazu.');
			$query="SELECT * FROM clanci WHERE vidljivo = 0";
			$result = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($result)) {
				
				echo '<article>';
				echo '<h3>'.$row['naslov'].'</h3>';
				echo '<p>'.$row['sazetak'].'</p>';
				echo '<p>'.$row['vijest'].'</p>';
				echo '<p>'.$row['kategorija'].'</p>';
				echo '</article>';
			}
			

			?>
			<iframe class="video" width="45%" height="315" src="https://www.youtube.com/embed/OLh5nZbDhS8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.788887448871!2d15.966758814914295!3d45.79545701930058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d68b5d094979%3A0xda8bfa8459b67560!2sUl.+Vrbik+VIII%2C+10000%2C+Zagreb!5e0!3m2!1shr!2shr!4v1522162480993" width="45%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
		</main>
		<div class="clear"></div>
		<footer class="wrapper">
		<p>Autor: Patricija Kuže</p>
		<p>E-MAIL: pkuze@tvz.hr</p>
		<p>Godina: 2018.</p>
		</footer>
	</body>

</html>