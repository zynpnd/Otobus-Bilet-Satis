<?php
    require_once 'lib/nusoap.php';

    $server = new soap_server();

    $nIsim="http://localhost/SeferKayitKontrol";
    $server->configureWSDL('biletKontrol',$nIsim);
    $server->wsdl->schemaTargetNamespace=$nIsim;

//istenen bilgileri diziye ekliyoruz
    $server->register('biletKontrol',
    array('TC' => 'xsd:string',
          'SeferNumarasi' => 'xsd:string',
          'Tarih' => 'xsd:string',
          'Saat' => 'xsd:string',
    ),
    array('return' => 'xsd:string'),
    $nIsim); // string döndürme

//Bilet olup olmadığını kontrol eden sorgu
    function biletKontrol($TC, $SeferNumarasi, $Tarih, $Saat) {
     
     // return $TC.$SeferNumarasi.$Tarih.$Saat;
    $db = mysqli_connect("localhost","root","","odev","3308");
    $veri = mysqli_query($db, "select * from bilet where TC = '$TC' and SeferNumarasi = '$SeferNumarasi' and Tarih = '$Tarih' and Saat = '$Saat'");

    if($veri){
        if (mysqli_fetch_row($veri)==0){
            return 'Bu isimde bir kayit bulunmamaktadır.';
        }
        else{
            return 'Bu TC \'li kişi sistemde mevcuttur.';
        }

    }
    else{
        echo "asdfgfdfgfdfgh";
    }
}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
@$server->service(file_get_contents("php://input"));


?>