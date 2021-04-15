<?php
	$naslov=$_POST['naslovVijesti'];
	$kratakSadrzaj=$_POST['sazetakVijesti'];
	$vijesti=$_POST['tekstVijesti'];
	$kategorija=$_POST['kategorija'];
	$sakrijVijesti=$_POST['sakrijVijesti'];
	echo $sakrijVijesti;
	$vidljivo=$_POST['sakrijVijesti'];
	if($vidljivo){
		$isVidljivo=1;
	}
	else{
		$isVidljivo=0;
	}
	
	
?>
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
					<li class="zaobljeno1"><a href="index.php">Početna</a></li>
					<li><a href="onama.html">O nama</a></li>
					<li><a href="https://moj.tvz.hr/" target="_blank">Moj TVZ</a></li>
					<li><a href="unos.html">UNOS</a></li>
					<li class="zaobljeno2"><a href="administracija.php">ADMINISTRACIJA</a></li>
				</ul>
			</nav>
		</header>
		<main class="wrapper">
			<article>
				<?php
					echo '<h1>'.$naslov.'</h1>';
					echo '<p>'.$kratakSadrzaj.'</p>';
					echo '<p>'.$vijesti.'</p>';
					echo '<p>'.$kategorija.'</p>';
					echo '<p>'.$sakrijVijesti.'</p>';
					if($vidljivo){
						echo"<p>Članak je vidljiv!</p>";
					}
					else{
						echo"<p>Članak nije vidljiv!</p>";
					}
					$dbc = mysqli_connect('localhost', 'root', '', 'bazaZaVijesti') or die('Error connecting to
					MySQL server.');
					$query="INSERT INTO clanci(naslov, sazetak, vijest, kategorija, vidljivo)
					VALUES ('$naslov', '$kratakSadrzaj','$vijesti','$kategorija', '$isVidljivo')";
					if(mysqli_query ($dbc, $query)){
						echo "Članak dodan u bazu";
					}else
						{echo "Error: " .$query. "<br>" .mysqli_error($dbc);
					}
					mysqli_close($dbc)
				?>
			</article>
		</main>
		<footer class="wrapper">
		<p>Autor: Patricija Kuže</p>
		<p>E-MAIL: pkuze@tvz.hr</p>
		<p>Godina: 2018.</p>
		</footer>
	</body>
	

</html>