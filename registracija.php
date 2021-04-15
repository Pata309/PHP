<?php
  $imeIprezime = $_POST['imeiPrezime'];
  $username = $_POST['korisnickoime'];
  $password = $_POST['lozinka1'];
  $razina = 1;
  $passwordEncripted = md5($password);
  $results;
  $dbc = mysqli_connect('localhost', 'root', '', 'bazazavijesti') or die('Error connecting to MySQL server.');
  $sql="INSERT INTO users (username, pass, ime, razina) VALUES (?, ?, ?, ?)";
  /* Inicijalizira statement objekt nad konekcijom */
  $stmt=mysqli_stmt_init($dbc);
  /* Povezuje parametre statement objekt s upitom */
  if (mysqli_stmt_prepare($stmt, $sql)){
    /* Povezuje parametre i njihove tipove s statement objektom */
    mysqli_stmt_bind_param($stmt,'sssi',$username,$passwordEncripted,$imeIprezime,$razina);
    /* Izvršava pripremljeni upit */
    mysqli_stmt_execute($stmt);
  }
  header('Location: login.html');
  exit;
  mysqli_close($dbc);
 ?>