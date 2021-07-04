<!DOCTYPE html>
<html>
<head>
	<title>YOLCU TURİZM</title>
	<meta charset="utf-8">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<style type="text/css">
	
	body{
         background-color:#BC8F8F;
	    }
	   .mail{
      color: white;
      text-align: left;
      letter-spacing:2px;
     
       font-style: oblique;
      
    }

	.slogan{
		color:black;
		letter-spacing: 2px;
		margin-top: 25px;
		text-align: center;
		font-style: italic; 
	}
</style>
<body>
	<div class="mail">
     <?php 
          session_start();
          echo "HOŞGELDİN {$_SESSION["KullaniciMail"]} ....";
    ?>
  </div>
<div class="slogan" >
      <h2 >YOLCU TURİZM</h2>
      <h4>YOLCULUK YAPMAYAN KALMASIN.....</h4>
        
   </div>
</body>
</html>