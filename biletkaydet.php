<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>


<?php
//Bilet al tıkladıktan sonra veriler veri tabanına kayıt edilir.
if ($_POST["btn"]) {
	session_start();
    $db = mysqli_connect("localhost","root","","odev","3308");
   
    $koltuk = $_POST["btn"];
    $plaka = $_SESSION["Plaka"];
    $tarih = $_SESSION["Tarih"]; 
    $kalkis = $_SESSION["Kalkis"];
    $varis = $_SESSION["Varis"];   
    $mail = $_SESSION["KullaniciMail"]; 
    $TC = $_SESSION["TC"]; 
    $saat = $_SESSION["Saat"]; 
 
 //Sefer numarası random olarak atandı
    $karakterler = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $seferno = "SFRN ";
    for($i = 0 ; $i < 4 ; $i++){
                $seferno .= $karakterler[rand(0, strlen($karakterler) - 1)];
            }

    $sorgu = "insert into bilet (TC,SeferNumarasi,Plaka,AlinanKoltuk,Tarih,Saat) values ('$TC','$seferno','$plaka','$koltuk','$tarih','$saat')"; 
     /*echo $sorgu;
      echo "<br>";
      echo "<br>";
      echo $koltuk.$plaka.$tarih.$kalkis.$varis;*/	
      
     $veri = mysqli_query($db,$sorgu);
      
   if ($veri) {
            //kullaniciadi_bilet.txt veri kaydetme
             $sorgu="select * from bilet";
             $result = mysqli_query($db,$sorgu);
             if ($result) {
           
                 $dosya = fopen("kullaniciadi_bilet.txt","w");
                 

                while ($row = mysqli_fetch_assoc($result)) {
                    fwrite($dosya, $row["TC"]." ".$row["SeferNumarasi"]." ".$row["Plaka"]." ".$row["AlinanKoltuk"]." ".$row["Tarih"]."\n");
                 }
             fclose($dosya);
             }
            


     	        //Eğer bilgiler doğru ise bilet alındınız mesajı ekranda gözükecek.
     	echo 
     	"<script language='JavaScript'>
              alert('Sefer Numaranız : ".$seferno.".  Tarihi ".$tarih." kalkış yeri ".$kalkis."  varış yeri ".$varis."  olan koltuk numarası ".$koltuk." olarak  biletiniz alınmıştır.');  </script>";

              header("Refresh:0.02 ; url=biletsorgula.php");
             
     }else{
     	//Eğer yanlışsa hata verdirip bir önceki sayfaya yönlendirecek.
     	echo '<script language="JavaScript">
              alert("Bilet alamadınız. Lütfen  tekrar kontrol ediniz");
               history.go(-1);   
              </script>';
     }

}


?>
</body>
</html>

 