<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<title>Bilet</title>
</head>
<body>


<?php
      if($_POST["btn"]){
        
        $db = mysqli_connect("localhost","root","","odev","3308");
      	session_start();
      	$plaka = $_POST["btn"];

      	$_SESSION["Plaka"]=$plaka;

      	$secilen = mysqli_query($db,"select * from sefer where plaka ='".$plaka."' ");


      	  if($secilen)
            {
                $koltuklar = mysqli_fetch_all($secilen, MYSQLI_ASSOC);

                if($koltuklar == null)
                {
                    echo "bulunamadı";
                }
                else
                {
                  //Alınan bilgileri tablo şeklinde gösteriliyor
                	echo "<div class='container mt-3'";
                    echo "<br>"."<br>"."<table border='1' width='1000px' align='center' class='table table-condensed'>";//table-dark 
                    echo "<thead>"."<center>"."<b>"."SEFERLER TABLOSU"."</b>"."</center>"."</thead>"."<br>";
                    echo "<tr>";
                    echo "<th>"."FİRMA ADI"."</th>";
                    echo "<th>"."ARAÇ PLAKASI"."</th>";
                    echo "<th>"."KALKIŞ YERİ"."</th>";
                    echo "<th>"."VARIŞ YERİ"."</th>";
                    echo "<th>"."KALKIŞ TARİHİ"."</th>"; 
                    echo "<th>"."KALKIŞ SAATİ"."</th>";  
                    echo "</tr>";

                     echo  "<tr>";
                     echo "<td>".$koltuklar[0]["FirmaAd"]."</td>";
                     echo "<td>".$koltuklar[0]["Plaka"]."</td>";
                     echo "<td>".$koltuklar[0]["KalkisSehiri"]."</td>";
                     echo "<td>".$koltuklar[0]["VarisSehiri"]."</td>";
                     echo "<td>".$koltuklar[0]["Tarih"]."</td>";
                      echo "<td>".$koltuklar[0]["Saat"]."</td>";
                     echo "</tr>";

                     $_SESSION["Kalkis"]=$koltuklar[0]["KalkisSehiri"];
                     $_SESSION["Varis"]=$koltuklar[0]["VarisSehiri"];
                     $_SESSION["Tarih"]=$koltuklar[0]["Tarih"];
                     $_SESSION["Saat"]=$koltuklar[0]["Saat"];

                     echo "<br>";
                     //Bilet Al düzgün gözükmesi için tablo şekline yazıldı
                     echo "</table>";
                     echo "<form action='biletkaydet.php' method='POST'>";
                	   echo "<div class='container mt-3'";
                     echo "<br>"."<br>"."<table border='1' width='1000px' align='center' class='table table-striped table-dark' style='text-align:center'>";//table-dark 

                     echo "<thead>"."<center>"."<b>"."BİLETLER TABLOSU"."</b>"."</center>"."</thead>"."<br>";
                     echo "<tr>";
                     echo "<th>"."Numara"."</th>";
                     echo "<th></th>";
                     echo "</tr>";
                    
                    //burada alınan bilete göre satır satır okuyarak satın alınacak biletleri ekranda tablo olarak gösteriyor.Dolu olan biletler gözükmüyor sadece alınacak biletler gözüküyor.
                    for ($i=0; $i <$koltuklar[0]["Koltuk"] ; $i++) {
                         $sayac=0;
                      	 $sorgu= "select AlinanKoltuk from  bilet where Plaka='".$plaka."'"; 

                      	  
                      	 $dolu =mysqli_query($db,$sorgu);
                      	 if ($dolu) {
                             //sorguyu array dizisine satır satır çekiyor.
                      	    while ($row = mysqli_fetch_array($dolu)) {
                      	          if ($row["AlinanKoltuk"] ==  ($i+1)) {     
                      	          	$sayac=1;
                      	           }	            
                               }
                               if ($sayac == 0) {
                                echo  "<tr>";
                                echo "<td>".($i+1)."</td>";
                                echo "<td> <button  type='submit' name='btn' class='button  btn-light' value='".($i+1)."' >BİLET AL </button></td>";
                               echo "</tr>";
                               echo "</tr>";
                            }  
                       
                        }
                                                 
                      }
                    

                    echo "</table>";
                    echo "</form>";
                }
            }
      }



?>
</body>
</html>