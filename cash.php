<?php
include 'config.php';
include 'nav.php';
use HashMap\HashMap; 
include 'config/cache.php';
require "cache.php";
extract($_REQUEST);
$count=0;
$map = new HashMap("String", "String");
if (isset($submit) && $submit == 'put') {
    $fname = $_FILES['profilepic']['empname'];
    $tr = explode('.', $fname);
    $ext = strtolower(end($tr));
    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {

        $dir = 'image';
        $newfname = $empname . '.' . $ext;
        $profilepic_path = $dir . '/' . $newfname;
        $dirr = 'img';
        
        $profilepicc_path = $dirr . '/' . $newfname;

        move_uploaded_file($_FILES['profilepic']['tmp_name'], $profilepic_path);
        $query = "INSERT INTO cashdb(name,image) values('$empname','$profilepic_path')";
        $hashmap->put($empname, $profilepicc_path);
        $result = mysqli_query($link, $query);
        $count++;
        if ($result) {
            //header('location:create.php');
            echo 'success';
            
        } else {
            echo mysqli_error($link);
        }
    } 
} 
//      else if(isset($_POST['get']))
// {
//     $valueToSearch = $_POST['valueToSearch'];
//     search in all table columns
//     using concat mysql function
    // $query = "SELECT * FROM `cashdb` WHERE CONCAT(`name`, `image`) LIKE '%".$valueToSearch."%'";
    // $search_result = filterTable($query);
    // $value= $map->get($valueToSearch);
    
// }
?>
<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="libs/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
        <title>uploade image in cash </title>
        <!-- <link href="style.css" rel="stylesheet" type="text/css"/> -->
    </head>
    <body>
    

 <div class="login-box">
            <h2>set image in cash</h2>
                <form class="empform" id="empform" action="" enctype="multipart/form-data">   
                      
                <div class="user-box">
                        <input type="text" name="empname" id="empname" /> <br>
                       <label>Key</label>
                        </div>
                <div class="user-box">
                        <label>value</label>
                         <input type="file" name="profilepic" id="profilepic" />
                        </div>
                            <button  id="button" class="option-btn" name="submit" id="submit" value="get">get</button>
                            <button  id="button" class="option-btn" name="submit" id="submit" value="put">put</button>                       
                        </form>
                </div>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/myscript.js" type="text/javascript"></script>
    </body>
</html>