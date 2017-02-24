<?php
    require('vendor/autoload.php');

$app = new \Slim\Slim();
    $app->get('/hello',function(){
        echo "hello";
    });
    $app->post('/upload',function() use ($app){
       $target_dir = "public/uploads/";
        $uploadOk =1;
       $file = $_FILES['fileToUpload'];
    
        $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
        $imageFileType =strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(file_exists($target_file)){
            echo "sorry, file already exists.";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if($uploadOk==0){
            echo "sorry, your file was not uploaded";
        }else{
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            }else{
                echo "Sorry, there was an error uploading your file.";
            }
        }
        var_dump($file);
        echo "hello";
//        print_r($files);
    });

    $app->run();
?>