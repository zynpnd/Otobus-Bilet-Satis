<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<title>Bilet</title>
	
</head>
<style type="text/css">
  .cerceve{
    margin-left: 10px;
    padding-left: 10px;
    margin-top: 10px;
  }
</style>

<body>
   <?php
 //Biletlerimden alınan bilgilere göre servis seferkayitvericekme.php gönderiliyor
    echo '
   		<form action="service/seferkayitvericekme.php" method="POST">
   		<div class="cerceve">
   			<input type="text" name="tc" placeholder="TC" required>
   			<input type="text" name="sefernumarasi" placeholder="Sefer Numarası" required>
   			<input type="date" name="tarih" required>
   			<input type="time" name="saat" required>
   			<button type="submit" class="button btn-outline-info" name="btn">ARA</button>
   		</div>
   		</form>


    ';



   ?>



</body>
</html>