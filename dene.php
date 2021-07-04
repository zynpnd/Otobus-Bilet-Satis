$resim=$db->prepare("SELECT * FROM socialresponsibility  where id=:id ");
    $resim->execute(array(
        'id' =>$_GET['id']));

    $resimcek=$resim->fetch(PDO::FETCH_ASSOC);

    if($_FILES['image1']["size"] > 0 || $_FILES['image2']["size"] > 0|| $_FILES['image3']["size"] > 0 || $_FILES['image4']["size"] > 0)  {

        $uploads_dir = '../img/socialresponsibility/';

        @$tmp_name = $_FILES['image1']['tmp_name'];
        @$tmp_name2 = $_FILES['image2']['tmp_name'];
        @$tmp_name3 = $_FILES['image3']['tmp_name'];
        @$tmp_name4 = $_FILES['image4']['tmp_name'];

        @$name  = $_FILES['image1']["name"];
        @$name2 = $_FILES['image2']["name"];
        @$name3 = $_FILES['image3']["name"];
        @$name4 = $_FILES['image4']["name"];

        $isim=md5(uniqid(rand()));

        $uzanti  = explode(".", $name);  $uzanti = end($uzanti);
        $uzanti2  = explode(".", $name2); $uzanti2 = end($uzanti2);
        $uzanti3 = explode(".", $name3); $uzanti3 = end($uzanti3);
        $uzanti4  = explode(".", $name4); $uzanti4 = end($uzanti4);

        $new_name1 = $isim . $uzanti;
        $new_name2 = $isim . $uzanti2;
        $new_name3 = $isim . $uzanti3;
        $new_name4 = $isim . $uzanti4;

        $resimyol1= substr($uploads_dir, 6).$new_name1;
        $resimyol2 = substr($uploads_dir, 6).$new_name2;
        $resimyol3 = substr($uploads_dir, 6).$new_name3;
        $resimyol4 = substr($uploads_dir, 6).$new_name4;

        @move_uploaded_file($tmp_name, "$uploads_dir/$new_name1");
        @move_uploaded_file($tmp_name2, "$uploads_dir/$new_name2");
        @move_uploaded_file($tmp_name3, "$uploads_dir/$new_name3");
        @move_uploaded_file($tmp_name4, "$uploads_dir/$new_name4");

            $resimsilunlink=$resimcek['image1'];
            $resimsilunlink2=$resimcek['image2'];
            $resimsilunlink3=$resimcek['image3'];
            $resimsilunlink4=$resimcek['image4'];

           // echo $resimsilunlink. "--".$resimsilunlink2." -- ".$resimsilunlink3."--".$resimsilunlink4;
            unlink("../img/socialresponsibility/$resimsilunlink");
            unlink("../img/socialresponsibility/$resimsilunlink2");
            unlink("../img/socialresponsibility/$resimsilunlink3");
            unlink("../img/socialresponsibility/$resimsilunlink4");

    }else{
        $new_name1=$resimcek['image1'];
        $new_name2=$resimcek['image2'];
        $new_name3=$resimcek['image3'];
        $new_name4=$resimcek['image4'];
    }

    $duzenle=$db->prepare("UPDATE socialresponsibility SET name=:name,
                                                                     content=:content,
                                                                     image1=:image1,
                                                                     image2=:image2,
                                                                     image3=:image3,
                                                                     image4=:image4,
                                                                     name2=:name2,
                                                                     name3=:name3,
                                                                     alt_name=:alt_name,
                                                                     alt_content=:alt_content	
                                                                     WHERE id=:id");
    $update=$duzenle->execute(array(
        "name" => $_POST['name'],
        "content" =>$_POST['content'],
        "image1"=>$new_name1,
        "image2"=>$new_name2,
        "image3"=>$new_name3,
        "image4"=>$new_name4,
        "name2"=>$_POST['name2'],
        "name3"=>$_POST['name3'],
        "alt_name"=>$_POST['alt_name'],
        "alt_content"=>$_POST['alt_content'],
        "id"=>$_GET['id']
    ));


    if ($update) {
        header("Location:../sorumluluk.php?Update=Yes");
    } else {
        header("Location:../sorumluluk.php?Update=No");
    }
