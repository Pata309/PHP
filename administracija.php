<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'bazaZaVijesti') or die('Error connecting to MySQL server.');
	
	if(isset($_POST['Sakrij'])){
		$query="UPDATE clanci SET vidljivo = 1 WHERE id=".$_POST['idclanka'];
		mysqli_query ($dbc, $query); 
		
	}
	if(isset($_POST['Prikazi'])){
		$query="UPDATE clanci SET vidljivo = 0 WHERE id=".$_POST['idclanka'];
		mysqli_query ($dbc, $query); 
	}
	if(isset($_POST['Obrisi'])){
		$query="DELETE FROM clanci WHERE id=".$_POST['idclanka'];
		mysqli_query ($dbc, $query); 
		echo $_POST['idclanka'];
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
					<li class=""><a href="unos.html">UNOS</a></li>
					<li class="zaobljeno2"><a href="#">ADMINISTRACIJA</a></li>
					<li><a href="registracija.html">Registracija</a></li>
					<li class="zaobljeno2"><a href="login.html">Prijavi se</a></li>
				</ul>
			</nav>
		</header>
		<main class="wrapper">
			<?php
			$dbc=mysqli_connect('localhost', 'root', '', 'bazaZaVijesti') or die ('Error! Nije spojeno na bazu.');
			 $user = $_POST['korisnickoime'];
			  $pass = md5($_POST['lozinka']);
			  $razina;
			  $sql="SELECT username, pass, razina FROM users WHERE username=? AND pass=?";
			  $stmt=mysqli_stmt_init($dbc);
			  if (mysqli_stmt_prepare($stmt, $sql)){
				/* Povezuje parametre i njihove tipove s statement objektom */
				mysqli_stmt_bind_param($stmt,'ss',$user,$pass);
				/* Izvršava pripremljeni upit i pohranjuje rezultate */
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
			  }
			  /* Povezuje atribute iz rezultata s varijablama */
			  mysqli_stmt_bind_result($stmt, $user, $pass, $razina);
			  mysqli_stmt_fetch($stmt);
			    if (mysqli_stmt_num_rows($stmt)>0 and $razina == 2){
					$query="SELECT * FROM clanci";
					$result = mysqli_query($dbc, $query);
					while($row = mysqli_fetch_array($result)) {
						
						echo '<ul>';
						echo '<li class="bijelaSlova">';
						echo '<form action="" method="POST">';
						echo '<input name="idclanka" type="hidden" value="'.$row['id'].'">';
						
						echo $row['naslov'].'  '.$row['kategorija'].'<br>';

						if($row['vidljivo']){
							echo '<input type="submit" name="Prikazi" value="Prikazi">';
						}
						else{
							echo '<input type="submit" name="Sakrij" value="Sakrij">';
						}
						echo '<input type="submit" name="Obrisi" value="Obriši">';
						echo '</form>';
						echo '</li>';
						
						echo '</ul>';
					}
				}
				else if(mysqli_stmt_num_rows($stmt)>0 and $razina != 2){
					echo "<p>Nemate dovoljno prava za pristup ovoj stranici!</p>";
				}
				else{
					echo "<a class='bijelaSlova' href='registracija.html'>Registriraj se</a>";
				}
			  
			  
			
			

			?>
		</main>
		<div class="clear"></div>
		<footer class="wrapper">
		<p>Autor: Patricija Kuže</p>
		<p>E-MAIL: pkuze@tvz.hr</p>
		<p>Godina: 2018.</p>
		</footer>
	</body>

</html>