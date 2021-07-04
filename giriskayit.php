<!DOCTYPE html>
<html>
<head>
    <title>YOLCU TURİZM</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link rel="stylesheet" type="text/css" href="kayit.css">
</head>
<body>

<?php

  if ($_POST["btn"] == "giris")  { // eğer giriş butonuna basıldıysa  giriş ekranı gelecektir
   
      echo '<form method="POST" >
        <div class="cerceve" >
            <p>MAİL</p><input name="kMail" type="email"placeholder="MAİL" required />
            <p>ŞİFRE</p><input name="kSifre" type="password" placeholder="ŞİFRE" required/>
           <button  type="submit" class="button" name="btn" value="grs">GİRİŞ</button> 
        </div>
    </form> ';
  }
  else if($_POST["btn"] == "kayit"){ // eğer giriş butonuna basıldıysa  kayıt ekranı gelecektir

          echo '   
            <form method="POST" >
        <div class="giris" >
             <p>TC</p><input name="kTc" type="text" placeholder="TC" required />
            <p>AD</p><input name="kAd" type="text" placeholder="AD" required/>
             <p>SOYAD</p><input name="kSoyad" type="text" placeholder="SOYAD" required />
            <p>MAİL</p><input name="kMail" type="email" placeholder="MAİL" required />
            <p>ŞİFRE</p><input name="kSifre" type="password" placeholder="ŞİFRE" required/>
           <button  type="submit" name="btn" value="kyt" class="button">YENİ KAYIT</button>  
        </div>
    </form>';
  }
  else if ($_POST["btn"] == "kyt") { // kayıt ekranına tıkladığı zaman verileri  veritabanına kayıt ediyor 
     
     if ($_POST) {
         

         $db = mysqli_connect("localhost","root","","odev","3308");
        
         $TC = $_POST["kTc"];
         $Ad = $_POST["kAd"];
         $Soyad = $_POST["kSoyad"];
         $Mail = $_POST["kMail"];
         $Sifre = $_POST["kSifre"];
         
        
         $sorgu= "insert into kullanici values ('$TC','$Ad','$Soyad','$Mail','$Sifre') ";

         $veri = mysqli_query($db,$sorgu);
          if ($veri) {
              echo "Kayıt oluşturuldu...";
              header("location: index.php");
              exit();
            }
            else{  //  Girilen bilgiler veritabanında daha önce kayıt edilmiş ise hata verip aynı sayfaya geri dönüyor.

              echo ' <script language="JavaScript">
              alert("Kayıt oluşturulamaz. Daha önce kayıt olmuş olabilirsiniz.Lütfen girdiğiniz bilgileri kontrol ediniz !");
                history.go(-1);
               </script> ';
    
            }
      }
  }
  else if ($_POST["btn"] == "grs") {
   
    if ($_POST) {
      session_start();
      $db = mysqli_connect("localhost","root","","odev","3308");

      $Mail  = $_POST["kMail"];
      $Sifre = $_POST["kSifre"];


    $_SESSION["KullaniciMail"] = $Mail;
  
      $kontrol = mysqli_query($db,"select Sifre, TC from kullanici where Mail='$Mail' and Sifre='$Sifre' ");
        
       if ($kontrol) {

           $sayac = 0;
           while ($row = mysqli_fetch_assoc($kontrol)) {
           
              if( $row["Sifre"] == $Sifre){
                 $_SESSION["TC"] = $row["TC"];
                 $sayac = 1;
                 break;
                }
            }
        if ($sayac == "1") {
          header("location: anasayfa.php");
          exit();
        }
        else {
          echo ' <script language="JavaScript">
              alert("Yanlış giriş yaptınız. Lütfen girmiş olduğunuz bilgileri kontrol ediniz. !");
                history.go(-1);
               </script> ';
       }
    }
  }
}
?>
  
</body>
</html>

