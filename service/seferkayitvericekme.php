<?php

//Biletlerim den gelen değerler atanarak seferkayiitvericekme gönderiliyor.
  require_once 'lib/nusoap.php';

     $soap_client = new nusoap_client('http://localhost/16010011028_FinalOdev/service/seferkaydi.php?wsdl',true);

   /* $params = array('TC' => '1',
          'SeferNumarasi' =>  'SFRN zYUW',
          'Tarih' =>  '2020-06-23',
          'Saat' => '09:30:00',
    );*/
    $params = array('TC' => $_POST['tc'],
          'SeferNumarasi' =>  $_POST['sefernumarasi'],
          'Tarih' =>  $_POST['tarih'],
          'Saat' =>  $_POST['saat'],
    );


    print_r($soap_client->call('biletKontrol', $params));

   

?>
