<?php
include 'config.php';
include 'nav.php';
include 'cache.php';

extract($_REQUEST);
if (isset($submit) && $submit == 'put') {
    $fname = $_FILES['val']['empname'];
    $tr = explode('.', $fname);
    $ext = strtolower(end($tr));
    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
        $dir = 'imag';
        $newfname = $empname . '.' . $ext;
        $profilepic_path = $dir . '/' . $newfname;
        move_uploaded_file($_FILES['val']['tmp_name'], $profilepic_path);

        $query = "INSERT INTO cashdb(name,image) values('$empname','$profilepic_path')";
        
        $result = mysqli_query($link, $query);
        if ($result) {
            echo 'success';
        } else {
            echo mysqli_error($link);
        }
    } else {
        echo 'You have choosen ' . $ext . ' file. Please choose png or jpg or jpeg file.';
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>cash memory</title>
        <link href="libs/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
        <link href="createStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>  
    <div class="login-box">
            <h2>put value in cash memory</h2>
            <form class="empform" id="empform" action="" enctype="multipart/form-data">   
                <div class="user-box">
                    <input type="text" name="empname" id="empname" /> <br>
                    <label>key</label>
                </div>

                <div class="user-box">
                    <label>value</label>
                    <input type="file" name="val" id="val" />
                </div>
                <button  id="button" class="option-btn" name="submit" id="submit" value="put">put</button>
            </form>
        </div>

        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/myscript.js" type="text/javascript"></script>

    </body>
</html>

