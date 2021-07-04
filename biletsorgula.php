<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<title>YOLCU TURİZM</title>
</head>
<body>

	<?php 
     //Burada kalkış ve varış şehirlerinin aynı olması durumunda alert ile  hata veriliyor.
    //Tarih boş giriliyorsa hata veriliyor
     echo '<script language="JavaScript">

      function sehirBul()
    {
         if (document.sehirFrm.sehirler1.value == document.sehirFrm.sehirler2.value)
            {
              alert("Kalkış ve varış şehirleri aynı olamaz. Lütfen bilgilerinizi değiştirin.... ");
              return false;
            }
            if (document.sehirFrm.sTarih.value == "")
            {
              alert("Tarih seçiniz.... ");
              return false;
            }
        return true;
    }

    </script>';

     echo '<form method="POST" name="sehirFrm"  onsubmit=" return sehirBul()">';
     echo '&#160; &#160; &#160; &#160; &#160; &#160;';
     //Combo box ile veritabanındaki şehirleri çekiyoruz
     echo ' KALKIŞ : &#160;&#160; <select name="sehirler1" id="sehirler">';
 
     $db = mysqli_connect("localhost","root","","odev","3308");
     $sorgu = "select * from sehir ";   
     $veri = mysqli_query($db,$sorgu);

     if ($veri) {
     	 while ($row = mysqli_fetch_assoc($veri)) {
     	 	echo ' <option>'.$row["Ad"].'</option>';
     	 }
     }
     
        echo ' </select>';
        echo '&#160; &#160; &#160; &#160; &#160; ';
        echo 'VARIŞ :  &#160;&#160; <select name="sehirler2" id="sehirler">';
 
     $db = mysqli_connect("localhost","root","","odev","3308");
     $sorgu = "select * from sehir ";   
     $veri = mysqli_query($db,$sorgu);

     if ($veri) {
     	 while ($row = mysqli_fetch_assoc($veri)) {
     	 	echo ' <option>'.$row["Ad"].'</option>';
     	 }
     }
     
        echo ' </select>';
 
      echo '&#160; &#160; &#160; &#160;'; 
      echo 'Tarih : &#160; &#160; &#160; <input type="date" name="sTarih">';
      echo '&#160; &#160; &#160; &#160;';

      echo '  <button  type="submit" name="btn" value="bul" class="btn btn-outline-info">ARA</button> ';

      echo '</form>'; 
     
     //Ara butonuna basınca seçilen kalkış ve varış yerine veritabanında olan verilerle karşılaştırarak tabloda gösteriliyor.
     if ($_POST) {

         $db = mysqli_connect("localhost","root","","odev","3308");
          $Kalkis=$_POST["sehirler1"];
          $Varis=$_POST["sehirler2"];
          $Tarih = $_POST["sTarih"];
          $sorgu = mysqli_query($db, "SELECT * FROM sefer WHERE Tarih like '".$Tarih."%' and KalkisSehiri = '".$Kalkis."' and VarisSehiri = '".$Varis."'");
         
       if($sorgu)
            {
                $otobusler = mysqli_fetch_all($sorgu, MYSQLI_ASSOC);

                if($otobusler == null)
                {
                    echo "bulunamadı";
                }
                else
                {
                    //Bilet Sorgula yapmak için Bilgileri tabloda göstererek bilet al sayfasına yönlendiriliyor.
                	echo "<form action='biletal.php' method='POST'>";
                	echo "<div class='container mt-3'";
                    echo "<br>"."<br>"."<table border='1' width='1000px' align='center' class='table table-striped table-dark'>";//table-dark 
                    echo "<thead>"."<center>"."<b>"."SEFERLER TABLOSU"."</b>"."</center>"."</thead>"."<br>";
                    echo "<tr>";
                    echo "<th>"."FİRMA ADI"."</th>";
                    echo "<th>"."ARAÇ PLAKASI"."</th>";
                    echo "<th>"."KALKIŞ YERİ"."</th>";
                    echo "<th>"."VARIŞ YERİ"."</th>";
                    echo "<th>"."KALKIŞ Tarihi"."</th>";
                    echo "<th>"."KALKIŞ SAATİ"."</th>";
                    echo "<th>"."KOLTUK SAYISI"."</th>";
                    echo "<th></th>";
                    echo "</tr>";
                    

                    foreach($otobusler as $otobus)
                    {
                        echo "<tr>";
                        echo "<td>".$otobus["FirmaAd"]."</td>";
                        echo "<td>".$otobus["Plaka"]."</td>";
                        echo "<td>".$otobus["KalkisSehiri"]."</td>";
                        echo "<td>".$otobus["VarisSehiri"]."</td>";
                        echo "<td>".$otobus["Tarih"]."</td>";
                        echo "<td>".$otobus["Saat"]."</td>";
                        echo "<td>".$otobus["Koltuk"]."</td>";
                       echo "<td>
                        <button  type='submit' name='btn' value='".$otobus["Plaka"]."' class='btn btn-light'>ARA</button></td>";
                        echo "</tr>";
                        echo "</div>";
                    }
                    echo "</table>";
                    echo "</form>";
                }
            }
            else
            {
               echo "asdfghgfasdfg";
            }   
     }

	?>

</body>
</html>