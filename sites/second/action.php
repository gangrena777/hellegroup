 <?php
	
include('db.php');

 
  if(!empty($_REQUEST['name'])  &&  isset($_FILES['file'])){

    $name = htmlspecialchars(trim($_REQUEST['name']));

   // $file = $_FILES['file'];

    

    if(!$_FILES['file']['error']){

      $path = __DIR__ . '/uploads/'.$_FILES['file']['name'];

       // echo "<pre>";
       // print_r($_FILES['file']);
       // echo "</pre>";

       // echo $path;

          if (move_uploaded_file($_FILES["file"]["tmp_name"], $path)) {

                   $date_create = date("Y-m-d H:i:s");
             
                   $sql = "INSERT INTO datas (`date_create`,`name`, `file`) VALUES ('".$date_create."','".$name."', '".$path."')";
          
                   $ress = mysqli_query($link, $sql);

                    if($ress){
                            echo json_encode(array(
                                                  "status" => 'success',
                                                  "message" => "New file are add in the base"
                                ));

                    }
                    else{
                                echo json_encode(array(
                                                  "status" => 'error',
                                                  "message" => "New deal not add in the base"
                                ));
                    }

          }else {             
                                echo json_encode(array(
                                                  "status" => 'error',
                                                  "message" => "К сожалению, при загрузке вашего файла произошла ошибка"
                                ));
          }
    }else{
                                echo json_encode(array(
                                                  "status" => 'error',
                                                  "message" => "К сожалению, при передаче вашего файла произошла ошибка"
                                ));

    }

  }//if(!empty($_REQUEST['name'])  &&  isset($_FILES['file']))

  if(!empty($_REQUEST['search'])){

     $query = htmlspecialchars(trim($_REQUEST['search']));

     $q = "SELECT * FROM `datas` WHERE `name` LIKE '%$query%'";
    
        $result = array();
          $ress = mysqli_query($link, $q);


                          if(mysqli_num_rows($ress)>0) 
                          {

                              $row = mysqli_fetch_array($ress);
                              

                             do{

                                  $result[] = $row;
                                } 
                                while($row = mysqli_fetch_array($ress));
                                  $result['avaible'] = true;

                                  echo  json_encode($result);

                          }else{
                              echo json_encode(array(
                                                  "status" => 'error',
                                                  "message" => "Файлов с таким названием в базе нет..."
                                ));
                          }
  }

?>